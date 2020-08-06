{% if sf_user.isLogin() %}
  {% set isLogin = true %}
  {% set member = sf_user.getMember() %}
{% else %}
  {% set isLogin = false %}
{% endif %}

{% if isLogin %}
{# fal-sとのシングルサインオン用 start #}
{% set falsMemberId = "%08d"|format(sf_user.getMemberId()) %}
{% set falsDate = "now"|date('YmdHis') %}
<script>
var postForm = function(url, data) {
  var $form = $('<form/>', {'action': url, 'method': 'post', 'target': '_blank'});
  for(var key in data) {
    $form.append($('<input/>', {'type': 'hidden', 'name': key, 'value': data[key]}));
  }
  $form.appendTo(document.body);
  $form.submit();
};

$(function(){
  $('.fals_sso_link').click(
    function(){
      var data = {
        'member_id': '{{falsMemberId}}',
        'site': 1,
        'member_type': '0',
        'datetime': '{{falsDate}}',
        'data': '{{ get_sso_hash([falsMemberId,'1', '0', falsDate], sf_config_get('sc_fals_secret_key')) }}',
      };
      postForm('{{ sf_config_get('sc_fals_sso_api_uri') }}', data);
    }
  );
});
</script>
{# fal-sとのシングルサインオン用 end #}

{# えらべる倶楽部とのシングルサインオン用 start #}
{% set falsDate = "now"|date('YmdHis') %}
{% set compid = sf_config_get('sc_eclub_compid') %}
{% set mnumber = sf_user.getMember().getSsoMemberId() %}
<script>
var postForm = function(url, data) {
  var $form = $('<form/>', {'action': url, 'method': 'post', 'target': '_blank'});
  for(var key in data) {
    $form.append($('<input/>', {'type': 'hidden', 'name': key, 'value': data[key]}));
  }
  $form.appendTo(document.body);
  $form.submit();
};
$(function(){
  $('.eclub_sso_link').click(
    function(){
      var data = {
        'compid': '{{compid}}',
        'mnumber': '{{mnumber}}',
        'time': '{{falsDate}}',
        'data': '{{ get_sso_hash([compid, mnumber, falsDate], sf_config_get('sc_eclub_secret_key'), 'sha256', '') }}',
      };
      postForm('{{ sf_config_get('sc_eclub_sso_api_uri') }}', data);
    }
  );
});
</script>
{# えらべる倶楽部とのシングルサインオン用 end #}

{# ジオスオンラインとのシングルサインオン用 start #}
{% set geosMemberId = sf_user.getMemberId() %}
{% set geosDate = "now"|date('YmdHis') %}
<script>
var geosForm = function(url, data) {
  var $form = $('<form/>', {'action': url, 'method': 'post', 'target': '_blank'});
  for(var key in data) {
    $form.append($('<input/>', {'type': 'hidden', 'name': key, 'value': data[key]}));
  }
  $form.appendTo(document.body);
  $form.submit();
};

$(function(){
  $('#geosonline_sso_link').click(
    function(){
      var data = {
        'site': 'f',
        'member_id': '{{geosMemberId}}',
        'time': '{{geosDate}}',
        'data': '{{ get_sso_hash(["f", geosMemberId, geosDate], sf_config_get("sc_geosonline_secret_key")) }}',
      };
      geosForm('{{ sf_config_get('sc_geosonline_sso_api_uri') }}', data);
    }
  );
});
</script>
{# ジオスオンラインとのシングルサインオン用 end #}

{% endif %}
<header>
  <div id="HEADER_UPPER_PART" class="is-pc">
    <h1 id="UPPER_LOGO"><a href="{{url_for('@homepage')|raw}}"><img alt="ウェブで授業見学　Find!アクティブ・ラーナー" src="/uploads/files/images/logo_white.png"></a></h1>
    <nav>
      <ul>
        <li><a href="/pub/about">Find！アクティブラーナーとは</a></li>
        <li><a href="/pub/index">学校導入版について</a></li>
         {% if isLogin %}<li class="fals_sso_link"><a href="javascript:void(0);">シェアサービス</a></li>{% endif %}
        <li><a href="/ec">オンラインショップ</a></li>
      </ul>
    </nav>
  </div>
  <div id="HEADER_MIDDLE_PART" class="is-pc"> <span id="MIDDLE_LOGO"><a href="{{url_for('@homepage')|raw}}"><img alt="ウェブで授業見学　Find!アクティブ・ラーナー" src="/uploads/files/images/logo_main.png"></a></span>
    <nav>{% if isLogin %}
      <ul id="is-login-pc">
        <li><a href="/search?sort=s"><img alt="新着順" src="/uploads/files/images/icon_new.png"><span>新着順</span></a></li>
        <li><a href="/search?sort=v"><img alt="ランキング" src="/uploads/files/images/icon_ranking.png"><span>ランキング</span></a></li>
        <li><a href="#" id="BTN_DD_SEARCH" data-toggle="DROPDOWN_SEARCH_FIELD"><img alt="さがす" src="/uploads/files/images/icon_searches.png"><span>さがす</span></a></li>
        <li><a href="#" id="BTN_DD_MENU" data-toggle="DROPDOWN_MENU_FIELD"><img alt="メニュー" src="/uploads/files/images/icon_mymenu.png"><span>メニュー</span></a></li>
      </ul>
      {% else %}
      {#
		<ul id="is-loginnew-pc">
        <li><a href="https://school-fal.com/" target="_blank" class="btn-style btn-login school_login">学校会員ログイン</a></li>
        <li><a class="btn-style btn-login personal_login" data-toggle="modal" data-target="#modal-login">個人会員ログイン</a></li>
        <<li><a class="btn btn-style btn-detail" href="{{url_for('member_authRegister')}}">無料視聴登録</a></li>
        <li><a class="btn btn-style btn-detail" href="/pub/about">初めての方へ</a></li>
      </ul>
	  #}
      <div id="is-loginnew-pc">
        <dl>
          <dt>学校会員の方</dt>


          <dd><a class="btn-style btn-login school_login" href="https://school-fal.com" target="_blank" onclick="ga('send', 'event', 'click', 'link', 'PC学校会員ログイン', {'nonInteraction': 1});">ログイン</a></dd>
        </dl>
        <dl>
          <dt>一般個人の方</dt>
          <dd><a class="btn-style btn-login personal_login" data-toggle="modal" data-target="#modal-login" onclick="ga('send', 'event', 'click', 'link', 'PCログイン', {'nonInteraction': 1});">ログイン</a><a class="btn btn-style btn-detail" href="/pub/about" onclick="ga('send', 'event', 'click', 'link', 'PC初めての方', {'nonInteraction': 1});">初めての方</a></dd>
        </dl>
      </div>
      {% endif %}</nav>
  </div>
  <script>
$(document).ready(function(){
      $("#BTN_DD_SEARCH").click(function(){
        if($("#BTN_DD_MENU").hasClass("active")){
          $("#BTN_DD_MENU").removeClass("active");
          $("#DROPDOWN_MENU_FIELD").slideToggle();
          $("#DROPDOWN_SEARCH_FIELD").slideToggle();
          $(this).toggleClass("active");
        }else{
          $("#DROPDOWN_SEARCH_FIELD").slideToggle();
          $(this).toggleClass("active");
        }
      });
      $("#BTN_DD_MENU").click(function(){
        if($("#BTN_DD_SEARCH").hasClass("active")){
          $("#BTN_DD_SEARCH").removeClass("active");
          $("#DROPDOWN_SEARCH_FIELD").slideToggle();
          $("#DROPDOWN_MENU_FIELD").slideToggle();
          $(this).toggleClass("active");
        }else{
          $("#DROPDOWN_MENU_FIELD").slideToggle();
          $(this).toggleClass("active");
        }
      });
  });
</script>
  <div id="DROPDOWN_MENU_FIELD" style="display:none;">
    <div class="section-wrap">
      <div class="dropdown-searchArea">
        <div class="custum-search-area">
          <div class="flex dropdown-mypageArea">
            <div class="user-profile"> <span class="user-icon"><i class="fa fa-user"></i></span> {% if member.isPremiumMember() %}
              {% set subscriptions = member.getSubscription() %}
              {% for subscription in subscriptions %} <span class="user-plan premium">{{ subscription.getName() }}</span> {% endfor %}
              {% else %} <span class="user-plan premium">無料アカウント</span> {% endif %}
              <p>{{ member.getName() }}さん<br><span style="background:#fff; display:inline-block; padding:0 5px; border-radius: 3px; margin-top: 5px;">ID：{{member.getId()}}</span></p>
            </div>
            <div class="user-info"> {# <a href="###">コメント履歴<span class="mypage-count">{{ member.getConfig('count_comment', 0) }}</span></a> #}
              <div class="dropmenu-col2"> <a href="{{url_for('favorite_list')}}">お気に入り<span class="mypage-count">{{ member.getConfig('count_favorite', 0) }}</span></a> <a href="{{url_for('learning_history_index')}}">学習履歴<span class="mypage-count">{{ member.getConfig('count_play', 0) }}</span></a></div>
            </div>
            <div class="user-point">
              <div class="dropmenu-col2">
				  <a href="{{url_for('comment_commentedVideo', member)}}">コメント履歴<span class="mypage-count">{{ member.getConfig('count_comment', 0) }}</span></a>
				  {#
				  <a href="/point"><span>マイポイント</span><span>{{ sf_user.getMember().getPoint()|number_format }}</span><span>pt</span></a>
				  #}
				</div>
              <div class="dropmenu-col2 none"><a href="{{url_for('payment_history')}}">購入履歴</a></div>
              {#
              <div class="dropmenu-col2"><a href="javascript: void(0);" class="eclub_sso_link">えらべる倶楽部</a> </div>
              #} </div>
            <div class="user-settings"> <a href="{{url_for('member_setting')}}">設定変更</a> <a href="{{url_for('member_logout')}}">ログアウト</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="DROPDOWN_SEARCH_FIELD" style="display:none;">
    <div class="section-wrap">
      <div class="dropdown-searchArea">
        <div class="custum-search-area">
          <form action="/search" id="search01" class="box-search cf" aria-labelledby="search">
            <fieldset>
              <input class="form-control form-search" placeholder="キーワードを入力してください" name="contents_search[keyword]" id="contents_search_keyword" type="text">
              <button type="submit" class="btn btn-style btn-sm btn-search">検索</button>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="dropdown-btnArea">
        <p><i class="fa fa-search">&nbsp;</i>よく検索されているキーワード</p>
        <ul>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E5%BC%90%E5%88%86%E6%96%B9">弐分方</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E8%8B%B1%E8%AA%9E">英語</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E4%B8%8B%E6%9D%91+%E5%81%A5%E4%B8%80">下村 健一</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E7%A6%8F%E5%B3%B6">福島</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E6%95%B0%E5%AD%A6">数学</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E6%9C%A8%E4%B8%8B">木下</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E5%9B%BD%E8%AA%9E">国語</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E6%97%A5%E6%9C%AC%E5%8F%B2">日本史</a></li>
          <li><a href="/search?contents_search%5Bkeyword%5D=%E8%90%BD%E5%90%88">落合</a></li>
          　
        </ul>
      </div>
    </div>
  </div>
  <div id="HEADER_BOTTOM_PART" class="header-inner">
    <nav class="nav-area">
      <!-- pc-header start -->
      {% set pageId = sf_context.getModuleName()~'-'~sf_context.getActionName() %}
      {% set categoryList = [] %}
      {% if 'products-category' == pageId %}
      {% set category = get_category_obj(sf_request.getParameter('name')) %}
      {% set parentCategory = category.getParent() %}
      {% set categoryList = [category.getName(), parentCategory.getName()] %}
      {% endif %}
      <div class="is-pc">
        <ul id="TABLIST_LI" class="nav-btm-box flex">
          <li{% if pageId == 'member-home' %} class="active" {% endif %}>目次
          </li>
          <li{% if pageId == 'infomation-alList' %} class="active" {% endif %}><a href="/al/list">ニュース</a>
          </li>
          <!--<li{% if pageId == 'products-interview' %} class="active" {% endif %}><a href="/interview">インタビュー</a></li>-->
          <li{% if 'kohen' in categoryList %} class="active" {% endif %}><a href="/category/kohen">有識者講演</a>
          </li>
          <li{% if 'kengaku' in categoryList %} class="active" {% endif %}><a href="/category/kengaku">授業を見学する</a>
          </li>
          <li{% if 'child' in categoryList %} class="active" {% endif %}><a href="/category/child">子どもに伝える</a>
          </li>
          <li{% if 'skill' in categoryList %} class="active" {% endif %}><a href="/category/skill">スキルを身につける</a>
          </li>
          <li{% if 'chishiki' in categoryList %} class="active" {% endif %}><a href="/category/chishiki">知識を深める</a>
          </li>
          <li><a href="javascript: void(0);" class="nav-dropdown"> イベントから探す </a>
            <div class="dropdown">
              <div class="dropdown_wrapper search_box">
                <div class="dd_title">
                  <h3>イベントから探す</h3>
                  <div class="sub_title">Search for the events</div>
                  <!-- <div class="btn_golist"><a href="/category/event">一覧へ</a></div> -->
                </div>
                <div class="dd_base">
                  <div class="dd_base_wrap">
                    <div class="twocol_box event_box">
                      <h3>アクティブ・ラーニングフォーラム</h3>
                      <div class="dd_box_list">
                        <!--<div class="dd_box_pict"><img src="/uploads/files/images/dd_boxpict_dummy.png"></div>-->
                        <div>
                          <ul class="single_list_ul">
                            <li><a href="/search?{{{'contents_search[tag]': 'アクティブ・ラーニングフォーラム'}|url_encode}}">アクティブ・ラーニングフォーラム一覧</a></li>
                          </ul>
                          <ul class="double_list_ul">
                            <li><a href="/search?{{{'contents_search[tag]': '第10回アクティブ・ラーニングフォーラム'}|url_encode}}">第10回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第9回アクティブ・ラーニングフォーラム'}|url_encode}}">第9回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第8回アクティブ・ラーニングフォーラム'}|url_encode}}">第8回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第7回アクティブ・ラーニングフォーラム'}|url_encode}}">第7回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第6回アクティブ・ラーニングフォーラム'}|url_encode}}">第6回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第5回アクティブ・ラーニングフォーラム'}|url_encode}}">第5回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第4回アクティブ・ラーニングフォーラム'}|url_encode}}">第4回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第3回アクティブ・ラーニングフォーラム'}|url_encode}}">第3回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第2回アクティブ・ラーニングフォーラム'}|url_encode}}">第2回</a></li>
                            <li><a href="/search?{{{'contents_search[tag]': '第1回アクティブ・ラーニングフォーラム'}|url_encode}}">第1回</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="twocol_box event_box">
                      <h3>チャレンジカップ</h3>
                      <div class="dd_box_list mb20">
                      <div>
                        <ul class="single_list_ul">
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ'}|url_encode}}">チャレンジカップ一覧</a></li>
                        </ul>
                        <ul class="double_list_ul">
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１７'}|url_encode}}">チャレンジカップ2017</a></li>
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１６'}|url_encode}}">チャレンジカップ2016</a></li>
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１５'}|url_encode}}">チャレンジカップ2015</a></li>
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１４'}|url_encode}}">チャレンジカップ2014</a></li>
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１３'}|url_encode}}">チャレンジカップ2013</a></li>
                          <li><a href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１２'}|url_encode}}">チャレンジカップ2012</a></li>
                        </ul>
                      </div>

                      </div>
                      <h3>その他のイベント</h3>
                      <div class="dd_box_list">
                        <div>
                          <ul class="single_list_ul">
                            <li><a href="/search?{{{'contents_search[tag]': 'その他イベント'}|url_encode}}">その他イベント</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li> <a href="javascript: void(0);" class="nav-dropdown"> 有識者・先生から探す </a>
            <div class="dropdown">
              <div class="dropdown_wrapper search_box">
                <div class="dd_title">
                  <h3>有識者・先生から探す</h3>
                  <div class="sub_title">Search for the lecturer</div>
                  <!-- <div class="btn_golist"><a href="/category/event">一覧へ</a></div> -->
                </div>
                <div class="dd_base">
                  <h3>人気の有識者・先生から探す</h3>
                  <div class="mb30">
                    <div class="dropdown-searchArea">
                      <div class="custum-search-area">
                        <form action="/search" id="search01" class="box-search cf" aria-labelledby="search">
                          <fieldset>
                            <input class="form-control form-search" placeholder="キーワードを入力してください" name="contents_search[keyword]" id="contents_search_keyword" type="text">
                            <button type="submit" class="btn btn-style btn-sm btn-search">検索</button>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                  <h3><i class="fa fa-search">&nbsp;</i>よく検索されているキーワード</h3>
                  <div class="dd_base_wrap dd_catlist">
                    <ul>
                      <li><a href="/search?{{{'contents_search[tag]': '安河内哲也'}|url_encode}}">安河内 哲也</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '親野智可等'}|url_encode}}">親野 智可等</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '原田隆史'}|url_encode}}">原田 隆史</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '渋谷文武'}|url_encode}}">渋谷 文武</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '岩崎由純'}|url_encode}}">岩崎 由純</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '住ノ江修'}|url_encode}}">住ノ江 修</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '落合陽一'}|url_encode}}">落合 陽一</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '木下晴弘'}|url_encode}}">木下 晴弘</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': 'パトリック・ニュウェル'}|url_encode}}">パトリック・ニュウェル</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '中谷彰宏'}|url_encode}}">中谷 彰宏</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '本間正人'}|url_encode}}">本間 正人</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '坪谷・ニュウエル・郁子'}|url_encode}}">坪谷・ニュウエル・郁子</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '西川純'}|url_encode}}">西川 純</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '寺裏誠司'}|url_encode}}">寺裏 誠司</a></li>
                      <li><a href="/search?{{{'contents_search[tag]': '下村健一'}|url_encode}}">下村 健一</a></li>
                    </ul>
                  </div>

                  <!--
                  <div class="dd_base_wrap">
                    <div class="mov_wrap">
                      <h4><a href="#">東京大学教育学部附属中等教育学校・對比地覚先生</a></h4>
                      <figure> <a href="#"><img src="https://school-fal.com/cache/img/png/w640_h360/products_ac1b220cb492052cd6de486e7810e921_png.png"></a>
                        <figcaption><a href="#">初めてＡＬに取り組む先生必見！テスト前の１時間を使って簡単に取り組める…</a></figcaption>
                      </figure>
                    </div>
                    <div class="mov_wrap">
                      <h4><a href="#">東京大学教育学部附属中等教育学校・對比地覚先生</a></h4>
                      <figure> <a href="#"><img src="https://school-fal.com/cache/img/png/w640_h360/products_ac1b220cb492052cd6de486e7810e921_png.png"></a>
                        <figcaption><a href="#">初めてＡＬに取り組む先生必見！テスト前の１時間を使って簡単に取り組める…</a></figcaption>
                      </figure>
                    </div>
                    <div class="mov_wrap">
                      <h4><a href="#">東京大学教育学部附属中等教育学校・對比地覚先生</a></h4>
                      <figure> <a href="#"><img src="https://school-fal.com/cache/img/png/w640_h360/products_ac1b220cb492052cd6de486e7810e921_png.png"></a>
                        <figcaption><a href="#">初めてＡＬに取り組む先生必見！テスト前の１時間を使って簡単に取り組める…</a></figcaption>
                      </figure>
                    </div>
                    <div class="mov_wrap">
                      <h4><a href="#">東京大学教育学部附属中等教育学校・對比地覚先生</a></h4>
                      <figure> <a href="#"><img src="https://school-fal.com/cache/img/png/w640_h360/products_ac1b220cb492052cd6de486e7810e921_png.png"></a>
                        <figcaption><a href="#">初めてＡＬに取り組む先生必見！テスト前の１時間を使って簡単に取り組める…</a></figcaption>
                      </figure>
                    </div>
                  </div>

                  <ul class="dd_under_links">
                    <li><a href="/category/kohen">有識者コンテンツ一覧へ</a></li>
                  </ul>
