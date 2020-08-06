<?php
/**
 * The template for single.php
 *
 * @since 2019.12.xx
 * @version 1.0
 */
?>
<?php get_header(); ?>

<main class="wrapper">
  <?php if(have_posts()): the_post(); ?>

    <div class="main-visual bg-animation anim yr">
      <div class="inner">
        <h2 class="heading fIUp">FaCE!<small class="fIUp">FCEグループ素顔系メディア</small></h2>
        <div class="breadcrumb fIUp">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a> ＞ FaCE!
        </div>
      </div>

      <?php get_template_part('php/templates/mod-main_bg'); ?>
    </div>



  <?php endif; ?>
</main>
<?php get_footer(); ?>
