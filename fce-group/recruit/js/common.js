/**
* ローディングアニメーション
*/

var $delayTime = 1500;

$(window).on('load', function(){

    var $loadingAnim = $('#loadingAnim'),
        $body = $('body');

    setTimeout( function(){

        $body.addClass('loaded');

        // アニメ完了後にDOM削除
        $loadingAnim.find('.loadingAnim_line').on('transitionend', function( e ){
            $(this).parent().remove();
        });

    }, $delayTime );
});


window.onload = function () {

var target = document.getElementById("video");
var video = document.createElement("video");
video.src = "./mov/FCE_group_corporate_final-s.mp4";
video.style.width = "100%";
video.muted = true;
video.autoplay = true;
video.id = "kv_mov";

$('#btn_skip span').click(function(){
 video.currentTime = 100;
});


video.addEventListener("ended", function() {
  target.style.display = "none";
  $('#home_wrap').addClass('active');
});

target.appendChild(video);

};
