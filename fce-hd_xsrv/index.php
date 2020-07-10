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
      <div class="slider_wrap"></div>
      <div class="slider_wrap"></div>
      <div class="slider_wrap"></div>
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
          <div class="news_body"><a href="./news_detail.php">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter press">
          <div class="news_head"><time>2020.07.01</time><span class="ic-press">プレスリリース</span></div>
          <div class="news_body"><a href="./news_detail.php">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter ir">
          <div class="news_head"><time>2020.06.01</time><span class="ic-ir">IR</span></div>
          <div class="news_body"><a href="./news_detail.php">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
        </div>
        <div class="news_wrap filter media">
          <div class="news_head"><time>2020.06.01</time><span class="ic-media">メディア</span></div>
          <div class="news_body"><a href="./news_detail.php">ヘルスケアエンターテインメントアプリ「kencom」 ゲーミフィケーションでコロナ時代のヘルスケアをサポート 「kencomミッション エアモの部屋」の提供を開始</a></div>
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
