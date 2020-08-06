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

    <article class="list_wrapper inner">
      <div class="anim inview">
        <ul class="anim-list list_wrap">
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
              'paged' => $paged,
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
                <?php the_field('list_title'); ?>
              <?php } else { ?>
                <a href="<?php the_permalink(); ?>"><?php the_field('list_title'); ?></a>
              <?php } ?>
            </span>
          </li>

          <?php endforeach; wp_reset_postdata(); endif; ?>
        </ul>
      </div>
    </article>


    <?php
      global $wp_rewrite;
      $paginate_base = get_pagenum_link(1);
      if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
      $paginate_format = '';
      $paginate_base = add_query_arg('paged','%#%');
      }
      else{
      $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
      user_trailingslashit('page/%#%/','paged');;
      $paginate_base .= '%_%';
      }
      echo paginate_links(array(
      'base' => $paginate_base,
      'format' => $paginate_format,
      'total' => $wp_query->max_num_pages,
      'type'  => 'list', //ul liで出力
      'mid_size' => 1, //カレントページの前後
      'end_size' => 0,
      'current' => ($paged ? $paged : 1),
      'prev_text' => '＜',
      'next_text' => '＞',
      ));
      ?>

  </section>


</main>
<?php get_footer(); ?>
