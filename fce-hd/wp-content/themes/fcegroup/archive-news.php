<?php
/**
 * The template for archive.php
 *
 * @since 2020.06.xx
 * @version 1.0
 */
?>
<?php get_header(); ?>

<main class="wrapper">

  <div class="main-visual bg-animation anim yr">
    <div class="inner">
      <h2 class="heading fIUp">NEWS<small class="fIUp">新着情報</small></h2>
      <div class="breadcrumb fIUp">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a> ＞ NEWS
      </div>
    </div>

    <?php get_template_part('php/templates/mod-main_bg'); ?>

  </div>

</main>
<?php get_footer(); ?>
