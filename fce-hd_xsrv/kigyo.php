<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="kigyo">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="MV_FIELD">
    <div class="base_wrapper">
      <h1>企業情報</h1>
    </div>
  </div>
  <div class="pank">
    <ul class="base_wrapper">
      <li><a href="/">トップ</a></li>
      <li>企業情報</li>
    </ul>
  </div>

  <section id="KIGYO_HOME-LISTS">
    <div class="base_wrapper">
      <dl><dt><a href="/kigyo_houshin.php">企業方針</a></dt><dd>FCEグループの経営理念とビジョンをご紹介します。</dd></dl>
      <dl><dt><a href="/kigyo_daihyo.php">代表メッセージ</a></dt><dd>FCEホールディングス代表取締役社長より皆さまへのご挨拶です。</dd></dl>
      <dl><dt><a href="/kigyo_gaiyo.php">会社概要</a></dt><dd>FCEグループの基本情報をご確認いただけます。</dd></dl>
      <dl><dt><a href="/kigyo_yakuin.php">役員紹介</a></dt><dd>役員の一覧と略歴をご確認いただけます。</dd></dl>
    </div>
  </section>

</main>

<?php
require_once "./bin/parts/footer.php";
require_once "./bin/parts/scripter.php";
?>
</body>
</html>
