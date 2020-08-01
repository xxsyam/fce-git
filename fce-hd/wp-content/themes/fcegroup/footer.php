<footer class="footer">
  <?php get_template_part('php/templates/mod-bwp'); ?>

  <div class="footer_wrapper">
    <nav class="base_wrapper">
      <?php get_template_part('php/templates/mod-footer_nav'); ?>
    </nav>
  </div>
  <small><?php echo COPYRIGHT;?></small>

  <?php get_template_part('php/templates/mod-bg_item'); ?>
</footer>
<?php get_template_part('php/templates/scripter'); ?>
<?php wp_footer(); ?>
<?php
global $template;
$template_name = basename($template, '.php');
echo "<!-- Template::".$template_name."-->";
?>
</body>
</html>
