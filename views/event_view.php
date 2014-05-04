<div class='row maincontent'>
	<header>
		Event
	</header>
	<div class='col-sm-6 col-md-8'>
		<?php for($i = 0; $i < sizeof($this->events); $i++){ ?>
		<div class="panel panel-info" style='transition: opacity 0.5s ease <?php echo $i*0.03;?>s'>
			<div class="panel-heading">
			  <h4 class="panel-title text-right">
				<a data-toggle="collapse" data-parent="#accordion" href="#event<?php echo $i?>" class='pull-left'>
				  <i class="fa fa-caret-square-o-down"></i> <?php echo $this->events[$i]['name'] ?>
				</a>
				<a href='#editevent<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-gear"></i> Edit</a> | 
				<a href='#'> <i class="fa fa-trash-o"></i> Trash</a>
			  </h4>
			</div>
			<div id="event<?php echo $i?>" class="panel-collapse collapse">
				<div class="panel-body table-responsive">
					Venue: <?php echo $this->events[$i]['venue']?>
					<br>Time: <?php echo date('Y-m-d h:ia',strtotime($this->events[$i]['starttime']));?>
					<br><?php echo $this->events[$i]['description']?>
					<br><a class='btn btn-primary' href='../merit/event/<?php echo $this->events[$i]['id']?>/in'>Event sign in mode</a>
					<a class='btn btn-primary'>Event sign out mode</a>
				</div>
			</div>
			<div id="editevent<?php echo $i?>" class="panel-collapse collapse">
				<div class="panel-body table-responsive">
					Venue: <input value='<?php echo $this->events[$i]['venue']?>'/>
					<br>Time: <input value='<?php echo date('Y-m-d h:ia',strtotime($this->events[$i]['starttime']));?>'/>
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
	$('.post').css('opacity','1');
  });
</script>