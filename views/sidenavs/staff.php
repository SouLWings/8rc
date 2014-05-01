<div class="col-sm-3 col-md-2 ">
	<nav>
	  <div class="panel">
		<div class="panel-heading">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
			  General
			</a>
		  </h4>
		</div>
		<div id="collapse1" class="panel-collapse collapse in">
		  <div class="panel-body">
			<ul class="nav">
				<li class="active"><a href="#">News</a></li>
				<li><a href="#">Calender</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	  <div class="panel">
		<div class="panel-heading">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
			  Management
			</a>
		  </h4>
		</div>
		<div id="collapse2" class="panel-collapse collapse in">
		  <div class="panel-body">
			<ul class="nav nav-sidebar">
				<li><a href="">Student</a></li><!-- gender, fac, race, year with option of academic session -->
				<li><a href="">News Approval</a></li>
				<li><a href="">Room</a></li>
				<li><a href="">College Activities</a></li>
				<li><a href="">Merit</a></li>
				<li><a href="#">Maintenance</a></li>
				<li><a href="#">Food Order</a></li>
				<li><a href="">Orientation Week</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	  <div class="panel">
		<div class="panel-heading">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
			  Administration
			</a>
		  </h4>
		</div>
		<div id="collapse3" class="panel-collapse collapse in">
		  <div class="panel-body">
			<ul class="nav">
				<li><a href="">Accounts</a></li>
				<li><a href="">Setting</a></li><!-- academic session, (theme color),  -->
			</ul>
		  </div>
		</div>
	  </div>
	</nav>
</div>
<style>
nav{
	background:#376fa7;
	padding:15px;
	height:100vh;
}
nav ul{
	background:white;
	border-radius:3px;
	
}
.nav>li>a{
	transition: background 200ms, padding-left 450ms, color 300ms;
}
nav .nav>li>a:hover, nav .nav>li>a:focus{
	color:white;
	background:#60d0ff;
	padding-left:25px;
}

nav ul.nav a{
	padding: 5px 15px;
}

nav li.active{
	background: #52c2f1;
}

nav li.active a{
	color:white;
}
nav header{
	font-size:1.5em;
	color: white;
	padding:10px;
}

nav .panel-heading a{
	display:block;
}

.panel{
	border:none;
}

.panel-body{
	padding:0;
}
</style>