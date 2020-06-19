<?php get_header(); ?>

<main>
  <section>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <?php get_template_part('loop-content'); ?>
    <?php endwhile; endif; ?><!--ループ終了-->
  </section>
</main>
<?php get_footer(); ?>
