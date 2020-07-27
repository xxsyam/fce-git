<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="home">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="KV_FIELD">
    <div class="base_wrapper slider_wrapper">
      <div class="slider_wrap pub">
        <div class="slider_pict"><img src="/bin/image/kv_001_sp.jpg" class="sp_display"><img src="/bin/image/kv_001.jpg" class="pc_display"></div>
        <div class="slider_text"><span>全世界4000万部発行　世界的ベストセラー『7つの習慣』出版</span></div>
      </div>
      <div class="slider_wrap fal">
        <div class="slider_pict"><img src="/bin/image/kv_002_sp.jpg" class="sp_display"><img src="/bin/image/kv_002.jpg" class="pc_display"></div>
        <div class="slider_text"><span>全国1000校以上・20万人の先生方が利用、オンライン教員研修サービス</span></div>
      </div>
      <div class="slider_wrap pat">
        <div class="slider_pict"><img src="/bin/image/kv_003_sp.jpg" class="sp_display"><img src="/bin/image/kv_003.jpg" class="pc_display"></div>
        <div class="slider_text"><span>「現場で作って使える」を「エンジニアに依存しない」IT活用を実現するRPA</span></div>
      </div>
    </div>
  </div>

  <section class="home-bnr_list">
    <ul class="base_wrapper">
      <li><a href="<?php echo LINK_01; ?>">企業情報</a></li>
      <li><a href="<?php echo LINK_02; ?>">事業情報</a></li>
    </ul>
  </section>

  <section id="MOD_NEWS">
    <article class="base_wrapper">
      <h2>News</h2>
      <nav>
        <ul class="filter_list">
          <li class="trigger active" data-filter="all">すべて</li>
          <li class="trigger" data-filter="ir">IR</li>
          <li class="trigger" data-filter="press">プレスリリース</li>
          <li class="trigger" data-filter="media">メディア</li>
        </ul>
      </nav>
      <div class="mod-news_wrapper">
        <div class="news_wrap filter press">
          <div class="news_head"><time>2020.07.02</time><span class="ic-press">プレスリリース</span></div>
          <div class="news_body"><a href="<?php echo LINK_04; ?>">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter press">
          <div class="news_head"><time>2020.07.01</time><span class="ic-press">プレスリリース</span></div>
          <div class="news_body"><a href="<?php echo LINK_04; ?>">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter ir">
          <div class="news_head"><time>2020.06.01</time><span class="ic-ir">IR</span></div>
          <div class="news_body"><a href="<?php echo LINK_04; ?>">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter media">
          <div class="news_head"><time>2020.06.01</time><span class="ic-media">メディア</span></div>
          <div class="news_body"><a href="<?php echo LINK_04; ?>">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
      </div>
    </article>
  </section>
</main>

<?php
require_once "./bin/parts/footer.php";
require_once "./bin/parts/scripter.php";
?>
</body>
</html>
