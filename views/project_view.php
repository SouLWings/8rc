<div class='row maincontent'>
	<header>
		Project
	</header>
	<div class="col-sm-12 col-md-12">
		<ul class="nav nav-tabs">
		  <li class='active'><a href="#projecttab" data-toggle="tab">Ongoing project</a></li>
		  <li><a href="#pastprojecttab" data-toggle="tab">Past project</a></li>
		  <li><a href="#trashtab" data-toggle="tab">Trashed</a></li>
		  <li><a href="#newtab" data-toggle="tab">Create new</a></li>
		</ul>
	</div>
	

	<div class="col-sm-12 col-md-12">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="projecttab">
			<?php if(sizeof($this->activities)==0){?>
			<h2>No project record found.</h2>
			<?php } else {?>
			<div class="col-sm-4 col-md-4 form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Search: </label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" autofocus>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class='col-sm-12 col-md-12'>
			<?php for($i = 0; $i < sizeof($this->activities); $i++){  if($this->activities[$i]['status']!='trashed'){?>
			<div class="panel panel-info">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#project<?php echo $i?>">
					  <?php echo $this->activities[$i]['name'].' '.$this->activities[$i]['session'] ?>
					</a> | 
					<a href='#project<?php echo $i?>' data-toggle="collapse" class='btn-icon text-right'> <i class="fa fa-gear"></i> Edit</a> | 
					<a href='#' class='btn-icon text-right'> <i class="fa fa-trash-o"></i> Trash</a>
				  </h4>
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
		
		<div class="tab-pane fade" id="pastprojecttab">
			<?php if(sizeof($this->pastactivities)==0){?>
			<h2>No past project record found.</h2>
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
		<div class="tab-pane fade" id="newtab"> 
			<form id='contactform' action='#' method='POST' class="form-horizontal">
				<fieldset>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Project Name:</label>
						<div class='col-sm-7 col-md-7'>
							<input required type='text' value='' name='name' id='inputemail' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Session:</label>
						<div class='col-sm-4 col-md-4'>
							<select class='form-control'>
								<option>13/14</option>
								<option>12/13</option>
								<option>11/12</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Type:</label>
						<div class='col-sm-4 col-md-4'>
							<select class='form-control'>
								<option value='mproject'>Mega Project</option>
								<option value='nproject'>Normal Project</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Description:</label>
						<div class='col-sm-7 col-md-7'>
							<textarea class='form-control' name='message'></textarea>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-3'>
							<input type='hidden' value='newproject' name='action' />
							<input type='submit' class='btn btn-primary' value='Create'/>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="tab-pane fade" id="trashtab"> 
			<?php if(sizeof($this->activities)==0){?>
			<h2>No project record found.</h2>
			<?php } ?>
			<?php for($i = 0; $i < sizeof($this->activities); $i++){ if($this->activities[$i]['status']=='trashed'){?>
			<div class="panel panel-danger">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#project<?php echo $i?>">
					  <?php echo $this->activities[$i]['name'].' '.$this->activities[$i]['session'] ?>
					</a>
					<a href='#project<?php echo $i?>' data-toggle="collapse" class='pull-right'> <i class="fa fa-gear"></i> Change</a>
					<a href='#' class='pull-right'> <i class="fa fa-upload"></i> Trash</a>
				  </h4>
				</div>
				<div id="project<?php echo $i?>" class="panel-collapse collapse">
				  <div class="panel-body table-responsive">
					<?php echo $this->activities[$i]['description']?>
					<a href='#' class='pull-right'> <i class="fa fa-upload"></i> Upload</a>
				  </div>
				</div>
			</div>
			<?php }} ?>
		</div>
	</div>
	</div>
</div>