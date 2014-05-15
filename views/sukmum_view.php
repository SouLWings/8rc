<div class='row maincontent'>
	<header>
		<?php echo $this->activitytype?>
	</header>
	<div class="col-sm-12 col-md-12">
		<ul class="nav nav-tabs">
		  <li class='active'><a href="sukmum">Ongoing <?php echo $this->activitytype?></a></li>
		  <li><a href="#pastsukmumtab" data-toggle="tab">Past <?php echo $this->activitytype?></a></li>
		  <li><a href="#archivementtab" data-toggle="tab">Archivement</a></li>
		  <li><a href="#newtab" data-toggle="tab">Create new</a></li>
		</ul>
	</div>
	
	<div class="col-sm-12 col-md-10">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="sukmumtab">
			<?php if(sizeof($this->activities)==0){?>
			<h2>No <?php echo $this->activitytype?> record found.</h2>
			<?php } else {?>
			<div class="col-sm-4 col-md-4 form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 col-md-3 control-label">Search: </label>
					<div class="col-sm-8 col-md-9">
					  <input class="searchbox form-control" autofocus>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-md-8 form-horizontal">
				<button class='btn btn-info pull-right expandall'><i class='fa fa-search-plus'></i> Expand All</button>
			</div>
			<?php } ?>
			<div class='col-sm-12 col-md-12'>
			<?php for($i = 0; $i < sizeof($this->activities); $i++){  if($this->activities[$i]['status']!='trashed'){?>
			<div data-id='<?php echo $this->activities[$i]['id']?>' class="panel panel-info" style='transition: -webkit-transform 1s,width 0.2s, opacity 0.5s ease <?php echo $i*0.02;?>s'>
				<div class="panel-heading">
				  <h4 class="panel-title text-right">
					<a data-toggle="collapse" data-parent="#accordion" href="#activity<?php echo $i?>" class='pull-left'>
					  <i class="fa fa-plus-square-o"></i> <span class='activityname'><?php echo $this->activities[$i]['name'].' '.$this->activities[$i]['session'] ?></span>
					</a>
					<a href='#activity<?php echo $i?>edit' data-toggle="collapse"> <i class="fa fa-pencil-square-o"></i> Edit</a> | 
					<a href='#activity<?php echo $i?>delete' data-toggle="collapse" > <i class="fa fa-trash-o"></i> Trash</a>
				  </h4>
				</div>
				<div id="activity<?php echo $i?>delete" class="panel-collapse collapse">
					<div class="panel-body text-center">
						<div class='col-md-offset-2 col-md-8 text-danger'>
							<b>Are you sure to delete this <?php echo $this->activitytype?> activity?</b><br>
							<div>*Members will no longer gain merit mark from this activity</div>
							<a class='deleteactivitybtn btn btn-danger' data-id='<?php echo $this->activities[$i]['id']?>'>Confirm Delete</a>
						</div>
					</div>
				</div>
				<div id="activity<?php echo $i?>edit" class="panel-collapse collapse">
					<div class="panel-body">
						<form id='editsukmumform' action='edit' method='POST' class="form-horizontal form-ajax">
							<fieldset>
								<div class='form-group'>
									<label class='col-md-4 control-label'><?php echo $this->activitytype?> Name:</label>
									<div class='col-md-3'>
										<input required type='text' value='<?php echo $this->activities[$i]['name']?>' name='name' class='form-control'/>
									</div>
								</div>
								<div class='form-group'>
									<div>
										<input type='hidden' value='<?php echo $this->activities[$i]['id']?>' name='id' />
										<div class='col-md-2 col-md-offset-4'>
										<input type='submit' class='btn btn-primary' value='Edit'/>
										<div class='loading pull-right' style='display:none'></div>
										</div>
										<div class='col-md-8'>
										<br>
										<div class="alert alert-success col-md-5 col-md-offset-6">
											<span class="alert-link"></span> Record updated successfully!
										</div>
										<div class="alert alert-danger col-md-5 col-md-offset-6">
											<span class="alert-link"></span> Failed to update record <span id='failmsg'></span>
										</div>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<div id="activity<?php echo $i?>" class="panel-collapse collapse">
					<div class="panel-body table-responsive">
						<?php echo $this->activities[$i]['description']?>
						<h2>Committee Member</h2>
						<a href='#memberadd<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-plus-circle"></i> Add member</a> | 
						<a href='#memberupload<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-upload"></i> Upload</a> | 
						<?php if(sizeof($this->activities[$i]['participant']) > 0){ ?>
						<a href='<?php echo URL?>merit/download/activity/<?php echo $this->activities[$i]['id']?>'> <i class="fa fa-download"></i> Download</a> | 
						<?php } ?>
						<a href='#memberclear<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-times-circle"></i> Remove All member</a>
						<br/>
						<br/>
						<?php if(isset($_GET['id']) && isset($_GET['msg']) && ($this->activities[$i]['id'] == $_GET['id'])) { ?>
						<div class='text-danger'><b>Record not added. <?php echo $_GET['msg'] ?></b></div>
						<?php } ?>
						<div id='memberadd<?php echo $i?>' class='entry-action collapse'>
							<form class="form-inline" method='POST' action='<?php echo URL ?>merit/add/<?php echo $this->activities[$i]['type']?>'>
							  <div class="form-group">
								<input type="text" name='matric' class="form-control" required pattern='[A-z]{3}[0-9]{6}' title='eg. EEE130014' placeholder="Matric number">
							  </div>
							  <div class="form-group">
								<select class='form-control' name='merittypeid'>
									<?php foreach($this->meritpositions as $p): ?>
									<option value='<?php echo $p['id'] ?>'><?php echo $p['name'] ?></option>
									<?php endforeach; ?>
								</select> 
							  </div>
							  <input type='hidden' value='<?php echo $this->activities[$i]['id']?>' name='id' />
							  <button type="submit" class="btn btn-primary">Add member</button>
							</form>
						</div>
						<div id='memberupload<?php echo $i?>' class='entry-action collapse'>
							<form action='<?php echo URL ?>merit/upload/<?php echo $this->activities[$i]['type']?>' method='POST' enctype="multipart/form-data">
								<input type="file" name='csvfile' title="Upload a .csv file" class='btnupload' required>
								<input type='hidden' name='id' value='<?php echo $this->activities[$i]['id']?>'/>
								<input type='submit'  class='btn btn-primary' style='display:inline'/>
								<p><b>*Make sure the CSV file follows the <a href='guideline'>required format.</a></b></p>
							</form>
						</div>
						<div id='memberclear<?php echo $i?>' class='entry-action collapse'>
							<form action='<?php echo URL ?>merit/remove/activity' method='POST' class='form-ajax-delete'>
								<div class=' text-danger'>
									<b>Are you sure to delete all members?</b><br>
									<input type='hidden' name='activityoreventid' value='<?php echo $this->activities[$i]['id']?>'/>
									<input type='submit' class='deleteallparticipantsbtn btn btn-danger' value='Confirm Delete'/>
								</div>
							</form>
						</div>
						<table class="table table-bordered table-hover table-striped ">
							<thead>
								<tr>
									<th>Name</th>
									<th>Matric no.</th>
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(sizeof($this->activities[$i]['participant']) > 0){ ?>
								<?php foreach($this->activities[$i]['participant'] as $p){ ?>
								<tr>
									<td><?php echo $p['name']?></td>
									<td><?php echo $p['matric']?></td>
									<td><?php echo $p['type']?></td>
									<td>
										<a class='btn btn-danger btn-xs deleteparticipationbtn ' data-id='<?php echo $p['id']?>'><i class='fa fa-times'></i></a>
									</td>
								</tr>
								<?php }}else{ ?>
								<tr><td colspan='4'>No data found.</td></tr>
								<?php } ?>
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
			<h2>No <?php echo $this->activitytype?> record found.</h2>
			<?php } else {?>
			<div class="col-sm-4 col-md-4 form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Search: </label>
					<div class="col-sm-10">
					  <input id='' class="searchbox form-control" autofocus>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class='col-sm-12 col-md-12'>
			<?php for($i = 0; $i < sizeof($this->pastactivities); $i++){  if($this->pastactivities[$i]['status']!='trashed'){?>
			<div data-id='<?php echo $this->pastactivities[$i]['id']?>' class="panel panel-warning" style='transition: -webkit-transform 1s,width 0.2s, opacity 0.5s ease <?php echo $i*0.02;?>s'>
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#activity<?php echo $i?>">
					  <i class="fa fa-plus-square-o"></i> <span class='activityname'><?php echo $this->pastactivities[$i]['name'].' '.$this->pastactivities[$i]['session'] ?></span>
					</a>
				  </h4>
				</div>
				<div id="activity<?php echo $i?>" class="panel-collapse collapse">
					<div class="panel-body table-responsive">
						<?php echo $this->pastactivities[$i]['description']?>
						<h2>Committee Member</h2>
						<?php if(sizeof($this->pastactivities[$i]['participant']) > 0){ ?>
						<a href='<?php echo URL?>merit/download/activity/<?php echo $this->pastactivities[$i]['id']?>'> <i class="fa fa-download"></i> Download</a>
						<br/>
						<br/>
						<?php } ?>
						<table class="table table-bordered table-hover table-striped ">
							<thead>
								<tr>
									<th>Name</th>
									<th>Matric no.</th>
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(sizeof($this->pastactivities[$i]['participant']) > 0){ ?>
								<?php foreach($this->pastactivities[$i]['participant'] as $p){ ?>
								<tr>
									<td><?php echo $p['name']?></td>
									<td><?php echo $p['matric']?></td>
									<td><?php echo $p['type']?></td>
									<td>
										<button class='btn btn-primary btn-sm'><i class='fa fa-trash-o'></i></button>
									</td>
								</tr>
								<?php }}else{ ?>
								<tr><td colspan='3'>No data found.</td></tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } }?>
			</div>
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
			<form id='newsukmumform' action='create' method='POST' class="form-horizontal form-ajax">
				<fieldset>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label'>SUKMUM Name:</label>
						<div class='col-sm-4 col-md-3'>
							<input required type='text' value='' name='name' id='inputname' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<div>
							<input type='hidden' value='sukmum' name='type' />
							<div class='col-sm-4 col-md-2 col-md-offset-3 col-sm-offset-3'>
								<input type='submit' class='btn btn-primary' value='Create'/>
								<div class='loading pull-right' style='display:none'></div>
							</div>
						</div>
					</div>
					<div class='col-sm-8 col-md-8'>
						<br/>
						<div class="alert alert-success col-md-8 col-md-offset-2">
							<span class="alert-link"></span><i class='fa fa-info-circle'></i> Record added successfully!
						</div>
						<div class="alert alert-danger col-md-5 col-md-offset-4">
							<span class="alert-link"></span> Failed to add record <span id='failmsg'></span>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	</div>
</div>
<style>
.maincontent .panel{
	/* -webkit-transform: rotateY(15deg); */
	width:98%;
	margin: 4px auto;
}
.maincontent .panel:hover{
	/* -webkit-transform: translate(3px, 0px); */
	width:100%;
}
.maincontent .panel-info:hover .panel-heading{
	background-image: linear-gradient(to bottom,#d1e6f4 0,#bbdaf3 100%);
}

.table{
	margin-top: 10px;
}
</style>
<script>
$('.alert').hide();
$(document).ready(function () {
	$('.btnupload').change(function(event){
		var exts = $(this).val().split('.');
		var ext = exts[exts.length-1];
		if(ext.toLowerCase() == 'xls' || ext.toLowerCase() == 'xlsx')
		{
			$(this).val("");
			alert("Please save the excel file as .csv format");
		}
		else if(ext.toLowerCase() != 'csv')
		{
			$(this).val("");
			alert("Please choose a .csv file");
		}
	});
	$('.expandall').click(function(event){
		$panel = $(this).parent().parent();
		var i = 0;
		$panel.find(".panel-body.table-responsive").parent().each(function(){
			console.log(i++);
			if(!$(this).hasClass('in')){
				console.log($(this));
				$(this).parent().find('.activityname').click();}
		});;
	});
	$(".form-ajax-delete").submit(function(event){
		$form = $(this);
		var url = $(this).attr('action');
        var post = $(this).serialize();
        $.post(url, post
		,function(data,status){
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					$form.parent().parent().find('tbody').fadeOut();
					$form.parent().parent().find('.fa-times-circle').click();
					$form.parent().parent().find('.fa-download').parent().addClass("link-disabled");
					$form.parent().parent().find('.fa-download').parent().click(function(e){
						e.preventDefault();
					});
				}
				else
				{
					alert(data['msg']);
				}
			}
			else
			{
				alert('Could not connect to server.');
			}
		},'json');
		return false;
	});
	$('.deleteparticipationbtn').click(function(event){
		$btn = $(this);
		$btn.toggleClass('disabled');
        $.post('<?php echo URL ?>merit/remove', {participationid:$(this).data('id')}
		,function(data,status){
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					$btn.parent().parent().hide(function(){
						$(this).remove();
					});
				}
				else
				{
					alert(data['msg']);
				}
			}
			else
			{
				alert('Could not connect to server.');
			}
		},'json');
	});
	$('.deleteactivitybtn').click(function(event){
		$btn = $(this);
		//alert($(this).data('id'));
		$btn.toggleClass('disabled');
        $.post('delete', {id:$(this).data('id')}
		,function(data,status){
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					$btn.parent().parent().parent().parent().css({'-webkit-transform':'translate(2000px,0px)'}).slideUp(500).fadeOut(500,function(){
						$(this).remove();
					});
				}
				else
				{
					alert(data['msg']);
				}
			}
			else
			{
				alert('Could not connect to server.');
			}
			$btn.toggleClass('disabled');
		},'json');
	});
	
	$('.searchbox').keyup(function(event){
		if (!(event.keyCode > 47 && event.keyCode < 58) && !(event.keyCode > 64 && event.keyCode < 91 ) && event.keyCode!=8) 
			return false;
		var key = $(this).val().toLowerCase();
		$(this).parent().parent().parent().parent().find(".panel").each(function(){
			//$(this).clearQueue();
			if($(this).find("span.activityname").text().toLowerCase().indexOf(key) > -1)
				$(this).slideDown(function(){
					$(this).css('height','auto');
				});
			else
				$(this).slideUp();
		});
	});

	$('.maincontent .form-ajax').submit(function(){
		$form = $(this);
		var url = $(this).attr('action');
        var post = $(this).serialize();
		$form.find('fieldset').prop('disabled','disabled');
		$form.find(".loading").show();
		//$form.append(post);
        $.post(url, post
		,function(data,status){
			$form.find('fieldset').prop('disabled','');
			$form.find(".loading").hide();
			$('.alert').finish().hide();
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					$form.find('.alert-success').show().delay(3000).fadeOut(2000);
				}
				else
				{
					$form.find('#failmsg').text(data['msg']);
					$form.find('.alert-danger').show().delay(5000).fadeOut(3000);
				}
			}
			else
			{
				$form.find('#failmsg').text("Could not connect to server.");
				$form.find('.alert-danger').show().delay(5000).fadeOut(3000);
			}
			$form.find('fieldset').prop('disabled','');
		},'json');
        return false;
	});
	//$('.alert-success').show();
	
	<?php if(isset($_GET['id'])){ ?>
	$('.panel[data-id=<?php echo $_GET['id'] ?>] .activityname').click();
	$('.panel[data-id=<?php echo $_GET['id'] ?>]').ScrollTo({
		duration: 600,
		easing: 'linear'
	});
	<?php } ?>
});
</script>