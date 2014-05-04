<!DOCTYPE html>
<html style='height:100%;'>
<head>
	<title><?php echo $this->title ?></title>
	<?php foreach($this->js as $js){?>
	<script type='text/javascript' src='<?php echo URL ?>res/js/<?php echo $js ?>.js'></script>
	<?php } ?>
	<?php foreach($this->css as $css){?>
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>res/css/<?php echo $css ?>.css" />
	<?php } ?>
<style>
.jumbotron{
  height:100%;
 }
</style>
</head>
<body style='padding-top:50px;'>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="brand" href="#">
					<img src='<?php echo URL ?>res/img/logo/kk8logo.png' style='max-height:40px;margin-right:10px;'/>Kinabalu Residential College
				</a>
			</div>
      </div>
    </div>
<div class="jumbotron" style='padding-top:0;margin-bottom:0;'>
<div class='container'>
<div class='row text-center'>
  <h1><b>Hope you enjoyed - <?php echo $this->event['name']?></b><br></h1>
<div class='col-md-5'>
  <form role="form">
  <div class="row">
    <h2><br>Enter your matric number:</h2><div class='col-md-offset-3 col-md-6'>
  <p><input type="text" class="form-control text-center" id="" style='font-weight:bold;font-size:0.8em'></p>
  </div>
  </div>
  <p><input type='submit' class="btn btn-primary btn-md" role="button" value='Sign out event'/></p>
  </form>
</div>
<div class='col-md-2 text-center'>
<h1><br>OR</h1>
</div>
<div class='col-md-5'>
<h2>Scan the QR code <br>with KK8 mobile app</h2>
<img src='<?php echo URL."util/QRgenerator.php?code=".$this->code?>'/>
</div>
</div>

</div>
</div>
</body>
</html>