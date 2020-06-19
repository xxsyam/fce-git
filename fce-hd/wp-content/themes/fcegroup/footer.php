<footer>
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
