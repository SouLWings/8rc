<style>
.maincontent .panel {
	border: none;
}
.maincontent .panel {
	opacity:0.05;
	box-shadow:none;
	padding:20px 0;
	border-bottom:1px solid #ddd;
	border-radius:0;
}
.bold span.col-xs-4{
	font-weight:bold;
}

span.inline-edit{
	border: 2px solid transparent;
	outline:none;
}

span.inline-edit.editable{
	border: 2px dashed #ccf;
}

span.inline-edit.editable:hover{
	border: 2px solid #ccf;
}
</style>
<div class='row maincontent'>
	<header>
		Maintenance
	</header>
	
	<div class="col-sm-12 col-md-12">
		<ul class="nav nav-tabs">
		  <li class='active'><a href="report">My reports</a></li>
		  <li><a href="#newtab" data-toggle="tab">New report</a></li>
		</ul>
	</div>	
	
	<div class='col-md-8'>
	
	<div class="tab-content">
		<div class="tab-pane fade in active">
		<?php 
		
		for($i = 0; $i < sizeof($this->maintenances); $i++){ 
			if($this->maintenances[$i]['status'] == 'pending')
				$style = 'info';
			else if($this->maintenances[$i]['status'] == 'done')
				$style = 'success';
			else if($this->maintenances[$i]['status'] == 'invalid')
				$style = 'old';
			else if($this->maintenances[$i]['status'] == 'not done')
				$style = 'warning';
			else
				$style = 'default';
		
			if($this->maintenances[$i]['datecomplete'] == null)
				$this->maintenances[$i]['datecomplete'] = '-';
		?>
		<div data-id='<?php echo $this->maintenances[$i]['id'] ?>' class="panel panel-<?php echo $style;?>" style='transition: -webkit-transform 1s,width 0.2s, opacity 0.5s ease <?php echo $i*0.02;?>s'>
			<div class="panel-heading">
			  <h4 class="panel-title text-right">
				<a data-toggle="collapse" data-parent="#accordion" href="#maintenance<?php echo $i?>" class='pull-left'>
				  Issue #<?php echo $this->maintenances[$i]['id'] ?>
				</a>
				<a class='save'> <i class="fa fa-save"></i> Save</a>
				<span> | </span>
				<a class='edit'> <i class="fa fa-pencil-square-o"></i> Edit</a> 
				<?php if($style=='info'){ ?>
				 | <a href='#maintenance<?php echo $i?>delete' data-toggle="collapse"> <i class="fa fa-trash-o"></i> Trash</a>
				<?php } ?>
			  </h4>
			</div>
			<div id="maintenance<?php echo $i?>delete" class="panel-collapse collapse">
				<div class="panel-body table-responsive text-center">
					<div class='col-md-offset-3 col-md-5'>
						Confirm to delete this report?<br>
						<a class='delete btn btn-danger' data-id='<?php echo $this->activities[$i]['id']?>'>Delete</a>
					</div>
				</div>
			</div>
			<div id="maintenance<?php echo $i?>" class="panel-collapse collapse in">
				<div class="panel-body table-responsive bold">
					<span class='col-xs-4'>Maintenance issue</span>
					<span class='col-xs-8'><?php echo $this->maintenances[$i]['issue'] ?></span>
					<br/>
					
					<span class='col-xs-4'>Date reported </span>
					<span class='col-xs-8'><?php echo date('d M Y', strtotime($this->maintenances[$i]['datetime'])) ?></span>
					<br/>
					
					<span class='col-xs-4'>Time reported </span>
					<span class='col-xs-8'><?php echo date('h:ma', strtotime($this->maintenances[$i]['datetime'])) ?></span>
					<br/>
					
					<span class='col-xs-4'>Status </span>
					<span class='col-xs-8 text-<?php echo $style ?>'><b><?php echo $this->maintenances[$i]['status'] ?></b></span>
					<br/>
					<br/>
					
					<span class='col-xs-4'>Location </span>
					<span class='col-xs-8' name='location'><?php echo $this->maintenances[$i]['location'] ?></span>
					<br/>
					
					<span class='col-xs-4'>Description </span>
					<span class='col-xs-8 inline-edit'>
						<?php echo $this->maintenances[$i]['description'] ?>
					</span>
					<br/>
					<br/>
					
					<span class='col-xs-4'>Date completed </span>
					<span class='col-xs-8'><?php echo $this->maintenances[$i]['datecomplete'] ?></span>
					<br/>
					
					<span class='col-xs-4'>Done by</span>
					<span class='col-xs-8'><?php echo $this->maintenances[$i]['persondone'] ?></span>
					<br/>
					
					<span class='col-xs-4'>Maintenance description</span>
					<span class='col-xs-8'><?php echo $this->maintenances[$i]['descdone'] ?></span>
					<br/>
					
				</div>
			</div>
		</div>
		<?php } ?>
		</div>
		
		<div class="tab-pane fade" id="newtab">
			<form id='' action='add' method='POST' class="form-horizontal form-ajax">
				<fieldset>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label'>Issue:</label>
						<div class='col-sm-6'>
							<input required type='text' value='' name='issue' id='issue' class='form-control' autofocus placeholder='Report heading' />
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label'>Location:</label>
						<div class='col-sm-6'>
							<input required type='text' value='' name='location' id='issue' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label'>Description:</label>
						<div class='col-sm-6'>
							<textarea name='desc' required class='form-control' rows='4'></textarea>
						</div>
					</div>
					<div class='form-group'>
						<div>
							<input type='hidden' value='sukmum' name='type' />
							<div class='col-md-2 col-md-offset-3'>
								<input type='hidden' name='matric' value='IER130003'/>
								<input type='submit' class='btn btn-primary' value='Create'/>
								<div class='loading pull-right' style='display:none'></div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
    </div>
</div>
<script>
	$('.save').hide();
	$(document).ready(function () {
		$('.edit').click(function(){
			$(this).parent().parent().parent().find(".save").show();
			$(this).parent().parent().parent().find("span.inline-edit").addClass("editable");
			$(this).parent().parent().parent().find("span.inline-edit").prop("contenteditable", 'true');
			$(this).parent().parent().parent().find("span.inline-edit").focus();
		});
		
		$('.save').click(function(){
			$save = $(this);
			$panel = $(this).parent().parent().parent();
			$editvalue = $panel.find("span.inline-edit");
			console.log('id: '+$editvalue.text());
			$.post('edit', {
				maintenance_id: $panel.data('id'),
				issue: 's',
				location: $('span[name="location"]').text(),
				desc: $editvalue.text()
			},function(data,status){
				if(status == 'success')
				{
					if(data['status'] == 'success')
					{
						$save.hide();
						$editvalue.removeClass("editable");
						$editvalue.prop("contenteditable", 'false');
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
		
		$('.delete').click(function(event){
			$btn = $(this);
			$panel = $(this).parent().parent().parent().parent();
			$btn.toggleClass('disabled');
			$.post('delete', {maintenance_id:$panel.data('id')}
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

		$('.maincontent .form-ajax').submit(function(){
			$form = $(this);
			var url = $(this).attr('action');
			var post = $(this).serialize();
			$form.find('fieldset').prop('disabled','disabled');
			//$form.append(post);
			$.post(url, post
			,function(data,status){
				if(status == 'success')
				{
					if(data['status'] == 'success')
					{
						window.location.reload();
					}
					else
					{
						alert(data['msg']);
					}
				}
				else
				{
					alert("Could not connect");
				}
			},'json');
			return false;
		});		
		
	});
</script>