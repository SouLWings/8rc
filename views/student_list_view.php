<style>
.funcpanel{
	padding:20px;
	color:white;
	font-size:1.2em;
	font-weight:bold;
	background:#30d2cc;
	text-align:center;
}

.tabpane-control{
	margin:10px;
	float:right;
}

.table > thead > tr > th{
	background:#def;
}
.meritlisttable tr{
	cursor:pointer;
}
</style>
<div class='row maincontent'>
	<header>
		Students
	</header>
	
	<div class="col-sm-12 col-md-12">
		<div class=''>
		<ul class="nav nav-tabs">
		  <li class='active'><a href="#viewtab" data-toggle="tab">View</a></li>
		  <li><a href="#addstudenttab" data-toggle="tab">Add student</a></li>
		</ul>
		</div>
	</div>
	
	<div class="col-sm-10 col-md-10">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="viewtab"> 
			<?php if($this->student){ ?>
			<div class='tabpane-control'>
				<a href='<?php echo URL ?>merit/download' class='btn btn-primary btn-sm'><i class="fa fa-download"></i> Download</a>
			</div>
			<?php }?>
			<table class="table table-bordered table-hover table-condensed meritlisttable tablesorter" style='clear:right;'>
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Matric no.</th>
						<th>Session</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="5" class="ts-pager form-horizontal pager">
							<button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
							<button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
							<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
							<button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
							<button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
							<select class="pagesize input-mini" title="Select page size">
								<option selected="selected" value="10">10</option>
								<option value="30">30</option>
								<option value="100">100</option>
								<option value="300">300</option>
								<option value="1000">1000</option>
							</select>
							<select class="gotoPage input-mini" title="Select page number"></select>
						</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if($this->student){ $i = 1?>
					<?php foreach($this->student as $m){ ?>
					<tr data-toggle="modal" data-target="#meritdetailsmodal" onclick='getMerit(this)'>
						<td><?php echo $i++ ?></td>
						<td><?php echo $m['name'] ?></td>
						<td><?php echo $m['matric'] ?></td>
						<td><?php echo $m['session'] ?></td>
						<td><a href="#">Edit</a> <a href="#">Delete</a></td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan='3'>No result</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="addstudenttab"> 
			<form id='contactform' action='orientation/add' method='POST' class="form-horizontal form-ajax">
				<fieldset>
					<legend>Create a new entry</legend>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Name:</label>
						<div class='col-sm-6 col-md-6'>
							<input required type='text' value='' name='name' id='name' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Matric:</label>
						<div class='col-sm-3 col-md-3'>
							<input required type='text' value='' name='matric' id='matric' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>IC number:</label>
						<div class='col-sm-3 col-md-3'>
							<input required type='text' value='' name='ic' id='ic' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Race:</label>
						<div class='col-sm-2 col-md-2'>
							<select class='form-control' name='race'>
								<option value='Malay'>Malay</option>
								<option value='Chinese'>Chinese</option>
								<option value='Indian'>Indian</option>
								<option value='Others'>Others</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Sel number:</label>
						<div class='col-sm-1 col-md-1'>
							<input required type='text' value='' name='sel' id='sel' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Room number:</label>
						<div class='col-sm-2 col-md-2'>
							<input required type='text' value='' name='room' id='room' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-3'>
							<input type='submit' class='btn btn-primary' value='Add'/>
						</div>
					</div>
				</fieldset>
			</form>
			<form id='uploadform' action='orientation/add' method='POST'  enctype="multipart/form-data" class="form-horizontal">
				<fieldset>
					<legend>Upload student entries</legend>
					<p class='text-danger'><b>*Make sure the csv file matches the required format</b></p>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-1'>
							<input type="file" name='csvfile' title="Upload a .csv file" class='btnupload' required>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-1'>
							<input type='submit' class='btn btn-primary' value='Confirm Upload'/>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
    </div>
</div>
<script>
function getMerit(tr){
	$.post('check/'+$(tr).find("td:nth-child(3)").text()
	,function(data,status){
		if(status == 'success')
		{
			if(data['status'] == 'success')
			{
				$('#meritdetailsmodal').find('tbody').html("");
				$('#meritdetailsmodal').find('h2 span').text($(tr).find("td:nth-child(3)").text())
				for(var i = 0; i < data['merit'].length; i++)
				{
					console.log(data['merit'][i]);
					$('#meritdetailsmodal').find('tbody').append("<tr><td>"+data['merit'][i]['date'].substr(0,10)+"</td><td>"+data['merit'][i]['activityname']+"</td><td>"+data['merit'][i]['position']+"</td><td>"+data['merit'][i]['mark']+"</td></tr>");
				}
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
}
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

$('.meritlisttable').tablesorter({
	theme : "bootstrap",
    widthFixed: true,
    headerTemplate : '{content} {icon}',
    widgets : [ "uitheme", "filter", "zebra" ],
    widgetOptions : {
      zebra : ["even", "odd"],
	  filter_cssFilter     : 'form-control'
    }
}).tablesorterPager({
    container: $(".pager"),
    output: '{startRow} to {endRow} ({totalRows})',
    size: 30
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
				$form.find('input[type="text"]').val('');
				alert('Insert successfully');
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
		$form.find('fieldset').prop('disabled','');
	},'json');
	return false;
});	
</script>