<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="kigyo daihyo second_pages">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="MV_FIELD">
    <div class="base_wrapper">
      <h1>代表メッセージ</h1>
    </div>
  </div>
  <div class="pank">
    <ul class="base_wrapper">
      <li><a href="/">トップ</a></li>
      <li><a href="/kigyo.php">企業情報</a></li>
      <li>代表メッセージ</li>
    </ul>
  </div>

  <section>
    <div class="base_wrapper two_line">
      <article id="MAIN_FIELD">
        <h2>代表メッセージ</h2>

        <div class="base_unit">
          <p>私たちが2012年にミッションとして「Delight and Impact the World（世界に喜びと驚きを）」を掲げてから、DeNAという会社は大きな変化を遂げました。<br>
            ヘルスケア、オートモーティブ事業への参入、スポーツ事業の拡大。<br>
            またそれぞれの事業で、各産業界を代表するような企業との共創も続々とスタートしています。<br>
            その、各事業へのAI技術の導入、AI技術の研究開発へ本格的に着手しました。<br>
            これから起こるであろうAI技術の劇的な進化により、人間社会は加速度的に変化・発展していきます。その中で我々が提供すべき「Delight」も常に変化していくものと思います。<br>
            その変化や流れを確実に汲み取り、より多くの方々にDelightを届ける事業、サービスを提供していきたいと考えています。<br>
            そして、「Delight」だけではなく「Impact」、どれだけの大きな価値を世の中に提供できるのかということにこだわりながら、事業活動に取り組んでいきます。</p>

          <p>代表取締役　石川 淳悦</p>
        </div>

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
