<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="press">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="MV_FIELD">
    <div class="base_wrapper">
      <h1>プレスリリース</h1>
    </div>
  </div>
  <div class="pank">
    <ul class="base_wrapper">
      <li><a href="/">トップ</a></li>
      <li>プレスリリース</li>
    </ul>
  </div>

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
