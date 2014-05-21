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
		Merit Mark
	</header>
	
	<div class="col-sm-12 col-md-12">
		<div class=''>
		<ul class="nav nav-tabs">
		  <li class='active'><a href="#rankingtab" data-toggle="tab">Ranking</a></li>
		  <li><a href="#addmerittab" data-toggle="tab">Add merit</a></li>
		</ul>
		</div>
	</div>
	
	<div class="col-sm-10 col-md-10">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="rankingtab"> 
			<?php if($this->merits){ ?>
			<div class='tabpane-control'>
				<a href='<?php echo URL ?>merit/download' class='btn btn-primary btn-sm'><i class="fa fa-download"></i> Download</a>
			</div>
			<?php }?>
			<table class="table table-bordered table-hover meritlisttable tablesorter">
				<thead>
					<tr>
						<th>Rank</th>
						<th>Name</th>
						<th>Matric no.</th>
						<th>Total Merit</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="4" class="ts-pager form-horizontal pager">
							<button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
							<button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
							<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
							<button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
							<button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
							<select class="pagesize input-mini" title="Select page size">
								<option selected="selected" value="30">30</option>
								<option value="60">60</option>
								<option value="90">90</option>
								<option value="120">120</option>
							</select>
							<select class="gotoPage input-mini" title="Select page number"></select>
						</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if($this->merits){ $i = 1?>
					<?php foreach($this->merits as $m){ ?>
					<tr data-toggle="modal" data-target="#meritdetailsmodal" onclick='getMerit(this)'>
						<td><?php echo $i++ ?></td>
						<td><?php echo $m['name'] ?></td>
						<td><?php echo $m['student_matric'] ?></td>
						<td><?php echo $m['total'] ?></td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan='3'>No result</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="addmerittab"> 
			<form id='contactform' action='#' method='POST' class="form-horizontal">
				<fieldset>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Student matric:</label>
						<div class='col-sm-3 col-md-3'>
							<input required type='text' value='' name='matric' id='inputemail' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Activity:</label>
						<div class='col-sm-3 col-md-3'>
							<select class='form-control'>
								<option value='mproject'>Project 1</option>
								<option value='nproject'>Project 2</option>
								<option value='mproject'>Sukmum 1</option>
								<option value='nproject'>Sukmum 2</option>
								<option value='mproject'>Feseni 1</option>
								<option value='nproject'>Feseni 2</option>
								<option value='mproject'>Event 1</option>
								<option value='nproject'>Event 2</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-md-3 control-label' for='inputemail'>Involvement Type:</label>
						<div class='col-sm-3 col-md-3'>
							<select class='form-control'>
								<option value='mproject'>Attendance</option>
								<option value='nproject'>Project Director</option>
								<option value='nproject'>Vice Director</option>
								<option value='nproject'>Secretory</option>
								<option value='nproject'>High committee</option>
								<option value='nproject'>Member</option>
								<option value='nproject'>Feseni</option>
								<option value='nproject'>Sukmum</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-3'>
							<input type='hidden' value='newproject' name='action' />
							<input type='submit' class='btn btn-primary' value='Add'/>
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

</script>
<?php $this->modalformPath[] = 'meirtdetails_modal'; ?>