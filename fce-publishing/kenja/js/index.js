
/* /////////////////////////////////////
                Device判定
///////////////////////////////////// */
var getDevice = (function () {
	var ua = navigator.userAgent;
	if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
		return 'sp';
	} else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
		return 'tab';
	} else {
		return 'other';
	}
})();

$(function(){
    /* /////////////////////////////////////
                    OS判定
    ///////////////////////////////////// */
 
    if (navigator.platform.indexOf("Win") != -1) {
    } else {
        $('body').addClass('not_win');
    }
    
    /* /////////////////////////////////////
                    Modo切り替え
    ///////////////////////////////////// */
    $(window).on('resize', function(){
        $('body').addClass('stop_animation');
        setTimeout(function(){
            $('body').removeClass('stop_animation');
        },10);
    });
    if(getDevice === 'other'){
        $('body').addClass('pc_device');
    }
    if(getDevice === 'tab'){
        $('[name="viewport"]').attr({'content':'width=1440px'});
    }

    /* /////////////////////////////////////
                    Loading
    ///////////////////////////////////// */

    var $loadNumTxt = $('#load_num_txt_list > li');
    var loadNumLength = $loadNumTxt.length;
    var loadingFlag = false; // ロードが完了したかどうかのフラグ（trueで完了）
    var timerFlag = false; // タイマーを消すかどうかのフラグ（trueで消す）

    // テキストの切り替え速度
    var txtDelayTime = 100;

    // ローディングの最低時間
    var minLoadTime = 2000;

    // タイマー一周の時間
    var timerDelayTime = 100;

    // WebFontのロードを判定しローディングアニメションを発火
    WebFont.load({
        custom: {
            families: ['Lato'], // 監視するフォント
        },
        fontactive: function(font_family) {
            if (font_family === 'Lato') {
                // Lato 読み込み完了
                $('#load').addClass('start'); //テキストを表示（親要素を表示）
                loadingChangeTxt(0); // 発火
                calcDelayTime(); // タイマー開始
            }
        },
        fontinactive: function(font_family) {
            if (font_family === 'Lato') {
                // Lato 読み込み失敗
                // （読み込み失敗でローディングが終わらないため念のため設定）
                $('#load').addClass('start');//テキストを表示（親要素を表示）
                loadingChangeTxt(0); // 発火
                calcDelayTime(); // タイマー開始
            }
        },
    });

    // ローディングアニメーション
    function loadingChangeTxt(num){
        if(loadingFlag){
            // ローディングの終了アニメーションを発火
            $('#load').addClass('end');
            setTimeout(function(){
                loadAfter();
            },2400);// アニメーション時間待機後発火
        }else{
            // テキストの切り替えアニメーション
            var showNum = num;// 現在表示してるliの番号
            var nextNum = showNum + 1;// 次に表示するliの番号
            if(nextNum >= loadNumLength){
                nextNum = 0;
            }
            // 切り替え処理
            $loadNumTxt
            .removeClass('show')
            .eq(nextNum)
            .addClass('show');
            // 次の切り替えを予約
            setTimeout(function(){
                loadingChangeTxt(nextNum);
            }, txtDelayTime);
        }
    }
    
    // 最小待ち時間を残すためのタイマーと計算
    function calcDelayTime(){
        setTimeout(function(){
            minLoadTime = minLoadTime - timerDelayTime;
            if(minLoadTime <= 0){
                minLoadTime = 0;
            }else if(!timerFlag) {
                calcDelayTime();
            }
        }, timerDelayTime);
    }

    // ロード完了でローディングの終了アニメーションのフラグを立てる
    $(window).on('load', function(){
        timerFlag = true; // タイマーを切る
        setTimeout(function(){
            loadingFlag = true;
        }, minLoadTime);
    });

    /* /////////////////////////////////////
                    Preload
    ///////////////////////////////////// */

    // 後読みするimgタグに.js_preload_imgをつける

    // 後読み画像のsrcをpre_srcとして保存して空にする
    $('.js_preload_img').each(function(){
        $(this).attr({'pre_src': $(this).attr('src')}).attr({'src': ''});
    });

    // ロード後に画像を読み込み
    $(window).on('load', function(){
        $('.js_preload_img').each(function(){
            $(this).attr({'src': $(this).attr('pre_src')});
        });
    });

    /* /////////////////////////////////////
                    MV
    ///////////////////////////////////// */

    $('#mv_scroll').on('click', function(){
        $('html,body').animate({scrollTop: $('#about_this').offset().top });
    });

    /* /////////////////////////////////////
                    Swiper
    ///////////////////////////////////// */

    var highlight_swiper;
    $(window).on('load', function(){
        // swiperの設定
        highlight_swiper = new Swiper('#highlight_slide', {
            loop: true,
            effect: 'fade',
            speed: 800,
        });
        // swiperの進むボタン
        $('#highlight_swiper_button_next').on('click', function(){
            highlight_swiper.slideNext();
        });
        // swiperの戻るボタン
        $('#highlight_swiper_button_prev').on('click', function(){
            highlight_swiper.slidePrev();
        });
        // 切り替わったら発火
        highlight_swiper.on('slideChange', function () {
            // サブタイトル変更
            $('#highlight_subttl > li').removeClass('show').eq(highlight_swiper.realIndex).addClass('show');
            // ページナンバー切り替え
            $('#highlight_page_num > li').removeClass('show').eq(highlight_swiper.realIndex).addClass('show');
        });
    });

    /* /////////////////////////////////////
                    Animation
    ///////////////////////////////////// */

    // 初期表示位置に移動させる
    $("body").addClass("animation_ready");

    function loadAfter(){
        // 独立系アニメーションの発火タイミング
        $("body").addClass("animation_load");

        // waypointによるスクロール位置のイベントを設定
        $("[data-waypoint]").each(function(){
            var setOffset = $(this).attr("data-waypoint");
            // 発火
            $(this).waypoint(function (e) {
                if (e === "down") {$(this).addClass("animated");}
            }, { offset: setOffset });
            // 初期化
            $(this).waypoint(function (e) {
                if (e === "up") {$(this).removeClass("animated");}
            }, { offset: "100%" });
        });
    }

    /* /////////////////////////////////////
                    Parallax
    ///////////////////////////////////// */
    $(window).on('load',function(){
        initParallax();
        setParallax();
        $(window).on('resize',function(){
            initParallax();
        });
        $(window).on('scroll',function(){
            setParallax();
        });
    });
    function initParallax(){
        $('.js_parallax_decoration').each(function(){
            $(this).css({'transition':'none', 'transform' : 'none'});
            // 全体の高さ
            var allHeight = $('#wrap').height();
            // 要素の上からの距離
            var offset = $(this).position().top;
            // 要素の割合
            var scroll_ratio = (offset + $(window).innerHeight()*2) / allHeight;
            $(this).attr({'data-parallax': scroll_ratio});
            $(this).css({'transition':'', 'transform' : ''});
        });
    }
    function setParallax(){
        // サイトの高さ
        var allHeight = $('#wrap').height();
        // スクロール可能な高さ
        var maxScrollHeight = allHeight - $(window).innerHeight();
        // 現在のスクロール割合
        var ratio = $(window).scrollTop() / maxScrollHeight;
        // 動きの大きさを制御
        var ajust = 2;
        $('.js_parallax_decoration').each(function(){
            // 基準
            var this_ratio = $(this).attr('data-parallax');
            // 代入する値(-100%~100%)
            var move = -(ratio - this_ratio) * 100 * ajust;
            var val = move + '%';
            $(this).css({'transform': 'translate3d(0,' + val + ',0)'});
        });
    }

    /* /////////////////////////////////////
                    POPUP
    ///////////////////////////////////// */

    // POPUP表示
    $('.js_wisemen_li').on('click', function(){
        var targetContent = $(this).attr('popup');
        // 対象コンテンツを表示
        $('[popup_content=' + targetContent + ']').addClass('select');
        //タブを初期化
        $('[popup_content=' + targetContent + ']').find('.js_popup_tab').eq(0).trigger('click');
        // スクロールを↑に戻す
        $('.js_reset_scroll').scrollTop(0);
        // ポップアップを表示
        $('body').addClass('popup_open');
    });
    // POPUP内のタブ切り替え
    $('.js_popup_tab').on('click', function(){
        if($(this).hasClass('select')){return;}
        var $parent = $(this).parent();
        var num = $parent.find('li').index(this);
        var this_popup = $('#popup_list > li.select');
        var $popup_tab_content_list = this_popup.find('.js_popup_tab_content_list');
        var $popup_tab_list = this_popup.find('.js_popup_tab_list');
        $popup_tab_content_list.find('li').removeClass('select').eq(num).addClass('select').scrollTop(0);
        $popup_tab_list.find('li').removeClass('select').eq(num).addClass('select');
    });
    // POPUPを閉じる
    $('#popup_close').on('click', function(){
        $('body').removeClass('popup_open');
        // 表示コンテンツをリセット
        $('#popup_list > li').removeClass('select');
    });
});
