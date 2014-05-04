<style>
/* for post */
.post{
	background:rgba(124,205,255,0.1);
	padding:15px 0;
	border-radius: 10px;
	margin:10px 0;
	transition: opacity 0.5s;
	-webkit-backface-visibility: hidden;
	opacity:0.05;
}

.post:hover{
	background:rgba(124,205,255,0.3);
}

.post .form-group{
	margin-bottom:0;
}

.picframe{
	padding:3px;
	border-radius:3px;
	border: 1px solid #aaa;
	overflow: hidden;
	width:58px;
	height:58px;
	float:left;
	margin-right:20px;
	margin-bottom:10px;
}

.postpic{
	min-height:50px;
	min-width:50px;
	max-height:50px;
	max-width:50px;
}

.postaction{
	margin-top:10px;
}

.picframe2{
	padding:0;
	border-radius:3px;
	border: 1px solid #aaa;
	overflow: hidden;
	width:32px;
	height:32px;
	margin-left:20px;
}

.replypic{
	max-width:32px;
}
</style>
<div class='row maincontent'>
	<header>News</header>
	<div class="col-sm-12 col-md-8 ">
		<div class=''>
			<ul class="nav nav-tabs">
			  <li class='active'><a href="#home" data-toggle="tab"><i class="fa fa-bullhorn"></i> Announcement</a></li>
			  <li><a href="#profile" data-toggle="tab">Event</a></li>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane fade in active" id="home"> 
				<div class='row post' style='transition-delay: opacity 0.1s;'>
					<header class='col-md-2'>
						<div class='picframe'>
							<img class='postpic' src='<?php echo URL?>res/img/profilepic/3.jpg'/>
						</div>
					</header>
					<article class='col-md-9'>
					<div class='posttime pull-right'>
						<?php echo date("Y-m-d h:i:sa"); ?>
					</div>
					<div class='profilelink'>
						<a href='#'>Chew Sheen Yeen</a>
					</div>
						bla bla bla blabla bla bla blabla bla bla blabla bla bla blabla bla bla bla
					<div class='postaction'>
						<a href='#'><i class="fa fa-comments"></i> 5 Comments</a> | <a href='#'><i class="fa fa-mail-reply-all"></i> Reply</a>
					</div>
					<div class='replyform'>
						
						<form class='form-horizontal'>
								
							<div class="form-group">
								<div class="col-sm-1 picframe2"><img class='replypic' src='<?php echo URL?>res/img/profilepic/4.jpg'/></div>
								<div class="col-sm-10">
									<input type='text' class='form-control'/>
								</div>
							</div>
						</form>
					</div>
					</article>
				</div>
				<div class='post'style='transition-delay: 0.2s;'>
					<header>
						<div class='picframe'>
							<img class='postpic' src='<?php echo URL?>res/img/profilepic/3.jpg'/>
						</div>
						<div class='profilelink'>
							<a href='#'>Chew Sheen Yeen</a>
						</div>
						<div class='posttime'>
							<?php echo date("Y-m-d h:i:sa"); ?>
						</div>
					</header>
					<div style='clear:both'></div>
					<article>
						bla bla bla blabla bla bla blabla bla bla blabla bla bla blabla bla bla bla
					</article>
					<div class='postaction'>
						<a href='#'><i class="fa fa-comments"></i> 5 Comments</a> | <a href='#'><i class="fa fa-mail-reply-all"></i> Reply</a>
					</div>
					<div class='postaction'>
						
						<form class='form-horizontal'>
								
							<div class="form-group">
								<div class="col-sm-1 picframe2"><img class='replypic' src='<?php echo URL?>res/img/profilepic/4.jpg'/></div>
								<div class="col-sm-10">
									<input type='text' class='form-control'/>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class='post'style='transition-delay: 0.3s;'>
					<header>
						<div class='picframe'>
							<img class='postpic' src='<?php echo URL?>res/img/profilepic/3.jpg'/>
						</div>
						<div class='profilelink'>
							<a href='#'>Chew Sheen Yeen</a>
						</div>
						<div class='posttime'>
							<?php echo date("Y-m-d h:i:sa"); ?>
						</div>
					</header>
					<div style='clear:both'></div>
					<article>
						bla bla bla blabla bla bla blabla bla bla blabla bla bla blabla bla bla bla
					</article>
					<div class='postaction'>
						<a href='#'><i class="fa fa-comments"></i> 5 Comments</a> | <a href='#'><i class="fa fa-mail-reply-all"></i> Reply</a>
					</div>
					<div class='postaction'>
						
						<form class='form-horizontal'>
								
							<div class="form-group">
								<div class="col-sm-1 picframe2"><img class='replypic' src='<?php echo URL?>res/img/profilepic/4.jpg'/></div>
								<div class="col-sm-10">
									<input type='text' class='form-control'/>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class='post'style='transition-delay: 0.4s;'>
					<header>
						<div class='picframe'>
							<img class='postpic' src='<?php echo URL?>res/img/profilepic/3.jpg'/>
						</div>
						<div class='profilelink'>
							<a href='#'>Chew Sheen Yeen</a>
						</div>
						<div class='posttime'>
							<?php echo date("Y-m-d h:i:sa"); ?>
						</div>
					</header>
					<div style='clear:both'></div>
					<article>
						bla bla bla blabla bla bla blabla bla bla blabla bla bla blabla bla bla bla
					</article>
					<div class='postaction'>
						<a href='#'><i class="fa fa-comments"></i> 5 Comments</a> | <a href='#'><i class="fa fa-mail-reply-all"></i> Reply</a>
					</div>
					<div class='postaction'>
						
						<form class='form-horizontal'>
								
							<div class="form-group">
								<div class="col-sm-1 picframe2"><img class='replypic' src='<?php echo URL?>res/img/profilepic/4.jpg'/></div>
								<div class="col-sm-10">
									<input type='text' class='form-control'/>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class='post'style='transition-delay: 0.5s;'>
					<header>
						<div class='picframe'>
							<img class='postpic' src='<?php echo URL?>res/img/profilepic/3.jpg'/>
						</div>
						<div class='profilelink'>
							<a href='#'>Chew Sheen Yeen</a>
						</div>
						<div class='posttime'>
							<?php echo date("Y-m-d h:i:sa"); ?>
						</div>
					</header>
					<div style='clear:both'></div>
					<article>
						bla bla bla blabla bla bla blabla bla bla blabla bla bla blabla bla bla bla
					</article>
					<div class='postaction'>
						<a href='#'><i class="fa fa-comments"></i> 5 Comments</a> | <a href='#'><i class="fa fa-mail-reply-all"></i> Reply</a>
					</div>
					<div class='postaction'>
						
						<form class='form-horizontal'>
								
							<div class="form-group">
								<div class="col-sm-1 picframe2"><img class='replypic' src='<?php echo URL?>res/img/profilepic/4.jpg'/></div>
								<div class="col-sm-10">
									<input type='text' class='form-control'/>
								</div>
							</div>
						</form>
					</div>
				</div>
			  </div>
			  <div class="tab-pane fade" id="profile">..qweqw.</div>
			</div>
			
		</div>
	</div>
	<div class="col-sm-12 col-md-4 ">
		<div class=''>
      <!-- Responsive calendar - START -->
    	<div class="responsive-calendar">
        <div class="controls pager">
		  <li class="previous" data-go="prev"><a href="#">&larr; Prev</a></li>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
		  <li class="next" data-go="next"><a href="#">Next &rarr;</a></li>
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
      <!-- Responsive calendar - END -->
		</div>
	</div>
	
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