<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="SOP-POS-MANAGMENT">
        <meta name="author" content="SOP">
	<title></title>

	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
		.key{
			border: 1px solid;
			height: 40px;
			text-align: center;
			line-height: 40px;
			display: block;
			cursor: pointer;
		}
		.key:hover{
			background: #000;
			color: #fff;

		}
		.key img:hover{
			color: #fff;
		
		}
		.main-board{
			border: 1px solid; 
			text-align: center;
			background: #07317d;
			cursor: pointer;
			position: relative;
			color: #fff;
			top: -16px;
		}
		table tr{
			height: 42px;
    		text-align: center;
		}
		.pointer td:hover{
			cursor: pointer;
			background: #000;
			color: #fff;
		}
		.keyboard{
			opacity: 0.6;
		}

	</style>
</head>
<body>
	<h3>Input Text Here</h3>
	<input type="text" name="txt_text" class="text_input" id="txt1">
	<input type="text" name="txt_text" class="text_input" id="txt2">
	<p></p>
<div class="container-fluid keyboard" style="width: 684px;">
	
	<table border="1" width="100%" class="main-board">
		<tr class="pointer">
			<td id="exit_tab">Exit</td>
			<td colspan="12" id="move"></td>
			<td id="clear">Clear</td>
		</tr>
		<tr class="pointer">
			<td class="key_button" id="hu">`</td>
			<td class="key_button" id="one">1</td>
			<td class="key_button" id="two">2</td>
			<td class="key_button" id="tree">3</td>
			<td class="key_button" id="four">4</td>
			<td class="key_button" id="five">5</td>
			<td class="key_button" id="six">6</td>
			<td class="key_button" id="seven">7</td>
			<td class="key_button" id="eight">8</td>
			<td class="key_button" id="nine">9</td>
			<td class="key_button" id="ten">0</td>
			<td class="key_button" id="dok">-</td>
			<td class="key_button" id="equal">=</td>
			<td class="key_button_del" id="del" width="90">backspace</td>
			
		</tr>
		<tr class="pointer">
			<td class="key_button_tap">Tap</td>
			<td class="key_button" id="q">Q</td>
			<td class="key_button" id="w">W</td>
			<td class="key_button" id="e">E</td>
			<td class="key_button" id="r">R</td>
			<td class="key_button" id="t">T</td>
			<td class="key_button" id="y">Y</td>
			<td class="key_button" id="u">U</td>
			<td class="key_button" id="i">I</td>
			<td class="key_button" id="o">O</td>
			<td class="key_button" id="p">P</td>
			<td class="key_button" id="kl">[</td>
			<td class="key_button" id="lk">]</td>
			<td class="key_button" id="kj">\</td>
		</tr>
		<tr class="pointer">
			<td class="cap" width="95">CapsLock&nbsp;&nbsp;&nbsp;<span><img src="img/point.png" width="10"></span></td>
			<td class="key_button" id="a">A</td>
			<td class="key_button" id="s">S</td>
			<td class="key_button" id="d">D</td>
			<td class="key_button" id="f">F</td>
			<td class="key_button" id="g">G</td>
			<td class="key_button" id="h">H</td>
			<td class="key_button" id="j">J</td>
			<td class="key_button" id="k">K</td>
			<td class="key_button" id="l">L</td>
			<td class="key_button" id="oi">;</td>
			<td class="key_button" id="lo">' '</td>
			<td colspan="2">Enter</td>
			
		</tr>
		<tr class="pointer">
			<td class="exit" colspan="2">Shift</td>
			<td class="key_button" id="z">Z</td>
			<td class="key_button" id="x">X</td>
			<td class="key_button" id="c">C</td>
			<td class="key_button" id="v">V</td>
			
			<td class="key_button" id="b">B</td>
			<td class="key_button" id="n">N</td>
			<td class="key_button" id="m">M</td>
			<td class="key_button" id="sim"><</td>
			<td class="key_button" id="sin">></td>
			<td class="key_button" id="quat">?</td>
			<td class="" colspan="2">Shift</td>
			
		</tr>
		<tr class="pointer">
			<td class="">Ctrl</td>
			<td ><img src="img/windows.jpg" width="25" id="khmer"></td>
			<td id="alt">Alt</td>
		    <td class="key_button_space" colspan="7">Spacebar</td>
		    <td id="alt1">Alt</td>
			<td id="n"><img src="img/1.jpg" width="25" class="cap"></td>
			<td  id="m"><img src="img/1.png" width="20"></td>
			<td id="">Ctrl</td>
		</tr>
	</table>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.exit').on('click',function(){
		  $(this).css({'background':'#000','color':'#fff'});
		  $('span').hide();
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
		  $('span').hide();
	
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
			$('span').show();
		
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
			$('span').hide();
	
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
			$('span').hide();
	
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
			$('span').hide();
	
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
</script>
<script type="text/javascript">
	var focused;
	var lang='en';// For Language
	$(document).ready(function(){
		$('#exit_tab').click(function(){
			$('.main-board').hide(1000);
		});
		$('.main-board').draggable();
		// Replace Keyboard Style
		document.getElementById('move').style.cursor='move'; 

		//  Click Text input and show Keyboard
			$('.text_input').click(function(){
				$('.main-board').show(1050);
			});
	$(".text_input").focus(function(){
		focused = $(this);
		//console.log(focused);
	});
		
});
</script>
<script>
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

});
</script>
</body>
</html>
