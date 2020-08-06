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

  <section class="news_list inner anim inview">

    <nav class="inview inner">
      <ul class="category_nav anim-list">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>newslist">ALL</a></li>
        <?php
        $terms = get_terms('news');
        foreach ( $terms as $term ) {
          echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
        }
        ?>
      </ul>
    </nav>

    <ul>
    <?php
    if ($terms = get_the_terms($post->ID, 'news')) {
        foreach ( $terms as $term ) {
          $this_term = $term->slug;
        }
    }
    $custom_posts = get_posts(array(
        'post_type' => 'newslist', // 投稿タイプ
        'posts_per_page' => 10, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC', // 昇順・降順
        'tax_query' => array(
            array(
                'taxonomy' => 'news', //タクソノミーを指定
                'field' => 'slug', //ターム名をスラッグで指定する
                'terms' => $this_term, //表示したいタームをスラッグで指定
                'operator' => 'IN'
            ),
        )
    ));
    global $post;
    if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>

    <li class="fIUp">
      <time><?php echo get_the_date('Y.m.d'); ?></time>

        <?php
        $terms = get_the_terms($post->ID, 'news');
        if ( $terms ) {
          echo "<span class=\"meta ".$terms[0]->slug."\">".$terms[0]->name."</span>";
        }
        ?>

      <span class="text">
        <?php if(empty($post->post_content)) { ?>
          <?php
            $custom_fields = get_post_meta( $post->ID , 'link_url' , true );
            if(empty( $custom_fields ) === false){ ?>
              <a href="<?php the_field('link_url'); ?>" target="<?php the_field('open_type'); ?>"><?php the_title(); ?></a>
            <?php }else{ ?>
              <?php the_title(); ?>
            <?php } ?>
        <?php } else { ?>
        <?php the_content();?>
        <?php } ?></span>
    </li>

    <?php endforeach; wp_reset_postdata(); endif; ?>
    </ul>
  </section>


</main>
<?php get_footer(); ?>
