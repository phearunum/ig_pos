<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
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
			background: #f3dcdc;
			padding: 9px;
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
	</style>
</head>
<body>
<div class="container-fluid" style="width: 684px;">
	<div class="col-md-12 main-board" style="">
		<div class="row">
			<h5>Keyboard</h5>
		</div>
	</div>
	<table border="1" width="100%">
		<tr class="pointer">
			<td >Esc</td>
			<td>F1</td>
			<td>F2</td>
			<td>F3</td>
			<td>F4</td>
			<td>F5</td>
			<td>F6</td>
			<td>F7</td>
			<td>F8</td>
			<td>F9</td>
			<td>F10</td>
			<td>F11</td>
			<td>F12</td>
		</tr>
		<tr class="pointer">
			<td>`</td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
			<td>9</td>
			<td>0</td>
			<td>-</td>
			<td>=</td>
			
		</tr>
		<tr class="pointer">
			<td>Tab</td>
			<td>Q</td>
			<td>W</td>
			<td>E</td>
			<td>R</td>
			<td>T</td>
			<td>Y</td>
			<td>U</td>
			<td>I</td>
			<td>O</td>
			<td>P</td>
			<td>[</td>
			<td>]</td>
			
		</tr>
		<tr class="pointer">
			<td>CapsLock</td>
			<td>A</td>
			<td>S</td>
			<td>D</td>
			<td>F</td>
			<td>G</td>
			<td>H</td>
			<td>J</td>
			<td>K</td>
			<td>L</td>
			<td>;</td>
			<td>""</td>
			<td>Enter</td>
			
		</tr>
		<tr class="pointer">
			<td class="exit">Shift</td>
			<td>Z</td>
			<td>X</td>
			<td>C</td>
			<td>V</td>
			<td>B</td>
			<td>N</td>
			<td>M</td>
			<td><</td>
			<td>></td>
			<td>?</td>
			<td colspan="2">Shift</td>
			
		</tr>
		<tr class="pointer">
			<td>Ctrl</td>
			<td><img src="img/windows.png" width="20"></td>
			<td class="xit">Alt</td>
			<td colspan="6">Spacebar</td>
			<td>Alt</td>
			<td><img src="img/windows.png" width="20"></td>
			<td><img src="img/1.png" width="20"></td>
			<td>Ctrl</td>
		</tr>
	</table>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.exit').on('click',function(){
			$(this).css({'background':'#000','color':'#fff'})
		});
		// $('.xit').on('click',function(){
		// 	$(this).css({'background':'#000','color':'#fff'})
		// });
		$(".exit").removeAttr("style")
		
	});
</script>
</body>
</html>
