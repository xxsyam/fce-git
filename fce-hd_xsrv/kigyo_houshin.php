<?php
define("TITLES", "");
define("KEYWORDS", "");
define("DESCRIPTION", "");
require_once "./bin/parts/variables.php";
require_once "./bin/parts/document_header.php";
?>

<body class="kigyo houshin second_pages">
<?php
require_once "./bin/parts/header.php";
?>

<main>
  <div id="MV_FIELD">
    <div class="base_wrapper">
      <h1>企業方針</h1>
    </div>
  </div>
  <div class="pank">
    <ul class="base_wrapper">
      <li><a href="/">トップ</a></li>
      <li><a href="/kigyo.php">企業情報</a></li>
      <li>企業方針</li>
    </ul>
  </div>

  <section>
    <div class="base_wrapper two_line">
      <article id="MAIN_FIELD">
        <h2>Misson</h2>

        <div class="base_unit">
          <h3>「チャレンジあふれる未来をつくる」</h3>
          <p>私たちが2012年にミッションとして「Delight and Impact the World（世界に喜びと驚きを）」を掲げてから、DeNAという会社は大きな変化を遂げました。<br>
            ヘルスケア、オートモーティブ事業への参入、スポーツ事業の拡大。<br>
            またそれぞれの事業で、各産業界を代表するような企業との共創も続々とスタートしています。<br>
            その、各事業へのAI技術の導入、AI技術の研究開発へ本格的に着手しました。<br>
            これから起こるであろうAI技術の劇的な進化により、人間社会は加速度的に変化・発展していきます。その中で我々が提供すべき「Delight」も常に変化していくものと思います。<br>
            その変化や流れを確実に汲み取り、より多くの方々にDelightを届ける事業、サービスを提供していきたいと考えています。<br>
            そして、「Delight」だけではなく「Impact」、どれだけの大きな価値を世の中に提供できるのかということにこだわりながら、事業活動に取り組んでいきます。</p>
        </div>

        <div class="base_unit">
          <h3 class="img_title"><object type="image/svg+xml" data="/bin/image/logo-fce.svg"></object></h3>
          <p>FCEとは、FutureCreatedbyEntrepreneurs!の頭文字を取っています。<br>
            私たち一人ひとりが企業家マインドを持ち、チャレンジあふれる未来を創り出す主体でありたいと考えています。<br>
            また、私たちのシンボルは社会の課題に対して企業家マインドをもった個が集まり、大きなシナジーを生み出す「集合天才」を表しています。</p>
        </div>

        <div class="base_unit">
          <h3>Core Concept</h3>
          <div class="sub_unit">
            <h4>社会の課題にビジネスで挑む</h4>
            <p>チャレンジを阻む社会課題。<br>
              こうした「社会課題」にフォーカスし、解決に導くような事業創造をコンセプトにしています。ビジネスだからこそ継続的な解決を実現することができると考えています。</p>
          </div>

          <div class="sub_unit">
            <h4>集合天才</h4>
            <p>個の力は微力でも、多くの英知や経験を合わせることで素晴らしい結果をもたらせる「集合天才」という考え方を大切にしています。<br>
              個人、企業や公的機関との集合天才化によってよりよい未来を実現します。</p>
          </div>

          <div class="sub_unit">
            <h4>企業家マインド<span>NewBusinessCreator&HumanvalueInnovator</span></h4>
            <p>私たちが目指すのは「起」業家でなく「企」業家。社会を変える「企て」をもった存在でありたいと考えています。そのために、自ら機会を創り出すNew Business Creater、関わる方々の可能性を信じ続けるHuman Value Innovatorとしての覚悟を持ち続けます。</p>
          </div>
        </div>

        <div class="base_unit">
          <h3>Vision</h3>
          <p>FCE HoldingsならびにFCEグループはチャレンジあふれる未来をつくりだすため<br>
            <strong>社会課題を解決する「新事業」創造企業を目指します</strong></p>
        </div>

        <div class="fcehd_unit">
          <h3>FCE Holdings</h3>

          <div class="sub_unit">
            <h4>New Business</h4>
            <p>わたしたちは現状に留まりません。次の10年を見ながら、新たな分野の開拓、新たな事業創造に挑戦し続けます。</p>
          </div>

          <div class="sub_unit">
            <h4>Education</h4>
            <p>グローバル化AI時代への対応、ICT教育、教員の方々の働き方改革や学習環境などがテーマとなっています。</p>
          </div>

          <div class="sub_unit">
            <h4>Working</h4>
            <p>働き方改革や人材不足、企業のDX推進、生産性向上や人材育成などがテーマとなっています。</p>
          </div>

          <div class="sub_unit">
            <h4>Life</h4>
            <p>個の生き方がさらに重視される中で、それぞれが抱える課題を解決し、豊かな人生を送れるかをテーマにしています。</p>
          </div>
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
