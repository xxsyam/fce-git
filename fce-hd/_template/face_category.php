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

  <link rel="stylesheet" href="/bin/css/face.min.css">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="canonical" href="">

</head>

<body id="body">

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

  <main class="wrapper face_detail category_list">

    <!-- メインビジュアル -->
    <div class="main-visual bg-animation anim wt">
      <div class="inner">
        <h2 class="heading">FaCE!<small>FCEグループ素顔系メディア</small></h2>
        <div class="breadcrumb">
          <a href="#">HOME</a> ＞ FaCE!
        </div>
      </div>
      <nav class="detail_face-nav anim">
        <ul class="inview">
          <li><a href="./face_category.php">ALL</a></li>
          <li><a href="./face_category.php">仲間たち</a></li>
          <li><a href="./face_category.php">出来事</a></li>
          <li><a href="./face_category.php">ビジネス</a></li>
          <li><a href="./face_category.php">カルチャー</a></li>
          <li><a href="./face_category.php">お知らせ</a></li>
        </ul>
      </nav>
      <div class="main-bg">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
        y="0px" viewBox="0 0 1092.4 596.2" style="enable-background:new 0 0 1092.4 596.2;" xml:space="preserve">
      <style type="text/css">
        .st0{fill:#35ABEB;}
        .st1{fill:#FFF100;}
        .st2{fill:#EF001F;}
        .st3{clip-path:url(#SVGID_2_);}
        .st4{fill:#FFFFFF;}
      </style>
      <g>
        <g transform="translate(459.229 102.705)">
          <path class="st0" d="M-372,149.3l157.6,260.8l-244.8-51.6L-372,149.3z"/>
          <path class="st1" d="M259,493.5l-473.4-83.8L-372,149.3L259,493.5z"/>
          <path class="st1" d="M486.5-102.7L353.2,17.5l13.7,132L486.5-102.7z"/>
          <path class="st2" d="M366.9,149.5l-68.1,233.8L-170.7,333L366.9,149.5z"/>
          <path class="st1" d="M366.9,149.5L556.7,464l53.2-230.3L366.9,149.5z"/>
          <path class="st0" d="M366.8,149.5l196.4,68.7l69.9-231.6L366.8,149.5z"/>
        </g>
      </g>
      <g>
        <defs>
          <rect id="SVGID_1_" x="-128.2" y="-102.7" width="1109" height="510"/>
        </defs>
        <clipPath id="SVGID_2_">
          <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
        </clipPath>
        <g id="マスクグループ_4" transform="translate(-3950 1443.692)" class="st3">
          <g id="グループ_2-2" transform="translate(4409.229 -1340.987)">
            <path id="シェイプ_1-2" class="st0" d="M-372,149.3l157.6,260.8l-244.8-51.6L-372,149.3z"/>
            <path id="シェイプ_2-2" class="st1" d="M259,493.5l-473.4-83.8L-372,149.3L259,493.5z"/>
            <path id="シェイプ_2_のコピー_5-2" class="st1" d="M486.5-102.7L353.2,17.5l13.7,132L486.5-102.7z"/>
            <path id="シェイプ_3-2" class="st4" d="M366.9,149.5l-68.1,233.8L-170.7,333L366.9,149.5z"/>
            <path id="シェイプ_4-2" class="st1" d="M366.9,149.5L556.7,464l53.2-230.3L366.9,149.5z"/>
            <path id="シェイプ_4_のコピー-2" class="st0" d="M366.8,149.5l196.4,68.7l69.9-231.6L366.8,149.5z"/>
          </g>
        </g>
      </g>
      </svg>
      </div>

    </div>

    <!-- Articles -->
    <section class="articles inner anim">


      <div class="flex-center">

        <div class="article-left anim">
          <ul class="article-list anim-list">
            <?php for($i = 0; $i < 10; $i++){?>
            <li>
              <a href="./face_detail.php" class="hover-effect">
                <figure class="hover-img">
                  <img src="/bin/image/face1.png" alt="">
                </figure>
                <dl>
                  <dt class="flex-between align-end">
                    <span class="tag">仲間たち</span>
                    <span class="date">2020.01.29</span>
                  </dt>
                  <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
                </dl>
              </a>
            </li>
            <?}?>

          </ul>
          <div class="pagination">
            <ul class="pagination-box"><li><a href="page/1/">«</a></li><li><a href="/page/2/">‹</a></li><li><a href="/page/2/" class="inactive">2</a></li><li><span class="current">3</span></li><li><a href="/page/4/" class="inactive">4</a></li><li><a href="/page/4/">›</a></li><li><a href="/page/5/">»</a></li></ul>
          </div>
        </div>

        <div class="article-right anim">
          <div class="articles ranking anim">
            <h3>Articles</h3>
            <ul class="article-list anim-list">
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
                  </dl>
                </a>
              </li>
            </ul>
          </div>

          <div class="rankings ranking anim">
            <h3>Ranking</h3>
            <ul class="article-list anim-list">
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
                  </dl>
                </a>
              </li>
            </ul>
          </div>

          <div class="onestories ranking anim">
            <h3>OneStory</h3>
            <ul class="article-list anim-list">
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
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
                    <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
                  </dl>
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section>


    <!-- #One Story -->
    <section class="onestory inner anim">
      <h2 class="heading">#One Story<small>FCEの仲間たちが語る「One Story」</small></h2>
      <ul class="anim-list">
        <li>
          <a href="#" class="hover-effect">
            <figure class="hover-img">
              <img src="/bin/image/face1.png" alt="">
            </figure>
            <dl>
              <dt class="flex-between align-end">
                <span class="tag">仲間たち</span>
                <span class="date">2020.01.29</span>
              </dt>
              <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <figure class="hover-img">
              <img src="/bin/image/face2.png" alt="">
            </figure>
            <dl>
              <dt class="flex-between align-end">
                <span class="tag">仲間たち</span>
                <span class="date">2020.01.29</span>
              </dt>
              <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
            </dl>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <figure class="hover-img">
              <img src="/bin/image/face3.png" alt="">
            </figure>
            <dl>
              <dt class="flex-between align-end">
                <span class="tag">仲間たち</span>
                <span class="date">2020.01.29</span>
              </dt>
              <dd>臆病だった私が考え方を変えたらHRアワードで最優秀賞受賞！？</dd>
            </dl>
          </a>
        </li>
      </ul>

      <div class="particle-left">
        <svg xmlns="http://www.w3.org/2000/svg" width="718.229" height="344.176" viewBox="0 0 718.229 344.176">
          <g transform="translate(0 -251.993)">
            <path d="M74.022,618.738,231.576,879.566-13.219,828.014Z" transform="translate(13.219 -366.745)" fill="#35abeb"/>
            <path d="M753.928,962.915,280.493,879.086,122.94,618.738Z" transform="translate(-35.699 -366.745)" fill="#fff100"/>
          </g>
        </svg>
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

    </section>


  </main>

  <script src="/bin/js/jquery-3.3.1.min.js"></script>
  <script src="/bin/js/jquery.inview.min.js"></script>
  <script src="/bin/js/main.min.js"></script>

</body>

</html>
