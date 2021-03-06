<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

  <meta name="og:locale" content="ja_JP">
  <meta name="og:type" content="article">
  <meta name="og:title" content="">
  <meta name="og:description" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="stylesheet" href="/bin/css/index.min.css?ver=<?php echo date("U"); ?>">
  <link rel="stylesheet" href="/bin/css/icon-fonts.css">
  <link rel="stylesheet" href="/bin/css/slick.css">
  <link rel="stylesheet" href="/bin/css/slick-theme.css">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="canonical" href="">

</head>

<body>

  <?php require_once "./header.php";?>

  <!-- 背景三角 -->
  <div class="bg-triangle">
    <svg class="svg-to-bottom" xmlns="http://www.w3.org/2000/svg" width="166" height="141" viewBox="0 0 166 141">
      <path d="M83,0l83,141H0Z" transform="translate(166 141) rotate(180)" fill="#eee"/>
    </svg>
    <svg class="svg-to-top" xmlns="http://www.w3.org/2000/svg" width="161" height="144" viewBox="0 0 161 144">
      <path d="M80.5,0,161,144H0Z" fill="#eee"/>
    </svg>
  </div>

  <!-- 背景LINE -->
  <div class="bg-stripe"></div>

  <!-- ローディング -->
  <div class="loading">
    <div class="logo">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 152.18 76.67"><path class="cls-1" d="M0,56.39H17.51v-23h25V24h-25V10.42H43.87V1.08H0Z"/><path class="cls-1" d="M80.61,0C61.31,0,48.34,11.53,48.34,28.68c0,13,8.18,28.48,31.24,28.48A46.38,46.38,0,0,0,101.29,52V40.53c-7,4-11.85,5.33-17.26,5.33-10.33,0-18.34-7.71-18.34-17.33S72.72,11,83.86,11a40.89,40.89,0,0,1,16.91,3.9V3.09C93.94,1.46,87.66,0,80.61,0Z"/><path class="cls-1" d="M109.52,56.39H152V47.05H127V33.35h22.76V24H127V10.42h25V1.08H109.52Z"/><path class="cls-1" d="M0,66.22H4.43v1.11H1.37v2.31H4.25v1.12H1.37v3.77H0Z"/><path class="cls-1" d="M8.93,73.79h0a1.78,1.78,0,0,1-1.6.9c-.93,0-1.56-.43-1.56-2V68.27H7v4.49c0,.7.32.93.85.93a1,1,0,0,0,1-1V68.27h1.26v6.26H8.93Z"/><path class="cls-1" d="M11.36,68.27h.86V66.48h1.26v1.79h1v.93h-1v3.73c0,.49.14.67.57.67a2.48,2.48,0,0,0,.45,0v.93a4,4,0,0,1-1,.11c-.85,0-1.27-.24-1.27-1.52V69.2h-.86Z"/><path class="cls-1" d="M19,73.79h0a1.81,1.81,0,0,1-1.61.9c-.93,0-1.56-.43-1.56-2V68.27H17v4.49c0,.7.31.93.85.93a1,1,0,0,0,1-1V68.27h1.26v6.26H19Z"/><path class="cls-1" d="M21.83,68.27h1.25v1h0a1.55,1.55,0,0,1,1.45-1.14,1,1,0,0,1,.3.05v1.28a2.5,2.5,0,0,0-.52-.07c-.57,0-1.26.26-1.26,1.42v3.75H21.83Z"/><path class="cls-1" d="M27.65,68.18c-1.33,0-2.25,1.35-2.25,3.29s.94,3.11,2.53,3.11a3.74,3.74,0,0,0,1.62-.38l-.06-1.09a2.11,2.11,0,0,1-1.42.45c-1,0-1.46-.58-1.46-1.77v0h3.23V71.5C29.84,69.33,29.08,68.18,27.65,68.18Zm1,2.7h-2v0c0-.8.27-1.72,1-1.72.44,0,1,.3,1,1.72Z"/><path class="cls-1" d="M46.74,68.18c-1.32,0-2.25,1.35-2.25,3.29s.95,3.11,2.53,3.11a3.74,3.74,0,0,0,1.62-.38l-.06-1.09a2.09,2.09,0,0,1-1.42.45c-1,0-1.46-.58-1.46-1.77v0h3.23V71.5C48.93,69.33,48.17,68.18,46.74,68.18Zm1,2.7h-2v0c0-.8.27-1.72,1-1.72.45,0,1,.3,1,1.72Z"/><path class="cls-1" d="M61.7,68.18c-1.32,0-2.25,1.35-2.25,3.29s.95,3.11,2.53,3.11a3.84,3.84,0,0,0,1.63-.38l-.06-1.09a2.14,2.14,0,0,1-1.43.45c-1,0-1.46-.58-1.46-1.77v0h3.23V71.5C63.89,69.33,63.13,68.18,61.7,68.18Zm1,2.7h-2v0c0-.8.27-1.72,1-1.72.45,0,1,.3,1,1.72Z"/><path class="cls-1" d="M110,68.18c-1.33,0-2.25,1.35-2.25,3.29s.94,3.11,2.53,3.11a3.74,3.74,0,0,0,1.62-.38l-.06-1.09a2.11,2.11,0,0,1-1.42.45c-1,0-1.46-.58-1.46-1.77v0h3.22V71.5C112.21,69.33,111.46,68.18,110,68.18Zm1,2.7h-2v0c0-.8.27-1.72,1-1.72.44,0,1,.3,1,1.72Z"/><path class="cls-1" d="M125,68.18c-1.32,0-2.25,1.35-2.25,3.29s1,3.11,2.54,3.11a3.83,3.83,0,0,0,1.62-.38l-.06-1.09a2.13,2.13,0,0,1-1.42.45c-1,0-1.47-.58-1.47-1.77v0h3.23V71.5C127.14,69.33,126.38,68.18,125,68.18Zm1,2.7h-2v0c0-.8.28-1.72,1-1.72.45,0,1,.3,1,1.72Z"/><path class="cls-1" d="M136.06,68.18c-1.32,0-2.25,1.35-2.25,3.29s.95,3.11,2.53,3.11A3.84,3.84,0,0,0,138,74.2l-.06-1.09a2.13,2.13,0,0,1-1.42.45c-1,0-1.47-.58-1.47-1.77v0h3.23V71.5C138.25,69.33,137.49,68.18,136.06,68.18Zm1,2.7h-2v0c0-.8.28-1.72,1-1.72.45,0,1,.3,1,1.72Z"/><path class="cls-1" d="M38,66c-2.22,0-3.6,1.65-3.6,4.3s1.4,4.3,3.65,4.3a4.39,4.39,0,0,0,1.66-.27l-.07-1.22a2.58,2.58,0,0,1-1.45.37c-1.49,0-2.38-1.19-2.38-3.18s.89-3.18,2.38-3.18a2.85,2.85,0,0,1,1.45.41l.07-1.2A4.57,4.57,0,0,0,38,66Z"/><path class="cls-1" d="M41.13,68.27h1.26v1h0a1.56,1.56,0,0,1,1.46-1.14,1,1,0,0,1,.3.05v1.28a2.5,2.5,0,0,0-.52-.07c-.57,0-1.26.26-1.26,1.42v3.75H41.13Z"/><path class="cls-1" d="M53.06,70.83c-2,0-2.89.63-2.89,2.11a1.67,1.67,0,0,0,1.62,1.82,2.94,2.94,0,0,0,1.56-.62l.07-.06v.09a1.21,1.21,0,0,0,0,.43l0,.07h1.13a9.75,9.75,0,0,1-.07-1.08V70.81c0-2.08-.83-2.51-2.09-2.51a3.55,3.55,0,0,0-1.72.45l.07,1.12a2.41,2.41,0,0,1,1.49-.57c.69,0,1.08.45,1.08,1.25v.28Zm-.82,3a.9.9,0,0,1-.9-1c0-1.1.94-1.24,1.87-1.24h.16V72C53.37,73.22,53,73.81,52.24,73.81Z"/><path class="cls-1" d="M55.53,68.27h.86V66.48h1.26v1.79h1v.93h-1v3.73c0,.49.14.67.57.67a2.48,2.48,0,0,0,.45,0v.93a4,4,0,0,1-1,.11c-.85,0-1.27-.24-1.27-1.52V69.2h-.86Z"/><path class="cls-1" d="M68.55,73.76h0a1.35,1.35,0,0,1-1.38.93c-1.46,0-2.05-1.22-2.05-3.37,0-2.79,1-3.22,1.94-3.22a1.47,1.47,0,0,1,1.42.9h0V66.22h1.26v8.31H68.55ZM67.41,69.1c-.72,0-1,.59-1,2.27,0,1.42.19,2.32,1.06,2.32s1.06-.88,1.06-2.22C68.55,70,68.38,69.1,67.41,69.1Z"/><path class="cls-1" d="M74.3,66.22h1.26V69h0A1.46,1.46,0,0,1,77,68.1c1,0,1.93.43,1.93,3.22,0,2.15-.58,3.37-2.05,3.37a1.33,1.33,0,0,1-1.37-.93h0v.77H74.3Zm2.25,7.47c.87,0,1.06-.9,1.06-2.32,0-1.68-.26-2.27-1-2.27-1,0-1.14.87-1.14,2.37C75.49,72.81,75.69,73.69,76.55,73.69Z"/><path class="cls-1" d="M80.88,68.27,82,73h0l1-4.7H84.3l-1.72,6.49c-.49,1.71-.9,1.93-2.19,1.91a2.83,2.83,0,0,1-.5,0v-1a2.87,2.87,0,0,0,.41,0c.43,0,.71-.09.85-.49l.16-.51-1.78-6.4Z"/><path class="cls-1" d="M88.43,66.22h4.5v1.11H89.76v2.31h3v1.12h-3v2.65H93v1.12H88.43Z"/><path class="cls-1" d="M94.52,68.27h1.19V69h0a1.81,1.81,0,0,1,1.61-.9c1,0,1.56.43,1.56,1.7v4.73H97.65v-4.3c0-.81-.24-1.13-.87-1.13s-1,.41-1,1.23v4.2H94.52Z"/><path class="cls-1" d="M99.84,68.27h.86V66.48H102v1.79h1v.93h-1v3.73c0,.49.14.67.57.67a2.48,2.48,0,0,0,.45,0v.93a4,4,0,0,1-1,.11c-.85,0-1.27-.24-1.27-1.52V69.2h-.86Z"/><path class="cls-1" d="M104.38,68.27h1.26v1h0a1.56,1.56,0,0,1,1.46-1.14,1,1,0,0,1,.3.05v1.28a2.62,2.62,0,0,0-.53-.07c-.57,0-1.25.26-1.25,1.42v3.75h-1.26Z"/><path class="cls-1" d="M113.34,68.27h1.19V69h0A1.5,1.5,0,0,1,116,68.1c1.43,0,2,1.23,2,3.38,0,2.63-1.07,3.21-1.93,3.21a1.45,1.45,0,0,1-1.42-.9h0v2.79h-1.26Zm2.26,5.42c.72,0,1.05-.54,1.05-2.27,0-1.42-.19-2.32-1.06-2.32s-1.06.89-1.06,2.23C114.53,72.83,114.71,73.69,115.6,73.69Z"/><path class="cls-1" d="M119.22,68.27h1.25v1h0A1.55,1.55,0,0,1,122,68.1a1.18,1.18,0,0,1,.31.05v1.28a2.73,2.73,0,0,0-.53-.07c-.57,0-1.26.26-1.26,1.42v3.75h-1.25Z"/><path class="cls-1" d="M128.4,68.27h1.19V69h0a1.81,1.81,0,0,1,1.61-.9c1,0,1.56.43,1.56,1.7v4.73h-1.26v-4.3c0-.81-.24-1.13-.87-1.13s-1,.41-1,1.23v4.2H128.4Z"/><path class="cls-1" d="M142.5,73.79h0a1.81,1.81,0,0,1-1.61.9c-.93,0-1.56-.43-1.56-2V68.27h1.26v4.49c0,.7.31.93.85.93a1,1,0,0,0,1-1V68.27h1.26v6.26H142.5Z"/><path class="cls-1" d="M145.18,68.27h1.26v1h0a1.55,1.55,0,0,1,1.45-1.14,1.18,1.18,0,0,1,.31.05v1.28a2.73,2.73,0,0,0-.53-.07c-.57,0-1.25.26-1.25,1.42v3.75h-1.26Z"/><path class="cls-1" d="M148.68,74.29a4,4,0,0,0,1.49.29,1.8,1.8,0,0,0,2-1.81c0-.7-.31-1-1-1.56l-.65-.47c-.38-.27-.64-.47-.64-.84s.14-.66.8-.66a2.77,2.77,0,0,1,1.13.26l.07-1.08a3.94,3.94,0,0,0-1.34-.24,1.8,1.8,0,0,0-1.86,1.74,1.94,1.94,0,0,0,1.13,1.72l.56.38c.43.29.61.53.61.83,0,.45-.29.67-.9.67a3,3,0,0,1-1.3-.37l0,0Z"/></svg>
    </div>
  </div>

  <main class="wrapper">

    <!-- メインビジュアル -->
    <div class="main-visual">
      <div class="inner">
        <div class="catch">
          あえて、挑め。
        </div>
        <div class="lead">
          大胆に、自分らしく、もっと自由に。<br>
          その逆風を楽しみながら。
        </div>
      </div>

      <div class="particle-left">
        <object class="b1 particle" type="image/svg+xml" data="/bin/image/b1.svg"></object>
        <object class="y1 particle" type="image/svg+xml" data="/bin/image/y1.svg"></object>
      </div>

      <div class="particle-right">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
          y="0px" viewBox="0 0 1158.1 816.3" style="enable-background:new 0 0 1158.1 816.3;" xml:space="preserve">
        <style type="text/css">
          .st0{fill:#FFF100;}
          .st1{fill:#EF001F;}
          .st2{fill:#35ABEB;}
        </style>
        <path id="y3" class="particle y3 st0" d="M946.8,0l-192,173.2l19.8,190.1L946.8,0z"/>
        <path id="r1" class="particle r1 st1" d="M774.5,363.3l-98.1,336.8L0,627.7L774.5,363.3z"/>
        <path id="y2" class="particle y2 st0" d="M774.6,363.3l273.3,453l76.6-331.7L774.6,363.3z"/>
        <path id="b2" class="particle b2 st2" d="M774.4,363.3l283,99l100.7-333.6L774.4,363.3z"/>
        </svg>
      </div>

    </div>

    <!-- What’s FCE -->
    <section class="whats anim bg-animation rd">

      <div class="inner">
        <h2 class="heading">What’s FCE<small>FCEグループとは</small></h2>

        <div class="bg-particles anim">
          <object class="bg1 particle animateme" type="image/svg+xml" data="/bin/image/bg_1.svg"></object>
          <object class="bg3 particle animateme" type="image/svg+xml" data="/bin/image/bg_3.svg"></object>
          <object class="bg2 particle animateme" type="image/svg+xml" data="/bin/image/bg_2.svg"></object>
          <object class="bg4 particle animateme" type="image/svg+xml" data="/bin/image/bg_4.svg"></object>
        </div>

        <ul class="anim-list">
          <li class="message">
          <h3>つくりたいのは、チャレンジあふれる未来！</h3>
          <p>
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
          <h3>OneTeam=集合天才？</h3>
          <p>
            グループ内で共有することで、さらに大きなシナジーを発揮し、お客様に圧倒的な貢献と<br>
            成長をもたらせるよう「ワンチーム」として取り組んでいます。
          </p>
        </li>

        </ul>

        <div class="btn_set"><span class="button wt"><a href="#">View More</a></span></div>
      </div>

    </section>

    <!-- Team! FCE -->
    <section class="team anim">
      <h2 class="heading">Challenge! Change! FCE<small>FCEの未来を変える事業たち</small></h2>
      <ul class="flex-center anim-list">
        <li>
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
        <li>
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
        <li>
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

    <!-- Service -->
    <section class="service anim bg-animation bl inview">
      <div class="inner">
        <div class="section-header flex-between align-end">
          <h2 class="heading">Service<small>商品・サービス</small></h2>
          <div class="button">
            <a href="#">View More</a>
          </div>
        </div>
        <ul class="flex-center anim-list">
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/service_1.png" alt="">
              </figure>
              パソコン業務はロボに任せる時代へ！
              プログラミングの知識不要！事務
              職でも直感的に操作できるRPA
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/service_2.png" alt="">
              </figure>
              パソコン業務はロボに任せる時代へ！
              プログラミングの知識不要！事務
              職でも直感的に操作できるRPA
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/service_3.png" alt="">
              </figure>
              パソコン業務はロボに任せる時代へ！
              プログラミングの知識不要！事務
              職でも直感的に操作できるRPA
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/service_4.png" alt="">
              </figure>
              パソコン業務はロボに任せる時代へ！
              プログラミングの知識不要！事務
              職でも直感的に操作できるRPA
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/service_4.png" alt="">
              </figure>
              スライド動作確認用
            </a>
          </li>
        </ul>
      </div>
    </section>

    <!-- さぁ、次は何を変えようか？ -->
    <section class="next inner anim">
      <div class="section-header flex-between align-end">
        <h2 class="heading">Team!FCE<small>FCEの仲間たち</small></h2>
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

        <div class="button">
          <a href="#">View More</a>
        </div>
      </div>
      <div class="box-left photo">
        <img src="/bin/image/img_1.png" alt="">
      </div>
    </section>

    <!-- FaCE！ -->
    <section class="face anim">
      <div class="inner">
        <div class="section-header flex-between align-end">
          <h2 class="heading">FaCE！<small>FCEの素顔系メディア</small></h2>
          <nav class="face-nav">
            <ul class="flex-between">
              <li>ALL</li>
              <li>仲間たち</li>
              <li>出来事</li>
              <li>ビジネス</li>
              <li>カルチャー</li>
              <li>お知らせ</li>
            </ul>
          </nav>
        </div>
        <ul class="articles anim-list">
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
          <li>
            <a href="#" class="hover-effect">
              <figure class="hover-img">
                <img src="/bin/image/face.png" alt="">
              </figure>
              <dl>
                <dt class="flex-between align-end">
                  <span class="tag">仲間たち</span>
                  <span class="date">2020.01.29</span>
                </dt>
                <dd>マネジメントに質問力を。自走するチームを作る経営者向けメソッド公開講座</dd>
              </dl>
            </a>
          </li>
        </ul>
        <div class="button">
          <a href="#">View More</a>
        </div>
      </div>
    </section>

    <!-- News -->
    <section class="news inner">
      <div class="section-header flex-between align-end">
        <h2 class="heading">News<small>新着情報</small></h2>
        <div class="button">
          <a href="#">View More</a>
        </div>
      </div>
      <ul>
        <li><time>2018.02.16</time><span class="meta">お知らせ</span><span class="text">FCEグループが「働きがいのある会社」女性ランキングで、５位にランクインしました。</span></li>
        <li><time>2018.02.09 </time><span class="meta">プレスリリース</span><span class="text">FCEグループが「働きがいのある会社」ランキングで、6年連続ベストカンパニーの1社に選ばれました</span></li>
        <li><time>2018.02.05 </time><span class="meta">プレスリリース</span><span class="text">ダイニングエッジインターナショナルが運営する串カツ田中『川口店』が串カツ田中フォーラムにて優秀店舗に選ばれました。</span></li>
        <li><time>2017.04.10 </time><span class="meta">お知らせ</span><span class="text">「フードビズ」に掲載された出店力総チェックで「がブリチキン。」は居酒屋バル業態の中では4位にランクインしました</span></li>
        <li><time>2017.02.10 </time><span class="meta">露出</span><span class="text">「働きがいのある会社ランキング」で、5年連続ベストカンパニーの1社に選ばれました</span></li>
        <li><time>2016.02.12</time><span class="meta">露出</span><span class="text">「働きがいのある会社」ランキングで、4年連続ベストカンパニーの1社に選ばれました</span></li>
      </ul>
    </section>

    <!-- Recruit -->
    <section class="recruit anim bg-animation rd">
      <h2 class="heading"><a href="#">Recruit<small>採用情報</small></a></h2>
    </section>

  </main>

  <?php require_once "./footer.php";?>

  <script src="/bin/js/jquery-3.3.1.min.js"></script>
  <script src="/bin/js/jquery.inview.min.js"></script>
  <script src="/bin/js/main.min.js"></script>
  <script src="/bin/js/slick.js"></script>
  <script>
  $(function(){
    $('.service ul').slick({
      autoplay:true,
      autoplaySpeed:5000,
      dots:true,
      centerMode: false,
      slidesToShow:4,
      slidesToScroll:1,
      focusOnSelect:true,
      infinite:false,
      arrow:false,
      responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow:4
        }
      },{
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },{
        breakpoint: 540,
        settings: {
          slidesToShow: 1
        }
      }
    ]
    });
  });
  </script>

</body>

</html>
