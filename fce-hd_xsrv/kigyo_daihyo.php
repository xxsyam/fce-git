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
          <p>私たちの世界は、誰かの「チャレンジ」でできています。<br><br>

            自立のために自分を変える、何かを成すために仲間と挑む、時に、到底変えられないと感じるような大きな社会課題に立ち向かう。<br><br>

            チャレンジに大きいも小さいもありません。<br>
            新たに踏み出す「その一歩」が、必ず新しい未来をつくるのだと私たちは考えます。<br><br>

            まず、一人ひとりが「新しい一歩」を踏み出し、一歩を共に踏み出す人同士が集まり、さらに大きな一歩を創り出し、一人の天才を超え、想定内の延長線上にはない結果、そして未来を創ることができる社会になったとき、さらに可能性にあふれた社会、日本、そして世界を作ることができるのではないでしょうか。<br><br>

            今世界をつくる、私たち一人ひとりが、その「あと一歩」を踏み出すことができるように、ビジネスを通じチャレンジを阻む壁を取り払う。<br>
            私たちはそうして「チャレンジあふれる未来をつくる」<br>
            そのために今日も、一歩を踏み出し、チャレンジし続けます。</p>

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
