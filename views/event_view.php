<style>
.maincontent .panel-info {
	/* border: none; */
}
.maincontent .panel {
	opacity:0.05;
	box-shadow:none;
	padding:0;
	margin-bottom:20px;
	border-bottom:1px solid #bce8f1;
	border-radius:0;
}
</style>
<div class='row maincontent'>
	<header>
		<?php echo $this->activitytype ?>
	</header>
	<div class='col-sm-6 col-md-8'>
		<?php for($i = 0; $i < sizeof($this->activities); $i++){ ?>
		<div class="panel panel-info" style='transition: opacity 0.5s ease <?php echo $i*0.15;?>s'>
			<div class="panel-heading">
			  <h4 class="panel-title text-right">
				<a data-toggle="collapse" data-parent="#accordion" href="#event<?php echo $i?>" class='pull-left'>
				  <i class="fa fa-caret-square-o-down"></i> <?php echo $this->activities[$i]['name'] ?>
				</a>
				<a href='#editevent<?php echo $i?>' data-toggle="collapse" class='editevent'> <i class="fa fa-pencil-square-o"></i> Edit</a> | 
				<a href='#' data-toggle="collapse"> <i class="fa fa-trash-o"></i> Trash</a>
			  </h4>
			</div>
			<div id="event<?php echo $i?>" class="panel-collapse collapse in">
				<div class="panel-body table-responsive">
					<div class='row'>
					<div class='col-sm-12'>
						Venue: <span class='inline_edit'><?php echo $this->activities[$i]['venue']?></span>
						<input value='<?php echo $this->activities[$i]['venue']?>' class='inline_edit form-control' style='display:none' />
					</div>
					</div>
					<div class='row'>
					<div class='col-sm-4'>
						Date: <span class='inline_edit'><?php echo date('Y-m-d',strtotime($this->activities[$i]['starttime']));?></span>
						<input type='date' value='<?php echo date('Y-m-d',strtotime($this->activities[$i]['starttime']));?>' style='display:none' class='inline_edit form-control col-sm-3'/>
					</div>
					</div>
					<div class='row'>
					<div class='col-sm-4'>
						Time: <span class='inline_edit'><?php echo date('h:ia',strtotime($this->activities[$i]['starttime']));?></span>
						<input type='time' value='<?php echo date('h:i:s',strtotime($this->activities[$i]['starttime']));?>' style='display:none' class='inline_edit form-control'/>
					</div>
					</div>
					<div class='row'>
					<div class='col-sm-12'>
						Description: <span class='inline_edit'><?php echo $this->activities[$i]['description']?></span>
						<textarea rows='4' style='display:none' class='inline_edit form-control'><?php echo $this->activities[$i]['description']?></textarea>
						<br/>
						<br/>
						<a class='btn btn-primary' href='../merit/event/<?php echo $this->activities[$i]['id']?>/in'>
							<i class="fa fa-level-down"></i> Event sign in mode
						</a>
						<a class='btn btn-primary' href='../merit/event/<?php echo $this->activities[$i]['id']?>/out'>
							<i class="fa fa-level-up"></i> Event sign out mode
						</a>
					
						<h2>Participant (<?php echo sizeof($this->activities[$i]['participant'])?>)</h2>
						<a href='#memberadd<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-plus-circle"></i> Add participant</a> | 
						<a href='#memberupload<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-upload"></i> Upload</a> | 
						
						<a href='<?php echo URL?>merit/download/activity/<?php echo $this->activities[$i]['id']?>' class='<?php if(sizeof($this->activities[$i]['participant']) <= 0) echo 'link-disabled'?>'> <i class="fa fa-download "></i> Download</a> | 
						<a href='#memberclear<?php echo $i?>' data-toggle="collapse"> <i class="fa fa-times-circle"></i> Remove All participant</a>
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
							  <input type='hidden' value='<?php echo $this->activities[$i]['id']?>' name='id' />
							  <input type='hidden' value='13' name='merittypeid' />
							  <button type="submit" class="btn btn-primary">Add participant</button>
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
									<b>Are you sure to delete all participant?</b><br>
									<input type='hidden' name='activityoreventid' value='<?php echo $this->activities[$i]['id']?>'/>
									<input type='submit' class='deleteallparticipantsbtn btn btn-danger' value='Confirm Delete'/>
								</div>
							</form>
						</div>
						<table class="table table-bordered table-hover tablesorter">
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
								<tr><td>No data found.</td><td></td><td></td><td></td></tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
	<!--	<div id="editevent<?php echo $i?>" class="panel-collapse collapse">
				<div class="panel-body table-responsive">
					Venue: <input value='<?php echo $this->events[$i]['venue']?>'/>
					<br>Date: <input type='date' value='<?php echo date('Y-m-d',strtotime($this->events[$i]['starttime']));?>'/>
					<br>Time: <input type='time' value='<?php echo date('h:i:s',strtotime($this->events[$i]['starttime']));?>'/>
					<br><textarea><?php echo $this->events[$i]['description']?></textarea>
					<br><input type='submit' value='Edit'/>
				</div>
			</div>-->
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
	$("link-disabled").click(function(e){
		e.preventDefault();
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
	$(".responsive-calendar").responsiveCalendar({
	  time: '2014-05',
	  events: {
		"2014-04-30": {},
		"2014-04-26": {}, 
		"2014-05-03": {}, 
		"2014-06-12": {}}
	});
	$('.panel').css('opacity','1');
	$('.editevent').click(function(){
		$panel = $(this).parent().parent().parent();
		$panel.find('span.inline_edit').hide();
		$panel.find('input.inline_edit').show();
		$panel.find('textarea.inline_edit').show();
	});
});
</script>
<script>
$.extend($.tablesorter.themes.bootstrap, {
    // these classes are added to the table. To see other table classes available,
    // look here: http://twitter.github.com/bootstrap/base-css.html#tables
    table      : 'table table-bordered',
    caption    : 'caption',
    header     : 'bootstrap-header', // give the header a gradient background
    footerRow  : '',
    footerCells: '',
    icons      : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
    sortNone   : 'bootstrap-icon-unsorted',
    sortAsc    : 'icon-chevron-up glyphicon glyphicon-chevron-up',     // includes classes for Bootstrap v2 & v3
    sortDesc   : 'icon-chevron-down glyphicon glyphicon-chevron-down', // includes classes for Bootstrap v2 & v3
    active     : '', // applied when column is sorted
    hover      : '', // use custom css here - bootstrap class may not override it
    filterRow  : '', // filter row class
    even       : '', // odd row zebra striping
    odd        : ''  // even row zebra striping
});

$('.table').tablesorter({
	theme : "bootstrap",
    widthFixed: true,
    headerTemplate : '{content} {icon}',
    widgets : [ "uitheme", "zebra" ],
    widgetOptions : {
      zebra : ["even", "odd"],
	  filter_cssFilter     : 'form-control'
    }
});

</script>