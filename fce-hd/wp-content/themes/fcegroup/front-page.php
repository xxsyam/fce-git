<?php get_header(); ?>
<main class="wrapper">

  <div class="main-visual">
    <div class="inner">
      <div class="catch">あえて、挑め。</div>
      <div class="lead">大胆に、自分らしく、もっと自由に。<br>その逆風を楽しみながら。</div>
    </div>

    <div class="particle-left">
      <object class="b1 particle" type="image/svg+xml" data="/bin/image/b1.svg"></object>
      <object class="y1 particle" type="image/svg+xml" data="/bin/image/y1.svg"></object>
    </div>

    <div class="particle-right">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
        y="0px" viewBox="0 0 1158.1 816.3" style="enable-background:new 0 0 1158.1 816.3;" xml:space="preserve">
      <style type="text/css">
        .st0{fill:<?php echo yerrow;?>;}
        .st1{fill:<?php echo red;?>;}
        .st2{fill:<?php echo blue;?>;}
      </style>
      <path id="y3" class="particle y3 st0" d="M946.8,0l-192,173.2l19.8,190.1L946.8,0z"/>
      <path id="r1" class="particle r1 st1" d="M774.5,363.3l-98.1,336.8L0,627.7L774.5,363.3z"/>
      <path id="y2" class="particle y2 st0" d="M774.6,363.3l273.3,453l76.6-331.7L774.6,363.3z"/>
      <path id="b2" class="particle b2 st2" d="M774.4,363.3l283,99l100.7-333.6L774.4,363.3z"/>
      </svg>
    </div>
  </div>

  <section class="whats anim bg-animation rd">
    <div class="inner">
      <h2 class="heading fIUp">What’s FCE<small class="fIUp">FCEグループとは</small></h2>

      <div class="bg-particles anim">
        <object class="bg1 particle animateme" type="image/svg+xml" data="/bin/image/bg_1.svg"></object>
        <object class="bg3 particle animateme" type="image/svg+xml" data="/bin/image/bg_5.svg"></object>
        <object class="bg2 particle animateme" type="image/svg+xml" data="/bin/image/bg_2.svg"></object>
        <object class="bg4 particle animateme" type="image/svg+xml" data="/bin/image/bg_4.svg"></object>
      </div>

      <ul class="anim-list">
        <li class="message">
          <h3 class="fIUp">つくりたいのは、チャレンジあふれる未来！</h3>
          <p class="fIUp">
            これがFCEグループの想いです。	<br>
            <br>
            世の中にはチャレンジを阻むさまざまな社会課題があります。<br>
            FCEグループは、こうした社会課題に向き合い、ビジネスで解決するをコンセプトに<br>
            さまざまな事業を創造し、展開しています。<br>
            <br>
            そして、子どもたちから働く大人、そして、老若男女すべての方々が、<br>
            さまざまなことに想いっきりチャレンジできる世の中をつくっていきます。
          </p>
        </li>

        <li class="message2">
          <h3 class="fIUp">OneTeam=集合天才？</h3>
          <p class="fIUp">
            グループ内で共有することで、さらに大きなシナジーを発揮し、お客様に圧倒的な貢献と<br>
            成長をもたらせるよう「ワンチーム」として取り組んでいます。
          </p>
        </li>
      </ul>

      <div class="btn_set fIUp"><span class="button wt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>about">View More</a></span></div>
    </div>
  </section>

  <section class="challenge anim">
    <h2 class="heading fIUp">Challenge! Change! FCE<small class="fIUp">FCEの未来を変える事業たち</small></h2>
    <ul class="flex-center anim-list">
      <li class="fIUp">
        <h3><strong>教育</strong>を変える</h3>
        <p>
          子供たちに自信と可能性を、先生たちに自由と機会を。
        </p>
        <div class="pict_wrap"><img src="/bin/image/challenge1.jpg"></div>
        <dl>
          <dt>教育に関する事業たち</dt>
          <dd>
            株式会社FCEエデュケーション<br>
            株式会社Findアクティブラーナー
          </dd>
        </dl>
      </li>
      <li class="fIUp">
        <h3><strong>働く</strong>を変える</h3>
        <p>
          子供たちに自信と可能性を、先生たちに自由と機会を。
        </p>
        <div class="pict_wrap"><img src="/bin/image/challenge2.jpg"></div>
        <dl>
          <dt>教育に関する事業たち</dt>
          <dd>
            株式会社FCEエデュケーション<br>
            株式会社Findアクティブラーナー<br>
            株式会社Findアクティブラーナー
          </dd>
        </dl>
      </li>
      <li class="fIUp">
        <h3><strong>人生</strong>を変える</h3>
        <p>
          子供たちに自信と可能性を、先生たちに自由と機会を。
        </p>
        <div class="pict_wrap"><img src="/bin/image/challenge3.jpg"></div>
        <dl>
          <dt>教育に関する事業たち</dt>
          <dd>
            株式会社FCEエデュケーション
          </dd>
        </dl>
      </li>
    </ul>
  </section>

  <section class="service anim bg-animation bl">
    <div class="inner">
      <div class="section-header">
        <h2 class="heading fIUp">Service<small class="fIUp">商品・サービス</small></h2>
        <div class="button fIUp"><a href="<?php echo esc_url( home_url( '/' ) ); ?>service">View More</a></div>
      </div>
      <ul class="flex-center anim-list fIUp">
        <?php if ( have_posts() ) : query_posts('post_type=service&posts_per_page=10'); ?>
          <?php while (have_posts()) : the_post(); ?>
        <li>
          <a href="<?php the_field('out_links'); ?>" class="hover-effect" target="_blank">
            <figure class="hover-img">
              <img src="<?php the_post_thumbnail_url( 'medium' );?>" alt="">
            </figure>
            <?php the_field('catch_text'); ?>
          </a>
        </li>
          <?php endwhile;?>
        <?php endif; ?>
      </ul>
    </div>
  </section>

  <section class="next inner anim">
    <div class="section-header">
      <h2 class="heading fIUp">Team!FCE<small class="fIUp">FCEの仲間たち</small></h2>
    </div>
    <div class="box-right">
      <h2 class="heading-bg anim">
        <span>さぁ、</span>
        <span>次は何を変えようか？</span>
      </h2>

      <div class="bg-particles anim">
        <object class="bg1 particle" type="image/svg+xml" data="/bin/image/bg_1.svg"></object>
        <object class="bg3 particle" type="image/svg+xml" data="/bin/image/bg_3.svg"></object>
        <object class="bg2 particle" type="image/svg+xml" data="/bin/image/bg_2.svg"></object>
        <object class="bg4 particle" type="image/svg+xml" data="/bin/image/bg_4.svg"></object>
      </div>

      <div class="button fIUp"><a href="<?php echo esc_url( home_url( '/' ) ); ?>team">View More</a></div>
    </div>
    <div class="box-left photo fIUp"><img src="/bin/image/img_1.png" alt=""></div>
  </section>

  <section class="face anim">
    <div class="inner">
      <div class="section-header">
        <h2 class="heading fIUp">FaCE！<small class="fIUp">FCEの素顔系メディア</small></h2>
        <nav class="face-nav fIUp">
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>face/all">ALL</a></li>
            <?php
            //一番親階層のカテゴリをすべて取得
            $categories = get_categories('parent=0');

            //取得したカテゴリへの各種処理
            foreach($categories as $val){
              //カテゴリのリンクURLを取得
              $cat_link = get_category_link($val->cat_ID);

              //子カテゴリのIDを配列で取得。配列の長さを変数に格納
              $child_cat_num = count(get_term_children($val->cat_ID,'category'));

              //子カテゴリが存在する場合
              if($child_cat_num > 0){
                //子カテゴリの一覧取得条件
                $category_children_args = array('parent'=>$val->cat_ID);
                //子カテゴリの一覧取得
                $category_children = get_categories($category_children_args);
                //子カテゴリの数だけリスト出力
                foreach($category_children as $child_val){
                  $cat_link = get_category_link($child_val -> cat_ID);
                  echo '<li><a href="' . $cat_link . '">' . $child_val -> name . '</a></li>';
                }
              }
              echo '</ul>';
            }
            ?>
          </ul>
        </nav>
      </div>

      <ul class="articles anim-list fIUp">
        <?php
        // 条件の設定
        $args = Array(
          'post_type' => 'post',
          'posts_per_page' => 6,
        );

        // クエリの定義
        $wp_query = new WP_Query( $args );

        if ( $wp_query->have_posts() ) {
          while ( $wp_query->have_posts() ) {
            $wp_query->the_post();
        ?>
        <li>

            <figure class="hover-img">
              <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'medium' );?>" alt=""></a>
            </figure>
            <dl>
              <dt class="flex-between align-end">
                <?php
                  $category = get_the_category();
                  if ( $category[0] ) {
                    echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
                  }
                ?>
                <span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
              </dt>
              <dd><a href="<?php the_permalink(); ?>">
                <?php
                if(mb_strlen($post->post_title, 'UTF-8')>40){
                  $title= mb_substr($post->post_title, 0, 40, 'UTF-8');
                  echo $title.'…';
                }else{
                  echo $post->post_title;
                }
                ?></a></dd>
            </dl>
        </li>
        <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>
      <div class="button fIUp"><a href="<?php echo esc_url( home_url( '/' ) ); ?>face">View More</a></div>
    </div>
  </section>

  <section class="news inner">
    <div class="section-header flex-between align-end">
      <h2 class="heading fIUp">News<small class="fIUp">新着情報</small></h2>
      <div class="button fIUp">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>newslist">View More</a>
      </div>
    </div>

    <ul>
      <?php if ( have_posts() ) : query_posts('post_type=newslist&posts_per_page=5'); ?>
        <?php while (have_posts()) : the_post(); ?>
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
        <?php endwhile;?>
      <?php endif; ?>
    </ul>
  </section>

  <section class="recruit anim bg-animation rd">
    <h2 class="heading fIUp"><a href="#">Recruit<small>採用情報</small></a></h2>
  </section>

</main>
<?php get_footer(); ?>
