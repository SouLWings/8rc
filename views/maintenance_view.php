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
</style>
<div class='row maincontent'>
	<header>
		Maintenance
	</header>
	<div class='col-sm-6 col-md-8'>
		<?php 
		
		for($i = 0; $i < sizeof($this->maintenances); $i++){ 
			if($this->maintenances[$i]['status'] == 'pending')
				$style = 'info';
			if($this->maintenances[$i]['status'] == 'done')
				$style = 'success';
			else if($this->maintenances[$i]['status'] == 'invalid')
				$style = 'old';
			else if($this->maintenances[$i]['status'] == 'not done')
				$style = 'warning';
			else
				$style = 'default';
		
		?>
		<div class="panel panel-<?php echo $style;?>" style='transition: opacity 0.5s ease <?php echo $i*0.15;?>s'>
			<div class="panel-heading">
			  <h4 class="panel-title text-right">
				<a data-toggle="collapse" data-parent="#accordion" href="#maintenance<?php echo $i?>" class='pull-left'>
				  <i class="fa fa-caret-square-o-down"></i> <?php echo $this->maintenances[$i]['issue'] ?>
				</a>
				<a href='' class='asd'> <i class="fa fa-save"></i> Save</a> 
				<a href='' class='editcontent'> <i class="fa fa-pencil-square-o"></i> Edit</a> 
				<?php if($style='info'){ ?>
				 | <a href='#' data-toggle="collapse"> <i class="fa fa-trash-o"></i> Trash</a>
				<?php } ?>
			  </h4>
			</div>
			<div id="maintenance<?php echo $i?>" class="panel-collapse collapse in">
				<div class="panel-body table-responsive">
					Date reported: <?php echo $this->maintenances[$i]['datetime'] ?><br/>
					Time reported: <?php echo $this->maintenances[$i]['datetime'] ?><br/>
					Status: <?php echo $this->maintenances[$i]['status'] ?><br/>
					Date completed: <?php echo $this->maintenances[$i]['status'] ?><br/>
					Description: <?php echo $this->maintenances[$i]['description'] ?><br/>
					Location: <?php echo $this->maintenances[$i]['location'] ?><br/>
				</div>
			</div>
		</div>
		<?php } ?>
    </div>
	<div class='col-sm-6 col-md-4'>

    </div>
</div>