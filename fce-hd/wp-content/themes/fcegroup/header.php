<!DOCTYPE html>
<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head prefix="og: http://ogp.me/ns#">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php get_template_part('php/variables'); ?>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="author" content="<?php echo COPYRIGHT;?>">
<meta name="copyright" content="<?php echo COPYRIGHT;?>">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php
if( is_single() && !is_home() || is_page() && !is_front_page()) {
  //タイトル
  $title = get_the_title();
  //ディスクリプション
  if(!empty($post->post_excerpt)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_excerpt));
  } elseif(!empty($post->post_content)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_content));
    $description_count = mb_strlen($description, 'utf8');
    if($description_count > 120) {
      $description = mb_substr($description, 0, 120, 'utf8').'…';
    }
  } else {
    $description = '';
  }
  //キーワード
  if (has_tag()) {
    $tags = get_the_tags();
    $kwds = array();
    $i = 0;
    foreach($tags as $tag){
      $kwds[] = $tag->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode(',',$kwds);
  }  else {
    $keywords = '';
  }
  //ページタイプ
  $page_type = 'article';
  //ページURL
  $page_url = get_the_permalink();
  //OGP用画像
  if(!empty(get_post_thumbnail_id())) {
    $ogp_img_data = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
    $ogp_img = $ogp_img_data[0];
  }

} else { //ループのページ(home・カテゴリ・タグなど)
  //先に投稿・固定ページ以外の詳細な条件分岐
  if(is_category()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(category_description())) {
      $description = strip_tags(category_description());
    } else {
      $description = 'カテゴリー『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_tag()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(tag_description())) {
      $description = strip_tags(tag_description());
    } else {
      $description = 'タグ『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_year()) {
    $title = get_the_time("Y年").'の記事一覧';
    $description = '『'.get_the_time("Y年").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_month()) {
    $title = get_the_time("Y年m月").'の記事一覧';
    $description = '『'.get_the_time("Y年m月").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_day()) {
    $title = get_the_time("Y年m月d日").'の記事一覧';
    $description = '『'.get_the_time("Y年m月d日").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_author()) {
    $author_id = get_query_var('author');
    $author_name = get_the_author_meta( 'display_name', $author_id );
    $title = $author_name.'が投稿した記事一覧';
    $description = '『'.$author_name.'』が書いた記事の一覧ページです。';
  } else {
    $title = '';
    $description = get_bloginfo( 'description' );
  }

  //キーワード
  $allcats = get_categories();
  if(!empty($allcats)) {
    $kwds = array();
    $i = 0;
    foreach($allcats as $allcat) {
      $kwds[] = $allcat->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode( ',',$kwds );
  } else {
    $keywords = '';
  }

  //ページタイプ
  $page_type = 'website';

  //ページURL
  $http = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
  $page_url = $http.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
}


//OGP用画像
if(empty($ogp_img)) {
  $ogp_img = '/bin/image/ogp_img.jpg';//サイト全てに共通の画像へのパス
}

//タイトル
if(!empty($title)) {
  $output_title = $title.' | '.get_bloginfo('name');
} else {
  $title = get_bloginfo('name');
  $output_title = get_bloginfo('name');
}
?>
<title><?php echo $output_title; ?></title>
<?php if ( !is_home() && !is_front_page() ) : ?>
<?php endif; ?>
<!-- favicon -->
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/mstile-144x144.png">
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/favicon.ico">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" sizes="36x36" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-36x36.png">
<link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-48x48.png">
<link rel="icon" type="image/png" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-72x72.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-96x96.png">
<link rel="icon" type="image/png" sizes="128x128" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-128x128.png">
<link rel="icon" type="image/png" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-144x144.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-16x16.png">
<link rel="icon" type="image/png" sizes="24x24" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-24x24.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/icon-32x32.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/manifest.json">
<!--[if IE]>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/bin/image/favicons/favicon.ico">
<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bin/css/__init.css?ver=<?php echo date("U"); ?>" media="print,screen">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bin/css/format.css" media="print,screen">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bin/css/design.min.css?ver=<?php echo date("U"); ?>" media="print,screen">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bin/css/__print.css?ver=<?php echo date("Ym"); ?>" media="print">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?ver=<?php echo date("Ym"); ?>">
</head>

<body <?php body_class(); ?>>

<?php get_template_part('php/templates/mod-header_nav'); ?>
