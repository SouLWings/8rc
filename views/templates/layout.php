<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title ?></title>
	<?php foreach($this->js as $js){?>
	<script type='text/javascript' src='<?php echo URL ?>res/js/<?php echo $js ?>.js'></script>
	<?php } ?>
	<?php foreach($this->css as $css){?>
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>res/css/<?php echo $css ?>.css" />
	<?php } ?>
<style>
.navbars{
background-image: -webkit-gradient(
	linear,
	left top,
	right top,
	color-stop(0, #C4FF00),
	color-stop(1, #5CD400)
);
background-image: -o-linear-gradient(right, #C4FF00 0%, #5CD400 100%);
background-image: -moz-linear-gradient(right, #C4FF00 0%, #5CD400 100%);
background-image: -webkit-linear-gradient(right, #C4FF00 0%, #5CD400 100%);
background-image: -ms-linear-gradient(right, #C4FF00 0%, #5CD400 100%);
background-image: linear-gradient(to right, #C4FF00 0%, #5CD400 100%);
}
.stickybgi{
	opacity:0.2;
	position:absolute;
	right:5vw;
	bottom:5vh;
	max-height:70vh;
	min-height:50vh;
	-webkit-filter: blur(2px);
}
.brand:hover{
	text-decoration:none;
	color:#125b9a;
	text-shadow: 0 0 1px #428bca;
}
.brand{
	padding:5px;
	float:left;
	font-weight:bolder;
	font-size:18px;
	transition: color 0.5s
}
body{
	font-family: "FSecureOffice", Arial, Helvetica, sans-serif !important;
}

.maincontent > header{
	font-size:3em;
	font-weight:bold;
	color:#428bca;
	padding-left:15px;
}

.maincontent{
	margin:5px 0;
	opacity:0.1;
	transition: opacity 0.4s;
}
.maincontent .panel{
	margin-bottom:1px;
	opacity:0.05;
}
</style>
</head>
<body style='padding-top:50px;'>
<!--<img class='stickybgi' src='img/logo/kk8logo.png'/>-->
<div class='container' style='width:100%'>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="brand" href="#">
					<img src='<?php echo URL ?>res/img/logo/KK8logo.png' style='max-height:40px;margin-right:10px;'/>Kinabalu Residential College
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<?php echo $this->topmenu ?>
				<!--<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
				</form>-->
			</div>
      </div>
    </div>
	<div class='row'>
		<?php echo $this->sidenav ?>
		<?php echo $this->contentframe ?>
	</div>
	<script>
		
	  $(document).ready(function () {
		$('.maincontent, .panel').css('opacity','1');
	  });
	</script>
</div>
<?php echo $this->modalforms ?>
</body>
</html>