-->
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- //pc-header end -->
      <!-- sp-header start -->
      <div class="is-sp">
        <ul class="nav-sp-area">
          <li class="nav-sp-items"><a href="{{url_for('@homepage')|raw}}"><i class="fa fa-home">&nbsp;</i>ホーム</a></li>
          <li class="nav-sp-items"><a href="/search?sort=s"><i class="fa fa-star">&nbsp;</i>新着順</a></li>
          <li class="nav-sp-items"><a href="/search?sort=v"><i class="fa fa-bookmark">&nbsp;</i>人気順</a></li>
          <!--
          <li class="nav-sp-items sp-dropdown"> <a class="ac-btn nav-sp-service" href="javascript:void(0);"><i class="fa fa-clipboard">&nbsp;</i>サービス</a>
            <ul class="sp-dropdown-area">
              <li class="category-menu-list-item"><a class="ttl-arrow" href="/pub/ict">ICTオンラインヘルプデスク</a></li>
              <li class="category-menu-list-item"><a class="ttl-arrow" href="{{url_for('event_index')}}">おすすめイベント</a></li>
              <li class="category-menu-list-item"><a class="ttl-arrow fals_sso_link" href="javascript: void(0);">
              <a class="ttl-arrow" href="/pub/share">シェアサービス</a></li>
              {# {% if isLogin %}
              <li class="category-menu-list-item"><a class="ttl-arrow eclub_sso_link" href="javascript: void(0);">えらべる倶楽部</a></li>
              {% endif %}　#}
              <li>
                <div class="menu-close"><i class="fa fa-times-circle ">&nbsp;</i>閉じる</div>
              </li>
            </ul>
          </li>
-->
          <li class="nav-sp-items sp-dropdown"> <a class="ac-btn nav-sp-menu" href="javascript:void(0);"><i class="fa fa-user">&nbsp;</i>メニュー</a>
            <div class="sp-dropdown-area">
            <div class="dropdown-mypageArea"> {% if isLogin %}
              <div class="user-profile"> <span class="user-icon"><i class="fa fa-user"></i></span> {% if member.isPremiumMember() %}
                {% set subscriptions = member.getSubscription() %}
                {% for subscription in subscriptions %}
                <p>{{ subscription.getName() }}</p>
                {% endfor %}
                {% else %}
                <p>無料ログイン</p>
                {% endif %}
                <p>{{ member.getName() }}さん<br><span style="background:#fff; display:inline-block; padding:0 5px; border-radius: 3px; margin-top: 5px;">ID：{{member.getId()}}</span></p>
              </div>
              <div class="user-info"> <a href="{{url_for('comment_commentedVideo', member)}}">コメント履歴<span class="mypage-count">{{ member.getConfig('count_comment', 0) }}</span></a>
                <div class="dropmenu-col2"> <a href="{{url_for('favorite_list')}}">お気に入り<span class="mypage-count">{{ member.getConfig('count_favorite', 0) }}</span></a> <a href="{{url_for('learning_history_index')}}">学習履歴<span class="mypage-count">{{ member.getConfig('count_play', 0) }}</span></a> </div>
                {#
                <div class="dropmenu-col2"><a href="javascript: void(0);" class="eclub_sso_link">えらべる倶楽部</a> </div>
				  <div><a href="/point">マイポイント<span>{{ sf_user.getMember().getPoint()|number_format }}</span><span>pt</span></a></div>
                #}

                <div class="user-settings"> <a href="{{url_for('payment_history')}}">購入履歴</a> <a href="{{url_for('member_setting')}}">設定変更</a> <a href="{{url_for('member_logout')}}">ログアウト</a> </div>
                {% else %}
                <div class="user-profile"></div>
                {#  <div class="user-info"> <a href="{{url_for('member_authRegister')}}">新規登録</a> <a class="btn-style btn-login" data-toggle="modal" data-target="#modal-login">ログイン</a> </div> #}
                <div class="user-info">
                  <h3>学校会員の方</h3>
                  <a class="btn-login school_login" href="https://school-fal.com" target="_blank" onclick="ga('send', 'event', 'click', 'link', 'SP学校会員ログイン', {'nonInteraction': 1});">ログイン</a> </div>
                <div class="user-info">
                  <h3>一般個人の方</h3>
                  <a class="btn-login personal_login" data-toggle="modal" data-target="#modal-login" onclick="ga('send', 'event', 'click', 'link', 'SP一般ログイン', {'nonInteraction': 1});">ログイン</a> <a c href="{{url_for('member_authRegister')}}" onclick="ga('send', 'event', 'click', 'link', 'SP初めての方', {'nonInteraction': 1});">初めての方</a> </div>
                <div class="user-settings"></div>
                {% endif %} </div>
              <div class="menu-close"><i class="fa fa-times-circle">&nbsp;</i>閉じる</div>
            </div>
          </li>
          <li class="nav-sp-items sp-dropdown"> <a class="ac-btn nav-sp-search" href="javascript:void(0);"><i class="fa fa-search">&nbsp;</i>さがす</a>
            <div class="sp-dropdown-area">
              <div class="dropdown-searchArea">
                <div class="custum-search-area">
                  <form action="/search" id="search01" class="box-search cf" aria-labelledby="search">
                    <fieldset>
                      <input class="form-control form-search" placeholder="キーワードを入力してください" type="text" name="contents_search[keyword]" id="contents_search_keyword">
                      <button type="submit" class="btn btn-style btn-sm btn-search">検索</button>
                    </fieldset>
                  </form>
                </div>
              </div>
              <div class="category-menu">
                <ul class="category-menu-list">
                  {#
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">初めての方へ</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/pub/sho">小学校の教員の皆様へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/pub/chu">中学校の教員の皆様へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/pub/koh">高等学校の教員の皆様へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/pub/dai">大学・高専・専門学校の教員の皆様へ</a> </li>
                    </ul>
                  </li>
					#}
                  <li class="category-menu-list-item"> <a class="ttl-arrow" href="/pub/about">Find！アクティブラ―ナーとは</a></li>
                  {#
					<li class="category-menu-list-item"> <a class="ttl-arrow" href="/pub/contentslist-kohen">コンテンツ一覧</a> </li>
                  <li class="category-menu-list-item"> <a class="ttl-arrow" href="/interview">先生インタビュー</a> </li>
					#}
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">有識者講演</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/category/kohen">有識者講演一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">有名講師</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '安河内哲也'}|url_encode}}">安河内 哲也</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '渋谷文武'}|url_encode}}">渋谷 文武</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '落合陽一'}|url_encode}}">落合 陽一</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '中谷彰宏'}|url_encode}}">中谷 彰宏</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '西川純'}|url_encode}}">西川 純</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '親野智可等'}|url_encode}}">親野 智可等</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '岩崎由純'}|url_encode}}">岩崎 由純</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '木下晴弘'}|url_encode}}">木下 晴弘</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '本間正人'}|url_encode}}">本間 正人</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '原田隆史'}|url_encode}}">原田 隆史</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '住ノ江修'}|url_encode}}">住ノ江 修</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'パトリック・ニュウェル'}|url_encode}}">パトリック・ニュウェル</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '坪谷・ニュウエル・郁子'}|url_encode}}">坪谷・ニュウエル・郁子</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '寺裏誠司'}|url_encode}}">寺裏 誠司</a> </li>
                        </ul>
                        <!-- //category-sub-topic-list -->
                      </li>
                    </ul>
                    <!-- //category-sub-list -->
                  </li>
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">授業見学</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/kengaku">授業見学一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">校種から探す</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/category/sho">小学校</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/cyu">中学校</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/kou">高校</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/dai">大学</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/senmon">専門学校</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/kousen">高専</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="category/etc_kengaku">その他</a> </li>
                        </ul>
                        <!-- //category-sub-topic-list -->
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">科目から探す</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '英語'}|url_encode}}">英語</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '国語'}|url_encode}}">国語</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '数学・算数'}|url_encode}}">数学・算数</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '理科'}|url_encode}}">理科</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '社会・地歴公民'}|url_encode}}">社会・地歴公民</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '体育'}|url_encode}}">体育</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '道徳'}|url_encode}}">道徳</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'キャリア教育'}|url_encode}}">キャリア教育</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ＨＲ・学活'}|url_encode}}">ＨＲ・学活</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '一般教養'}|url_encode}}">一般教養</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '専門分野'}|url_encode}}">専門分野</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ゼミ'}|url_encode}}">ゼミ</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'その他科目'}|url_encode}}">その他科目</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '外部プログラム'}|url_encode}}">外部プログラム</a> </li>
                        </ul>
                        <!-- //category-sub-topic-list -->
                      </li>
                      {#
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">ICT活用</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'タブレット'}|url_encode}}">タブレット</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ロイロノート'}|url_encode}}">ロイロノート</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'プレゼンソフト'}|url_encode}}">プレゼンソフト</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">授業手法</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '『学び合い』'}|url_encode}}">『学び合い』</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ジグソー法'}|url_encode}}">ジグソー法</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'KP法'}|url_encode}}">KP法</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">授業形式</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'グループワーク'}|url_encode}}">グループワーク</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'クイズ形式'}|url_encode}}">クイズ形式</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '発表形式'}|url_encode}}">発表形式</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'リフレクション'}|url_encode}}">リフレクション</a> </li>
                        </ul>
                      </li>
						#}
                    </ul>
                    <!-- //category-sub-list -->
                  </li>
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">子どもに伝える</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/child">子どもに伝える一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/child_neta">子どものやる気に火をつける</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/child_fire">授業の冒頭で使える小ネタ</a> </li>
                    </ul>
                  </li>
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">スキルを身につける</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/skill">スキルを身につける一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/al">アクティブ・ラーニング</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/ict">ICT活用</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/wadai">今話題のノウハウ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/tokka">教科特化の業務スキル</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/susumekata">授業の進め方</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/gaibu">外部プログラム</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/bskill">ビジネススキル</a> </li>
                    </ul>
                  </li>
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">知識を深める</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/chishiki">知識を深める一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/ictchi">教育ICTの実践者たちから学ぶ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/almanabi">アクティブ・ラーニングについて学ぶ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/jirei">事例を元に学ぶ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/newknow">最先端を知る</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/riron">教育理論を学ぶ</a> </li>
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/kanrisya">管理職向け知識を学ぶ</a> </li>
                    </ul>
                  </li>
                  {#
                  <!--  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">スキルを身につける</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" class="ttl-arrow" href="/category/skill">スキルを身につける一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">新任教員向け</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '新任教員向け'}|url_encode}}">新任教員向け</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">学校・学級経営</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '学校経営'}|url_encode}}">学校経営</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '学級経営'}|url_encode}}">学級経営</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '保護者対応'}|url_encode}}">保護者対応</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">やる気を引き出す</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'やる気を引き出す'}|url_encode}}">やる気を引き出す</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">授業設計</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '授業設計'}|url_encode}}">授業設計</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">スキル</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'プレゼンテーション'}|url_encode}}">プレゼンテーション</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'コミュニケーション'}|url_encode}}">コミュニケーション</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'コーチング'}|url_encode}}">コーチング</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'アドラー心理学'}|url_encode}}">アドラー心理学</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'アンガーマネジメント'}|url_encode}}">アンガーマネジメント</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ペップトーク'}|url_encode}}">ペップトーク</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'レジリエンス'}|url_encode}}">レジリエンス</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">教科別教務スキル・コンテンツ</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '数学（算数）の教務スキル・コンテンツ'}|url_encode}}">数学（算数）の教務スキル</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '英語の教務スキル・コンテンツ'}|url_encode}}">英語の教務スキル</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '体育の教務スキル・コンテンツ'}|url_encode}}">体育の教務スキル</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '部活の教務スキル・コンテンツ'}|url_encode}}">部活の教務スキル</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'キャリア教育の教務スキル・コンテンツ'}|url_encode}}">キャリア教育の教務スキル</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">アクティブ・ラーニング</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'アクティブ・ラーニング'}|url_encode}}">アクティブ・ラーニング</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">ICT利活用</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'ICT利活用'}|url_encode}}">ICT利活用</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'iTeachers'}|url_encode}}">ITearchers</a> </li>
                        </ul>
                      </li>
                    </ul>
                  </li>-->
                  <!--<li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">アイスブレイク</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/category/ice">アイスブレイク一覧へ</a> </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">ジャンル別</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '1．学習・生活習慣関連'}|url_encode}}">学習・生活習慣関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '2．思考法・ビジネススキル関連'}|url_encode}}">思考法・ビジネススキル関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '3．科学・ICT関連'}|url_encode}}">科学・ICT関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '4．仕事・職業関連'}|url_encode}}">仕事・職業関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '5．著名人・人物関連'}|url_encode}}">著名人・人物関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '6．時事・季節関連'}|url_encode}}">時事・季節関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '7．文化・教養関連'}|url_encode}}">文化・教養関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '8．身体・医学・健康関連'}|url_encode}}">身体・医学・健康関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '9．言語・言葉関連'}|url_encode}}">言語・言葉関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '10．世界・外国関連'}|url_encode}}">世界・外国関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '11．自然・動植物関連'}|url_encode}}">自然・動植物関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '12．スポーツ・ゲーム関連'}|url_encode}}">スポーツ・ゲーム関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '13．乗り物・建造物関連'}|url_encode}}">乗り物・建造物関連</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '14．食べ物・料理関連'}|url_encode}}">14．食べ物・料理関連</a> </li>
                        </ul>
                      </li>
                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">教科別</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '1．国語'}|url_encode}}">国語</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '2．数学'}|url_encode}}">数学</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '3．英語'}|url_encode}}">英語</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '4．理科'}|url_encode}}">理科</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '5．社会'}|url_encode}}">社会</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '6．情報'}|url_encode}}">情報</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '7．保健・体育'}|url_encode}}">保健・体育</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '8．家庭科'}|url_encode}}">家庭科</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '9．芸術'}|url_encode}}">芸術</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '10．キャリア・総学'}|url_encode}}">キャリア・総学</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '11．HRその他'}|url_encode}}">HRその他</a> </li>
                        </ul>
                      </li>
                    </ul>
                  </li>-->
					#}
                  <li class="category-menu-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">イベントから探す</a>
                    <ul class="category-sub-list">
                      <li class="category-sub-list-item"> <a class="ttl-arrow" href="/category/event">イベント一覧へ</a> </li>



                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">アクティブ・ラーニングフォーラム</a>
                        <ul class="category-sub-topic-list">
                        <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第10回アクティブ・ラーニングフォーラム'}|url_encode}}">第10回</a> </li>
                        <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第9回アクティブ・ラーニングフォーラム'}|url_encode}}">第9回</a> </li>
                        <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第8回アクティブ・ラーニングフォーラム'}|url_encode}}">第8回</a> </li>
                        <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第7回アクティブ・ラーニングフォーラム'}|url_encode}}">第7回</a> </li>
                        <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第6回アクティブ・ラーニングフォーラム'}|url_encode}}">第6回</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第5回アクティブ・ラーニングフォーラム'}|url_encode}}">第5回</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第4回アクティブ・ラーニングフォーラム'}|url_encode}}">第4回</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第3回アクティブ・ラーニングフォーラム'}|url_encode}}">第3回</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第2回アクティブ・ラーニングフォーラム'}|url_encode}}">第2回</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': '第1回アクティブ・ラーニングフォーラム'}|url_encode}}">第1回</a> </li>
                        </ul>
                        <!-- //category-sub-topic-list -->
                      </li>

                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">チャレンジカップ</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/pub/challenge-cup">チャレンジカップとは</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１７'}|url_encode}}">チャレンジカップ2017</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１６'}|url_encode}}">チャレンジカップ2016</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１５'}|url_encode}}">チャレンジカップ2015</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１４'}|url_encode}}">チャレンジカップ2014</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１３'}|url_encode}}">チャレンジカップ2013</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１２'}|url_encode}}">チャレンジカップ2012</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１１'}|url_encode}}">チャレンジカップ2011</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２０１０'}|url_encode}}">チャレンジカップ2010</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２００９'}|url_encode}}">チャレンジカップ2009</a> </li>
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'チャレンジカップ２００８'}|url_encode}}">チャレンジカップ2008</a> </li>
                        </ul>
                        <!-- //category-sub-topic-list -->
                      </li>


                      <li class="category-sub-list-item"> <a class="ac-btn ac-icon" href="javascript:void(0);">その他イベント</a>
                        <ul class="category-sub-topic-list">
                          <li class="category-sub-topic-list-item"> <a class="ttl-arrow" href="/search?{{{'contents_search[tag]': 'その他イベント'}|url_encode}}">その他イベント</a> </li>
                        </ul>
                      </li>

                    </ul>
                  </li>

                  <!-- <li class="category-menu-list-item"> <a class="ttl-arrow" href="/category/school">自校動画</a> </li> -->
                </ul>
                <!-- //category-menu-list -->
              </div>
              <div class="menu-close"><i class="fa fa-times-circle ">&nbsp;</i>閉じる</div>
            </div>
          </li>
        </ul>
        <div class="dropdown-background"></div>
      </div>
      <!-- //sp-header end -->
    </nav>
  </div>
</header>
<style>
  .nav-area ul.nav-top-box.nav-btm-box .dropdown-tableArea, .nav-area ul.nav-btm-box.nav-btm-box .dropdown-tableArea {
    width: 100% !important;
}
</style>
