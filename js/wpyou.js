// SubNavigation
$(function() {
	$(".navi ul").css({display: "none"}); // Opera Fix
	$(".navi li").hover(function(){
		$(this).find('ul:first').show("fast").css({visibility: "visible",display: "block"});
	},function(){
		$(this).find('ul:first').hide("fast").css({visibility: "hidden"});
	});
});
// SearchForm
$(document).ready(function(){				   
	$('.searchInput').focus(
		function() {
			if($(this).val() == '输入关键字') {
				$(this).val('').css({color:"#333"});
			}
		}
	).blur(
		function(){
			if($(this).val() == '') {
				$(this).val('输入关键字').css({color:"#666"});
			}
		}
	);
});
// Homepage Scroll
$(function(){
   var num=0;
   var imgWidth=137;//图片的宽度
   var speed=10;//流动的速度，每20毫秒一个像素
   function howlking(){
   num++;
   if(num<imgWidth){
         $('.scroll ul').css('left',-num+"px");
   }else{
      $('.scroll ul').find('li:first').appendTo($('.scroll ul'));
   $('.scroll ul').css('left',"0px");
   num=0;
   }
   }
   var times=setInterval(howlking,speed);
   $('.scroll').hover(function(){clearTimeout(times)},function(){times=setInterval(howlking,speed)});
});
//SwitchFont
$(document).ready(function(){
	$(".mfbig").click( function(){$('.entrycontent').addClass('fontbig').removeClass("fontmid fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfmid").click( function(){$('.entrycontent').addClass('fontmid').removeClass("fontbig fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfsml").click( function(){$('.entrycontent').addClass('fontsml').removeClass("fontbig fontmid"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})

});
// Menu First li nb
$(function() {
	$(".navi li:first").addClass("nl"); // HeaderMenu First li no border
	$(".footpage li:first").addClass("nb"); // FooterMenu First li no border
});
// Facebox Lightbox
$(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
// Single Tabs
$(function(){
    var $title = $(".entrycontent .title span");
    var $content = $(".entrycontent .the_content");
    $title.mousemove(function(){
        var index = $title.index($(this));
		$(this).addClass("mov").siblings().removeClass("mov");
        $content.hide();
        $($content.get(index)).show();
        return false;
    });

});

/*
$(function(){
	var $li = $(".partner li");
	alert($li.html());

	$li.mousemove(function(){
		$li.addClass("parSelected");
	})
	$li.mouseout(function(){
		$li.removeClass("parSelected");
	})
});
*/