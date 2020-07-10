<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="kigyo gaiyo second_pages">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="MV_FIELD">
    <div class="base_wrapper">
      <h1>会社概要</h1>
    </div>
  </div>
  <div class="pank">
    <ul class="base_wrapper">
      <li><a href="/">トップ</a></li>
      <li><a href="/kigyo.php">企業情報</a></li>
      <li>会社概要</li>
    </ul>
  </div>

  <section>
    <div class="base_wrapper two_line">
      <article id="MAIN_FIELD">
        <h2>会社概要</h2>

        <dl>
          <dt>社名</dt>
          <dd>株式会社FCE Holdings</dd>
        </dl>
        <dl>
          <dt>住所</dt>
          <dd>〒163-0810　東京都新宿区西新宿2-4-1 NSビル10階</dd>
        </dl>
        <dl>
          <dt>TEL</dt>
          <dd>03-5908-1400</dd>
        </dl>
        <dl>
          <dt>設立</dt>
          <dd>2017年4月21日</dd>
        </dl>
        <dl>
          <dt>代表</dt>
          <dd>石川 淳悦</dd>
        </dl>
        <dl>
          <dt>グループ会社</dt>
          <dd>
            <ul>
              <li>FCEエデュケーション</li>
              <li>FCEトレーニング・カンパニー</li>
              <li>FCEパブリッシング</li>
              <li>Find!アクティブラーナー</li>
              <li>ダイニングエッジインターナショナル</li>
              <li>FCEプロセス&amp;テクノロジー</li>
            </ul>
          </dd>
        </dl>
        <dl>
          <dt>事業所</dt>
          <dd>
            <p>東京都新宿区西新宿2-4-1 NSビル10階</p>
            <p>大阪営業所（グループ拠点）<br>大阪市中央区淡路町3-6-3 御堂筋MTRビル2F</p>
            <p>福岡営業所（グループ拠点）<br>福岡市博多区博多駅前3丁目4番25号 アクロスキューブ博多駅前</p>
          </dd>
        </dl>

        <iframe id="GOOGLE_MAPS" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.54962681827!2d139.691257415259!3d35.688090030192726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188cd3741fea21%3A0x764f64f86ed40cd9!2z44CSMTYwLTAwMjMg5p2x5Lqs6YO95paw5a6_5Yy66KW_5paw5a6_77yS5LiB55uu77yU4oiS77yRIOaWsOWuv--8ru-8s-ODk-ODqw!5e0!3m2!1sja!2sjp!4v1496595265920" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
      </article>

      <aside>
        <?php
        require_once "./bin/parts/kigyo_nav.php";
        ?>
      </aside>
    </div>
  </section>

</main>

<?php
require_once "./bin/parts/footer.php";
require_once "./bin/parts/scripter.php";
?>
</body>
</html>
