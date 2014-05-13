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
	
	<div class="col-sm-12 col-md-12">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="rankingtab"> 
			<div class='tabpane-control'>
				<a href='<?php echo URL ?>merit/download' class='btn btn-primary btn-sm'><i class="fa fa-download"></i> Download</a>
			</div>
			<table class="table table-bordered table-hover ">
				<thead>
					<tr>
						<th>Name</th>
						<th>Matric no.</th>
						<th>Merit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->merits as $m){ ?>
					<tr>
						<td><?php echo $m['name'] ?></td>
						<td><?php echo $m['student_matric'] ?></td>
						<td><?php echo $m['total'] ?></td>
					</tr>
					<?php } ?>
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