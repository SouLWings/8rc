<div class='row maincontent'>
	<header>
		SUKMUM
	</header>
	<div class="col-sm-12 col-md-12">
		<ul class="nav nav-tabs">
		  <li class='active'><a href="sukmum">Ongoing SUKMUM</a></li>
		  <li><a href="#pastsukmumtab" data-toggle="tab">Past SUKMUM</a></li>
		  <li><a href="#archivementtab" data-toggle="tab">Archivement</a></li>
		  <li><a href="#newtab" data-toggle="tab">Create new</a></li>
		</ul>
	</div>
	

	<div class="col-sm-12 col-md-12">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="sukmumtab">
			<?php if(sizeof($this->activities)==0){?>
			<h2>No SUKMUM record found.</h2>
			<?php } else {?>
			<div class="col-sm-4 col-md-4 form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Search: </label>
					<div class="col-sm-10">
					  <input id='searchbox' class="form-control">
					</div>
				</div>
			</div>
			<?php } ?>
			<div class='col-sm-12 col-md-12'>
			<?php for($i = 0; $i < sizeof($this->activities); $i++){  if($this->activities[$i]['status']!='trashed'){?>
			<div class="panel panel-info" style='transition: opacity 0.5s ease <?php echo $i*0.03;?>s'>
				<div class="panel-heading">
				  <h4 class="panel-title text-right">
					<a data-toggle="collapse" data-parent="#accordion" href="#project<?php echo $i?>" class='pull-left'>
					  <i class="fa fa-caret-square-o-down"></i> <span><?php echo $this->activities[$i]['name'].' '.$this->activities[$i]['session'] ?></span>
					</a>
					<a href='#project<?php echo $i?>edit' data-toggle="collapse"> <i class="fa fa-gear"></i> Edit</a> | 
					<a href='#project<?php echo $i?>delete'> <i class="fa fa-trash-o"></i> Trash</a>
				  </h4>
				</div>
				<div id="project<?php echo $i?>delete" class="panel-collapse collapse">
					<div class="panel-body table-responsive">
						Confirm delete?
						<input type='submit' class='btn btn-danger' value='Delete'/>
					</div>
				</div>
				<div id="project<?php echo $i?>edit" class="panel-collapse collapse">
					<div class="panel-body table-responsive">
						<form id='editsukmumform' action='create' method='POST' class="form-horizontal">
							<fieldset>
								<div class='form-group'>
									<label class='col-sm-3 col-md-3 control-label'>SUKMUM Name:</label>
									<div class='col-sm-3 col-md-3'>
										<input required type='text' value='' name='name' id='inputname' class='form-control'/>
									</div>
								</div>
								<div class='form-group'>
									<div>
										<input type='hidden' value='sukmum' name='type' />
										<div class='col-md-2 col-md-offset-3'>
										<input type='submit' class='btn btn-primary' value='Edit'/>
										<div class='loading pull-right' style='display:none'></div>
										</div>
										<div class='col-md-8'>
										<br>
										<div class="alert alert-success col-md-5 col-md-offset-4">
											<span class="alert-link"></span> Record updated successfully!
										</div>
										<div class="alert alert-danger col-md-5 col-md-offset-4">
											<span class="alert-link"></span> Failed to update record <span id='failmsg'></span>
										</div>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<div id="project<?php echo $i?>" class="panel-collapse collapse">
					<div class="panel-body table-responsive">
						<?php echo $this->activities[$i]['description']?>
						<h2>Committee Member</h2>
						<a href='#'> <i class="fa fa-plus-circle"></i> Add Entry</a> | 
						<a href='#'> <i class="fa fa-upload"></i> Upload</a> | 
						<a href='#'> <i class="fa fa-download"></i> Download</a> | 
						<a href='#'> <i class="fa fa-times-circle"></i> Remove All Entries</a>
						<br>
						<table class="table table-bordered table-hover table-striped ">
							<thead>
								<tr>
									<th>Name</th>
									<th>Matric no.</th>
									<th>Room</th>
									<th>Position</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
								</tr>
								<tr>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
								</tr>
								<tr>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
								</tr>
								<tr>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
								</tr>
								<tr>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } }?>
			</div>
		</div>
		
		<div class="tab-pane fade" id="pastsukmumtab">
			<?php if(sizeof($this->pastactivities)==0){?>
			<h2>No past SUKMUM record found.</h2>
			<?php } ?>
			<?php for($i = 0; $i < sizeof($this->pastactivities); $i++){ ?>
			<div class="panel panel-warning">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#pastproject<?php echo $i?>">
					  <?php echo $this->pastactivities[$i]['name'].' '.$this->pastactivities[$i]['session'] ?>
					</a>
				  </h4>
				</div>
				<div id="pastproject<?php echo $i?>" class="panel-collapse collapse">
				  <div class="panel-body table-responsive">
					<?php echo $this->pastactivities[$i]['description']?>
				  </div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="tab-pane fade" id="archivementtab"> 
			<div class="radio">
			  <label>
				<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				All
			  </label>
			</div>
			<div class="radio">
			  <label>
				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				This session only
			  </label>
			</div>
			<div class="radio">
			  <label>
				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				Last session only
			  </label>
			</div>
			<table class="table table-bordered table-hover table-striped ">
				<thead>
					<tr>
						<th>SUKMUM</th>
						<th>Session</th>
						<th>Archivement</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>asd</td>
						<td>asd</td>
						<td>asd</td>
					</tr>
					<tr>
						<td>asd</td>
						<td>asd</td>
						<td>asd</td>
					</tr>
					<tr>
						<td>asd</td>
						<td>asd</td>
						<td>asd</td>
					</tr>
					<tr>
						<td>asd</td>
						<td>asd</td>
						<td>asd</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="newtab"> 
			<form id='newsukmumform' action='create' method='POST' class="form-horizontal">
				<fieldset>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label'>SUKMUM Name:</label>
						<div class='col-sm-3 col-md-3'>
							<input required type='text' value='' name='name' id='inputname' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<div>
							<input type='hidden' value='sukmum' name='type' />
							<div class='col-md-2 col-md-offset-3'>
							<input type='submit' class='btn btn-primary' value='Create'/>
							<div class='loading pull-right' style='display:none'></div>
							</div>
							<div class='col-md-8'>
							<br>
							<div class="alert alert-success col-md-5 col-md-offset-4">
								<span class="alert-link"></span> Record added successfully!
							</div>
							<div class="alert alert-danger col-md-5 col-md-offset-4">
								<span class="alert-link"></span> Failed to add record <span id='failmsg'></span>
							</div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	</div>
</div>
<style>
.alert{
	
}
</style>
<script>
$('.alert').hide();
$(document).ready(function () {
	$('#searchbox').keyup(function(event){
		if (!(event.keyCode > 47 && event.keyCode < 58) && !(event.keyCode > 64 && event.keyCode < 91 ) && event.keyCode!=8) {
			//$('.form-horizontal').append(event.keyCode+ ' ');
			event.preventDefault(); 
			return false;
		}   
		var key = $(this).val().toLowerCase();
		if(key == '')
		{
			$('#sukmumtab .panel').slideDown();
		}
		else
		{
			$('#sukmumtab .panel').clearQueue();
			$('#sukmumtab .panel').delay(500).slideUp(function(){
				$("#sukmumtab .panel span").filter(function() {
					return $(this).text().toLowerCase().indexOf(key) > -1;
				  }).parent().parent().parent().parent().slideDown(function(){
					$('#sukmumtab .panel').css('height','auto');
				  });
			})
		}
	});

	$('#newsukmumform').submit(function(){
		var url = $(this).attr('action');
        var post = $(this).serialize();
		$(this).find('fieldset').prop('disabled','disabled');
		$(".loading").show();
        $.post(url, post
		,function(data,status){
			$('#newsukmumform fieldset').prop('disabled','');
			$(".loading").hide();
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					$('.alert-success').show().delay(3000).fadeOut(2000);
					$('input[name="matric"]').val('');
				}
				else
				{
					$('#failmsg').text(data['msg']);
					$('.alert-danger').show().delay(5000).fadeOut(3000);
				}
			}
			else
			{
				$('#failmsg').text("Could not connect to server.");
				$('.alert-danger').show().delay(5000).fadeOut(3000);
			}
			$('fieldset').prop('disabled','');
			$('input[name="matric"]').focus();
		},'json');
        return false;
	});
});
</script>