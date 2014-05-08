<style>
.maincontent .panel-info {
	border: none;
}
.maincontent .panel {
	opacity:0.05;
	box-shadow:none;
	padding:20px 0;
	border-bottom:1px solid #bce8f1;
	border-radius:0;
}
</style>
<div class='row maincontent'>
	<header>
		Event
	</header>
	<div class='col-sm-6 col-md-8'>
		<?php for($i = 0; $i < sizeof($this->events); $i++){ ?>
		<div class="panel panel-info" style='transition: opacity 0.5s ease <?php echo $i*0.15;?>s'>
			<div class="panel-heading">
			  <h4 class="panel-title text-right">
				<a data-toggle="collapse" data-parent="#accordion" href="#event<?php echo $i?>" class='pull-left'>
				  <i class="fa fa-caret-square-o-down"></i> <?php echo $this->events[$i]['name'] ?>
				</a>
				<a href='#editevent<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-gear"></i> Edit</a> | 
				<a href='#'> <i class="fa fa-trash-o"></i> Trash</a>
			  </h4>
			</div>
			<div id="event<?php echo $i?>" class="panel-collapse collapse in">
				<div class="panel-body table-responsive">
					Venue: <?php echo $this->events[$i]['venue']?>
					<br>Date: <?php echo date('Y-m-d',strtotime($this->events[$i]['starttime']));?>
					<br>Time: <?php echo date('h:ia',strtotime($this->events[$i]['starttime']));?>
					<br><?php echo $this->events[$i]['description']?>
					<br>
					<a class='btn btn-primary' href='../merit/event/<?php echo $this->events[$i]['id']?>/in'>
						<i class="fa fa-level-down"></i> Event sign in mode
					</a>
					<a class='btn btn-primary' href='../merit/event/<?php echo $this->events[$i]['id']?>/out'>
						<i class="fa fa-level-up"></i> Event sign out mode
					</a>
					<br>
					<br>
					<a class='' href='#'>
						<i class="fa fa-search"></i> View participant
					</a> | 
					<a class='' href='#'>
						<i class="fa fa-plus"></i> Add participant
					</a> | 
					<a class='' href='#'>
						<i class="fa fa-upload"></i> Upload 
					</a> | 
					<a class='' href='#'>
						<i class="fa fa-download"></i> Download 
					</a> | 
					<a class='' href='#'>
						<i class="fa fa-times-circle"></i> Remove all  
					</a>
				</div>
			</div>
			<div id="editevent<?php echo $i?>" class="panel-collapse collapse">
				<div class="panel-body table-responsive">
					Venue: <input value='<?php echo $this->events[$i]['venue']?>'/>
					<br>Date: <input type='date' value='<?php echo date('Y-m-d',strtotime($this->events[$i]['starttime']));?>'/>
					<br>Time: <input type='time' value='<?php echo date('h:i:s',strtotime($this->events[$i]['starttime']));?>'/>
					<br><textarea><?php echo $this->events[$i]['description']?></textarea>
					<br><input type='submit' value='Edit'/>
				</div>
			</div>
		</div>
		<?php } ?>
    </div>
	<div class='col-sm-6 col-md-4'>
		<!-- Responsive calendar - START -->
    	<div class="responsive-calendar">
        <div class="controls pager">
		  <li class="previous" data-go="prev"><a href="#"><i class="fa fa-arrow-circle-left"></i> Prev</a></li>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
		  <li class="next" data-go="next"><a href="#">Next <i class="fa fa-arrow-circle-right"></i></a></li>
        </div><hr/>
        <div class="day-headers">
          <div class="day header">Mon</div>
          <div class="day header">Tue</div>
          <div class="day header">Wed</div>
          <div class="day header">Thu</div>
          <div class="day header">Fri</div>
          <div class="day header">Sat</div>
          <div class="day header">Sun</div>
        </div>
        <div class="days" data-group="days">
          
        </div>
      </div>
    </div>
      <!-- Responsive calendar - END -->
</div>
<script type="text/javascript">
  $(document).ready(function () {
	$(".responsive-calendar").responsiveCalendar({
	  time: '2014-05',
	  events: {
		"2014-04-30": {},
		"2014-04-26": {}, 
		"2014-05-03": {}, 
		"2014-06-12": {}}
	});
	$('.panel').css('opacity','1');
  });
</script>