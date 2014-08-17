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
	<style type="text/css">
			#loading { width: 100%; height: 34px; background: url(data:image/gif;base64,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) no-repeat center; }

.jumbotron{
  height:100%;
  background-color:rgba(66, 139, 202,0.4);
 }
 
/* Carousel base class */
.carousel {
  height: 100%;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel .item {
  height: 100vh;
	overflow-y:auto;
}
.carousel-inner > .item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 100%;
}
.carousel-control{
	transition:all 300ms;
	width:10%;
}

.carousel .slide{
	margin-top: 65px;
	margin-left: 5%;
	margin-right: 5%;
}

@media (min-width: 768px) {
	.carousel .slide{
		margin-left: 17%;
		margin-right: 17%;
	}
}

.form-control-fixed{
	display:inline;
	padding-top:0;
	padding-left:3px;
	padding-bottom:0;
	padding-right:3px;;
	width:150px;
	height:24px;
	margin-left:5px;
}
</style>
</head>
<body style='overflow:hidden'>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation" style='opacity:1;margin-bottom:0;'>
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="brand" href="#">
					<img src='<?php echo URL ?>res/img/logo/KK8logo.png' style='max-height:40px;margin-right:10px;'/>Kinabalu Residential College
				</a>
			</div>
      </div>
    </div>

	 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
		  <div class='slide'>
			<form id='slide1' method='POST' class="form-horizontal slideform">
				<fieldset>
					<legend>Please complete the following</legend>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Name:</label>
						<div class='col-sm-6 col-md-5'>
							<input required type='text' value='' name='name' id='name' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>IC number:</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='text' value='' name='ic' id='ic' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Matric:</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='text' value='' name='matric' id='matric' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Address:</label>
						<div class='col-sm-4 col-md-5'>
							<textarea required type='text' value='' name='address' id='address' class='form-control'></textarea>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Race:</label>
						<div class='col-sm-4 col-md-3'>
							<select class='form-control' name='race'>
								<option value='Malay'>Malay</option>
								<option value='Chinese'>Chinese</option>
								<option value='Indian'>Indian</option>
								<option value='Others'>Others</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Religion:</label>
						<div class='col-sm-4 col-md-3'>
							<select name='religion' class='form-control'>
								<option>ISLAM</option> 
								<option>BUDDHA</option> 
								<option>HINDU</option> 
								<option>CHRISTIAN</option> 
								<option>CATALIC</option> 
								<option>OTHERS</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Contact number:</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='text' value='' name='phone' id='phone' class='form-control' placeholder='eg. 0123456789'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Emergancy contact number:</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='text' value='' name='emergancy' id='emergancy' class='form-control' placeholder='eg. 0123456789'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Email (facebook):</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='email' value='' name='email' id='email' class='form-control' />
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-3'>
							<input type='submit' class='btn btn-primary' value='Next'/>
						</div>
					</div>
				</fieldset>
			</form>
			<div class='clear-fix' style='margin-bottom:20px;height:20px;'></div>
		  </div>
        </div>
		
		
        <div class="item">
		  <div class='slide'>
			<form id='slide2' method='POST' class="form-horizontal slideform">
				<fieldset>
					<legend>Food and Health Infomation</legend>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Are you a vegetarian? </label>
						<div class='col-lg-4'>
							<label class="radio-inline">
								<input type="radio" name="vege" value="No" checked> No
							</label>
							<label class="radio-inline">
								<input type="radio" name="vege" value="Yes"> Yes
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label' for='inputIC'>Are you allergic to any food?</label>
						<div class='col-lg-8'>
							<label class="checkbox-inline">
								<input type="checkbox" name="food[]" value="No " checked> No
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="food[]" value="Beef "> Beef
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="food[]" value="Seafood "> Seafood
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="food[]" value="Fish "> Fish
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="food[]" value="Chicken "> Chicken
							</label>
							
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Are you allergic to any medcine?</label>
						<div class='col-lg-8'>
							<label class="radio-inline">
								<input type="radio" name="medcine" value="No" checked> No
							</label>
							<label class="radio-inline">
								<input type="radio" name="medcine" value="Yes: "> Yes:
								<input type='text' autocomplete='off' value='' name='medcinename' id='inputallergicmedine' class='form-control form-control-fixed' placeholder='Name the medcine'>
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Have you had surgery recently?</label>
						<div class='col-lg-8'>
							<label class="radio-inline">
								<input type="radio" name="surgery" value="No" checked> No
							</label>
							<label class="radio-inline">
								<input type="radio" name="surgery" value="Yes: "> Yes:
								<input type='text' autocomplete='off' value='' name='surgerytime' id='inputsurgerytime' class='form-control form-control-fixed' placeholder='When you had it'>
								<input type='text' autocomplete='off' value='' name='surgeryname' id='inputsurgeryname' class='form-control form-control-fixed' placeholder='Name the surgery'>
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Are you having any illness:</label>
						<div class='col-lg-8'>
							<label class="checkbox-inline">
								<input type="checkbox" name="illness[]" value="No " checked> No
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="illness[]" value="Fever "> Fever
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="illness[]" value="Flu "> Flu
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="illness[]" value="Diarrhea "> Diarrhea
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="illness[]" value="Others: "> Others:
								<input type='text' autocomplete='off' value='' name='illness[]' id='inputillness' class='form-control form-control-fixed' placeholder='State the illness'>
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Are you just returned from foriegn country:</label>
						<div class='col-lg-8'>
							<label class="radio-inline">
								<input type="radio" name="country" value="No" checked> No
							</label>
							<label class="radio-inline">
								<input type="radio" name="country" value="Yes: "> Yes:
								<input type='text' autocomplete='off' value='' name='countryname' id='inputcountry' class='form-control form-control-fixed' placeholder='Please state the country'>
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-4 control-label'>Have you had rubella vaccine injection before?</label>
						<div class='col-lg-8'>
							<label class="radio-inline">
								<input type="radio" name="vaccine" value="No" checked> No
							</label>
							<label class="radio-inline">
								<input type="radio" name="vaccine" value="Yes: "> Yes:
								<input type='text' autocomplete='off' value='' name='vaccinetime' id='inputvaccine' class='form-control form-control-fixed' placeholder='When you had it'>
							</label>
						</div>
					</div>

					<div class='form-group'>
						<div class='col-lg-3 col-lg-offset-4'>
							<input type='submit' class='btn btn-primary' value='Next Step'/>
							<a href='register.php' class='btn btn-primary'>Back</a>
						</div>
					</div>
				</fieldset>
			</form>
			<div class='clear-fix' style='margin-bottom:20px;height:20px;'></div>
		  </div>
        </div>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control " href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control " href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
	
	
<script>
	$('.alert').hide();
	$(document).ready(function() { 
		$('.carousel').carousel({
		  interval: 999999999
		});
		
		$('.slideform').submit(function(e){
			e.preventDefault();
			$('.glyphicon-chevron-right').click();
			return false;
		});
		
		$("input[name='ic']").keydown(function(event) {
			// Allow: backspace, delete, tab, escape, and enter
			if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
				 // Allow: Ctrl+A
				(event.keyCode == 65 && event.ctrlKey === true) || 
				 // Allow: home, end, left, right
				(event.keyCode >= 35 && event.keyCode <= 39)) {
					 // let it happen, don't do anything
					 return;
			}
			else {
				// Ensure that it is a number and stop the keypress
				if ($("input[name='ic']").val().length > 11 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
					event.preventDefault(); 
				}   
			}
		});
	}); 
</script>
</body>
</html>