<?php
/**
 * The template for single.php
 *
 * @since 2020.06.xx
 * @version 1.0
 */
?>
<?php get_header(); ?>

<main>
  <?php if(have_posts()): the_post(); ?>

  <?php endif; ?>
</main>
<?php get_footer(); ?>
