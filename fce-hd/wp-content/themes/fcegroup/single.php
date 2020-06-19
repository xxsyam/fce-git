<?php
/**
 * The template for single.php
 *
 * @since 2019.12.xx
 * @version 1.0
 */
?>
<?php get_header(); ?>

<main>
  <?php if(have_posts()): the_post(); ?>
  <section id="MV_FIELD"<?php if( has_post_thumbnail() ): ?> style="background-image:url(<?php the_post_thumbnail_url( 'large' ); ?>);"<?php endif; ?> class="wow fadeIn base_section">

  <?php endif; ?>
</main>
<?php get_footer(); ?>
