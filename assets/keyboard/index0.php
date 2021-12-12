<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
			background: #f3dcdc;
			padding: 9px;
		}
	</style>
</head>
<body>
<div class="container-fluid main-board" style="width: 684px;">
	<div class="col-md-12 " style="">
		<div class="row">
			<h5>Keyboard</h5>
		</div>
	</div>

	<div class="col-md-1 key">
		1
	</div>
	<div class="col-md-1 key">
		2
	</div>
	<div class="col-md-1 key">
		3
	</div>
	<div class="col-md-1 key">
		4
	</div>
	<div class="col-md-1 key">
		5
	</div>	
	<div class="col-md-1 key">
		6
	</div>
	<div class="col-md-1 key">
		7
	</div>
	<div class="col-md-1 key">
		8
	</div>
	<div class="col-md-1 key">
		9
	</div>
	<div class="col-md-1 key">
		10
	</div>
	<div class="col-md-1 key">
		11
	</div>	
	<div class="col-md-1 key">
		12
	</div>

	<div class="col-md-1 key">
		Q
	</div>
	<div class="col-md-1 key">
		W
	</div>
	<div class="col-md-1 key">
		E
	</div>
	<div class="col-md-1 key">
		R
	</div>
	<div class="col-md-1 key">
		T
	</div>	
	<div class="col-md-1 key">
		Y
	</div>
	<div class="col-md-1 key">
		U
	</div>
	<div class="col-md-1 key">
		I
	</div>
	<div class="col-md-1 key">
		O
	</div>
	<div class="col-md-1 key">
		P
	</div>
	<div class="col-md-1 key">
		{
	</div>	
	<div class="col-md-1 key">
		}
	</div>



	<div class="col-md-1 key">
		A
	</div>
	<div class="col-md-1 key">
		S
	</div>
	<div class="col-md-1 key">
		D
	</div>
	<div class="col-md-1 key">
		F
	</div>
	<div class="col-md-1 key">
		G
	</div>	
	<div class="col-md-1 key">
		H
	</div>
	<div class="col-md-1 key">
		J
	</div>
	<div class="col-md-1 key">
		K
	</div>
	<div class="col-md-1 key">
		L
	</div>
	<div class="col-md-1 key">
		;
	</div>
	<div class="col-md-1 key">
		" "
	</div>	
	<div class="col-md-1 key">
		Enter
	</div>


	<div class="col-md-1 key">
		Shift
	</div>
	<div class="col-md-1 key">
		Z
	</div>
	<div class="col-md-1 key">
		X
	</div>
	<div class="col-md-1 key">
		C
	</div>
	<div class="col-md-1 key">
		V
	</div>
	<div class="col-md-1 key">
		B
	</div>	
	<div class="col-md-1 key">
		N
	</div>
	<div class="col-md-1 key">
		M
	</div>
	<div class="col-md-1 key">
		<
	</div>
	<div class="col-md-1 key">
		>
	</div>
	<div class="col-md-1 key">
		?
	</div>
	<div class="col-md-1 key">
		Shift
	</div>	
	
	<div class="col-md-1 key">
		Ctrl
	</div>
	<div class="col-md-1 key">
		<img src="img/windows.png" width="20">
	</div>
	<div class="col-md-1 key">
		Alt
	</div>
	<div class="col-md-5 key">
		Specbar
	</div>
	
	<div class="col-md-1 key">
		Alt
	</div>
	<div class="col-md-1 key">
		<img src="img/windows.png" width="20">
	</div>
	<div class="col-md-1 key">
		<img src="img/1.png" width="20">
	</div>	
	<div class="col-md-1 key">
		Ctrl
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.main-board').draggable();
	});
</script>
</body>
</html>
