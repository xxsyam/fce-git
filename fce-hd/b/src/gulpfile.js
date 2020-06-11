var gulp = require("gulp"),
    notify = require("gulp-notify"),
    browserSync = require('browser-sync').create(),
    rename = require('gulp-rename'),
    //html
    htmlmin = require('gulp-htmlmin'),
    //css
    sass = require("gulp-sass"),
    cache = require('gulp-cached'),
    progeny = require('gulp-progeny'),
    autoprefixer = require("gulp-autoprefixer"),
    plumber = require("gulp-plumber"),
    cssbeautify = require('gulp-cssbeautify'),
    cleancss = require('gulp-clean-css'),
    //js
    uglify = require("gulp-uglify"),
    babel = require('gulp-babel');

var paths = {
  html: {
    src: '../src/*.html',
    dist: '../'
  },
  css: {
    src: '../src/scss/*.scss',
    dist: '../css'
  },
  js: {
    src: '../src/js/*.js',
    dist: '../js'
  }
}

// local server
var browserSyncOption = {
  server: {
    baseDir: "../",
    notify: true
  },
  reloadOnRestart: true
};

function sync(done) {
  browserSync.init(browserSyncOption);
  done();
}

// watch & reload
function watchFiles(done) {

  var browserReload = function() {
    browserSync.reload();
    done();
  };

  gulp.watch(paths.html.src).on('change', gulp.series('html', browserReload));
  gulp.watch(paths.css.src).on('change', gulp.series('sass', browserReload));
  gulp.watch(paths.js.src).on('change', gulp.series('js', browserReload));

}

gulp.task('html', function(done) {
  gulp.src(paths.html.src)
    .pipe(htmlmin({
        collapseWhitespace : true,
        removeComments : true
    }))
    .pipe(gulp.dest(paths.html.dist))
    .pipe(browserSync.stream());
    done();
})

gulp.task("sass", function(done) {
  gulp.src(paths.css.src)
    .pipe(cache('sass'))
    .pipe(progeny())
    // .pipe(sourcemaps.init())
    .pipe(
      plumber({
        errorHandler: notify.onError('Error: <%= error.message %>')
      })
    )
    .pipe(sass({
      outputStyle: 'compressed'
    }))
    .pipe(autoprefixer({
      browsers: ['last 5 versions', '> 3%'],
      cascade: false,
      grid: true
    }))
    .pipe(cssbeautify())
    .pipe(cleancss())
    .pipe(rename({ extname: '.min.css' }))
    // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.css.dist))
    .pipe(browserSync.stream());
    done();
});

gulp.task("js", function(done) {
  gulp.src(paths.js.src)
    .pipe(plumber())
    .pipe(babel())
    .pipe(uglify())
    .pipe(rename({ extname: '.min.js' }))
    .pipe(gulp.dest(paths.js.dist))
    .pipe(browserSync.stream());
    done();
});

gulp.task('default', gulp.series(gulp.parallel('html','sass', 'js'), gulp.series(sync, watchFiles)));
