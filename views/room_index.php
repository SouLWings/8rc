<style>
.chartcontainer
{
	border-radius:15px;
	height:400px;
	border:1px solid #aaccff;
	padding:10px;
	margin:10px 0;
}

</style>
<div class='row maincontent'>
	<header>
		Rooms
	</header>
	
	<div class="col-sm-12 col-md-12">
		<div class=''>
		<ul class="nav nav-tabs">
		  <li class='active'><a href="#statistictab" data-toggle="tab">Overview</a></li>
		  <li><a href="#addstudenttab" data-toggle="tab">Check in/out</a></li>
		  <li><a href="#registrationtab" data-toggle="tab">Add room allocation</a></li>
		</ul>
		</div>
	</div>
	
	<div class="col-sm-10 col-md-10">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="overviewtab"> 
			<?php foreach($this->floos as $f){?>
			
			<div class="col-sm-12 chartcontainer">
				<section>
					<h2><?php echo $f ?></h2>
					<div>
						<?php foreach($this->rooms as $r){ ?>
						
						<?php } ?>
					</div>
				</section>
			</div>
			<?php } ?>
		</div>
		
		<div class="tab-pane fade" id="checkinouttab"> 
			
		</div>
		
		<div class="tab-pane fade" id="registrationtab"> 
			<a class='btn btn-lg btn-danger' href='orientation/registration'>Sign out and proceed to registration page</a>
		</div>
    </div>
    </div>
</div>

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