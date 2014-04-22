<!DOCTYPE html>
<html>
<head>
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
nav{
	background:linear-gradient(to bottom, rgba(124,205,255,0.4), rgba(124,205,255,0));
}
nav li.active{
	border-left: 5px solid rgba(24,125,255,1);
	background: linear-gradient(to right, rgba(51,251,51,0.3),rgba(51,51,51,0));
}
.maincontent{
	background:linear-gradient(to bottom, rgba(124,205,255,0.4), rgba(124,205,255,0));
	height:300px;
}
.contentheading{
	font-size:3em;
}
nav header{
	font-size:1.5em;
	color: #428bca;
	padding:10px;
}
</style>
</head>
<body style='padding-top:50px;'>
<!--<img class='stickybgi' src='img/logo/kk8logo.png'/>-->
<div class='' style='width:98vw; margin:auto;padding:20px;'>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="brand" href="#">
					<img src='<?php echo URL ?>res/img/logo/kk8logo.png' style='max-height:40px;margin-right:10px;'/>Kinabalu Residential College
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
		<div class="col-sm-9 col-sm-offset-3 col-md-offset-2 col-md-10 ">
			<div style='clear:left'></div>
			<br><div class='footer'>Copyright @ Sou|_Wings 2014 <span class="glyphicon glyphicon-user"></span></div>
		</div>
	</div>
	
</div>
<?php echo $this->modalforms ?>
</body>
</html>