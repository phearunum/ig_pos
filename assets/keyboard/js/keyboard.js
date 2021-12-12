$(document).ready(function(){
		$('.exit').on('click',function(){
		  $(this).css({'background':'#000','color':'#fff'});
		  $('.span_key').fadeOut();
		  $('.keyboard').fadeOut();
		});

		$(".exit").click(function(){
		if(lang=='en'){//Condition for language
		  $("#z").text("z");
		  $("#a").text("a");
		  $("#b").text("b");
		  $("#c").text("c");
		  $("#v").text("v");
		  $("#n").text("n");
		  $("#m").text("m");
		  $("#sim").text(",");
		  $("#sin").text(".");
		  $("#quat").text("/");
		  $("#x").text("x");
		  $("#a").text("a");
		  $("#z").text("z");
		  $("#a").text("a");

		  $("#s").text("s");
		  $("#d").text("d");
		  $("#f").text("f");
		  $("#g").text("g");
		  $("#h").text("h");
		  $("#j").text("j");
		  $("#k").text("k");
		  $("#l").text("l");
		  $("#oi").text(":");
		  $("#lo").text('" "');

		  $("#q").text("q");
		  $("#w").text("w");
		  $("#e").text("e");
		  $("#r").text("r");
		  $("#t").text("t");
		  $("#y").text("y");
		  $("#u").text("u");
		  $("#i").text("i");
		  $("#o").text("o");
		  $("#p").text("p");
		  $("#kl").text("{");
		  $("#lk").text("}");

		  $("#hu").text("~");
		  $("#one").text("!");
		  $("#two").text("@");
		  $("#tree").text("#");
		  $("#four").text("$");
		  $("#five").text("%");
		  $("#six").text("^");
		  $("#seven").text("&");
		  $("#eight").text("*");
		  $("#nine").text("(");
		  $("#ten").text(")");
		  $("#dok").text("_");
		  $('#equal').text("+");
		  $('#kj').text("|");
		}else{
		  $('.exit').css({'background':'#07317d','color':'#fff'});
		  $('.span_key').fadeOut();
	
		  $("#z").text("ឍ");
		  $("#a").text("ៃ");
		  $("#b").text("ព");
		  $("#c").text("ជ");
		  $("#v").text("េះ");
		  $("#n").text("ណ");
		  $("#m").text("ំ");
		  $("#sim").text(",");
		  $("#sin").text(".");
		  $("#quat").text("​​​​​​?");
		  $("#x").text("ឃ");
		  

		  $("#s").text("ាំ");
		  $("#d").text("ឌ");
		  $("#f").text("ធ");
		  $("#g").text("ុះ");
		  $("#h").text("ះ");
		  $("#j").text("ញ");
		  $("#k").text("គ");
		  $("#l").text("ឡ");
		  $("#oi").text("៖");
		  $("#lo").text("៉");

		  $("#q").text("ឈ");
		  $("#w").text("ឺ");
		  $("#e").text("ែ");
		  $("#r").text("ឬ");
		  $("#t").text("ទ");
		  $("#y").text("ួ");
		  $("#u").text("ូ");
		  $("#i").text("ី");
		  $("#o").text("ៅ");
		  $("#p").text("ភ");
		  $("#kl").text("ោះ");
		  $("#lk").text("ៀ");

		  $("#hu").text("‌");
		  $("#one").text("!");
		  $("#two").text("ៗ");
		  $("#tree").text("៊");
		  $("#four").text("៛");
		  $("#five").text("័");
		  $("#six").text("៌");
		  $("#seven").text("៍");
		  $("#eight").text("៏");
		  $("#nine").text("៎");
		  $("#ten").text("៑");
		  $("#dok").text("_");
		  $('#equal').text("+");
		  $('#kj').text('');
		}
		});

		
		$('.cap').click(function(){
			lang ='en';// English Language
			$('.exit').css({'background':'#07317d','color':'#fff'})
			$('.span_key').fadeToggle();
		
		  $("#z").text("Z");
		  $("#a").text("A");
		  $("#b").text("B");
		  $("#c").text("C");
		  $("#v").text("V");
		  $("#n").text("N");
		  $("#m").text("M");
		  $("#sim").text("<");
		  $("#sin").text(">");
		  $("#quat").text("?");
		  $("#x").text("X");
		  

		  $("#s").text("S");
		  $("#d").text("D");
		  $("#f").text("F");
		  $("#g").text("G");
		  $("#h").text("H");
		  $("#j").text("J");
		  $("#k").text("K");
		  $("#l").text("L");
		  $("#oi").text(";");
		  $("#lo").text("' '");

		  $("#q").text("Q");
		  $("#w").text("W");
		  $("#e").text("E");
		  $("#r").text("R");
		  $("#t").text("T");
		  $("#y").text("Y");
		  $("#u").text("U");
		  $("#i").text("I");
		  $("#o").text("O");
		  $("#p").text("P");
		  $("#kl").text("[");
		  $("#lk").text("]");

		  $("#hu").text("`");
		  $("#one").text("1");
		  $("#two").text("2");
		  $("#tree").text("3");
		  $("#four").text("4");
		  $("#five").text("5");
		  $("#six").text("6");
		  $("#seven").text("7");
		  $("#eight").text("8");
		  $("#nine").text("9");
		  $("#ten").text("0");
		  $("#dok").text("-");
		  $('#equal').text("=");
		  $('#kj').text('\\');

		});

		$('#khmer').click(function(){
			lang ='kh';//Khmer Language
			$('.exit').css({'background':'#07317d','color':'#fff'})
			$('.span_key').fadeOut();
	
		  $("#z").text("ឋ");
		  $("#a").text("ា");
		  $("#b").text("ប");
		  $("#c").text("ច");
		  $("#v").text("វ");
		  $("#n").text("ន");
		  $("#m").text("ម");
		  $("#sim").text("អ");
		  $("#sin").text("។");
		  $("#quat").text("​​​​​​៕");
		  $("#x").text("ខ");
		  

		  $("#s").text("ស");
		  $("#d").text("ដ");
		  $("#f").text("ថ");
		  $("#g").text("ង");
		  $("#h").text("ហ");
		  $("#j").text("្");
		  $("#k").text("ក");
		  $("#l").text("ល");
		  $("#oi").text("ៈ");
		  $("#lo").text("់");

		  $("#q").text("ឆ");
		  $("#w").text("ឹ");
		  $("#e").text("េ");
		  $("#r").text("រ");
		  $("#t").text("ត");
		  $("#y").text("យ");
		  $("#u").text("ុ");
		  $("#i").text("ិ");
		  $("#o").text("ោ");
		  $("#p").text("ផ");
		  $("#kl").text("ើ");
		  $("#lk").text("ឿ");

		  $("#hu").text("");
		  $("#one").text("១");
		  $("#two").text("២");
		  $("#tree").text("៣");
		  $("#four").text("៤");
		  $("#five").text("៥");
		  $("#six").text("៦");
		  $("#seven").text("៧");
		  $("#eight").text("៨");
		  $("#nine").text("៩");
		  $("#ten").text("០");
		  $("#dok").text("ះ");
		  $('#equal').text("ៃ");
		  $('#kj').text('');
		  //$('#key_button_space').text('្');

		});

		
		$('#alt').click(function(){
			$('.exit').css({'background':'#07317d','color':'#fff'})
			$('.span_key').fadeOut();
	
		  $("#z").text("#");
		  $("#a").text("ឩ");
		  $("#b").text("&");
		  $("#c").text("$");
		  $("#v").text("%");
		  $("#n").text("(");
		  $("#m").text(")");
		  $("#sim").text("‹");
		  $("#sin").text("›");
		  $("#quat").text("​​​​​​៕");
		  $("#x").text("@");
		  

		  $("#s").text("ឩ");
		  $("#d").text("ឪ");
		  $("#f").text("");
		  $("#g").text("");
		  $("#h").text("");
		  $("#j").text("ឮ");
		  $("#k").text("ឭ");
		  $("#l").text("ឰ");
		  $("#oi").text(";");
		  $("#lo").text("៝");

		  $("#q").text("*");
		  $("#w").text("");
		  $("#e").text("ឯ");
		  $("#r").text("ឫ");
		  $("#t").text("ឦ");
		  $("#y").text("");
		  $("#u").text("ឧ");
		  $("#i").text("ឥ");
		  $("#o").text("ឱ");
		  $("#p").text("ឳ");
		  $("#kl").text("[");
		  $("#lk").text("]");

		  $("#hu").text("‌៙");
		  $("#one").text("1");
		  $("#two").text("2");
		  $("#tree").text("3");
		  $("#four").text("4");
		  $("#five").text("5");
		  $("#six").text("6");
		  $("#seven").text("7");
		  $("#eight").text("8");
		  $("#nine").text("9");
		  $("#ten").text("0");
		  $("#dok").text("{");
		  $('#equal').text("}");
		  $('#kj').text('');
		  //$('#key_button_space').text('្');

		});

		$('#alt1').click(function(){
			$('.exit').css({'background':'#07317d','color':'#fff'})
			$('.span_key').fadeOut();
	
		  $("#z").text("#");
		  $("#a").text("ឩ");
		  $("#b").text("&");
		  $("#c").text("$");
		  $("#v").text("%");
		  $("#n").text("(");
		  $("#m").text(")");
		  $("#sim").text("‹");
		  $("#sin").text("›");
		  $("#quat").text("​​​​​​៕");
		  $("#x").text("@");
		  

		  $("#s").text("ឩ");
		  $("#d").text("ឪ");
		  $("#f").text("");
		  $("#g").text("");
		  $("#h").text("");
		  $("#j").text("ឮ");
		  $("#k").text("ឭ");
		  $("#l").text("ឰ");
		  $("#oi").text(";");
		  $("#lo").text("៝");

		  $("#q").text("*");
		  $("#w").text("");
		  $("#e").text("ឯ");
		  $("#r").text("ឫ");
		  $("#t").text("ឦ");
		  $("#y").text("");
		  $("#u").text("ឧ");
		  $("#i").text("ឥ");
		  $("#o").text("ឱ");
		  $("#p").text("ឳ");
		  $("#kl").text("[");
		  $("#lk").text("]");

		  $("#hu").text("‌៙");
		  $("#one").text("1");
		  $("#two").text("2");
		  $("#tree").text("3");
		  $("#four").text("4");
		  $("#five").text("5");
		  $("#six").text("6");
		  $("#seven").text("7");
		  $("#eight").text("8");
		  $("#nine").text("9");
		  $("#ten").text("0");
		  $("#dok").text("{");
		  $('#equal').text("}");
		  $('#kj').text('');
		  //$('#key_button_space').text('្');

		});
	});
	var focused;
	var lang='en';// For Language
	$(document).ready(function(){
		$('.keyboard').css("left",($(window).width()-1000)/2+"px");

		$('#exit_tab').click(function(){
			$('.main-board').fadeToggle(300);
		});
		$('.keyboard').draggable();
		// Replace Keyboard Style
		document.getElementById('move').style.cursor='move'; 

		//  Click Text input and show Keyboard
		$('.text_input').click(function(){
			$('.main-board').fadeIn(300);
		});
	$(".text_input").focus(function(){
		focused = $(this);

		//console.log(focused);
	});
		
});

$(document).ready(function(){	
  $('.key_button').click(function(){
  	focused.val(focused.val()+$(this).html());//html for get element of value
  	focused.focus();
  });

  $('.key_button_del').click(function(){
  	focused.val(focused.val().slice(0,-1));
  	focused.focus();
  });

  $('.key_button_space').click(function(){
  	focused.val(focused.val()+" ");
  	focused.focus();
  });
  $('.key_button_tap').click(function(){
  	focused.val(focused.val()+"\t ");
  	focused.focus();
  });
  $('#clear').click(function(){

            focused.val("");
      
  });
  $("#Enter").click(function(){
  	$("#exit_tab").click();
  });

});