<?php require_once $dir_public.'requires/header.php';?>
<!-- the middle contents -->
<div class="container">
	<article class="row">
		<nav><ol class="breadcrumb">
				<li><a href="home">Home</a></li>
				<li class="active">Resume Creator | Resume for Internship</li>
		</ol></nav>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6"><i class="fa fa-files-o fa-5x"></i></div>
							<div class="col-xs-6 text-right">
								<p class="announcement-heading huge"><?php echo number_format(7*$total_resumes);?></p>
								<p class="announcement-text">Total Resumes</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6"><i class="fa fa-file-text-o fa-5x"></i></div>
							<div class="col-xs-6 text-right">
								<p class="announcement-heading huge"><?php echo number_format(5*count($today_resume));?></p>
								<p class="announcement-text">Resumes Today</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6"><i class="fa fa-users fa-5x"></i></div>
						<div class="col-xs-6 text-right">
							<p class="announcement-heading huge"><?php echo number_format($total_users);?></p>
							<p class="announcement-text">Total Users</p>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>

		<hr>
		<div class="row text-center">
			<a href="<?php if ($session->is_logged_in()) {echo 'resume/success';} else {echo 'resume/create';}?>" class="btn btn-success btn-lg">Build My Resume <i class="fa fa-arrow-circle-right fa-fw"></i></a>
		</div>
		<hr>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-9">
						<h3 class="sub-heading">Building Your Resume</h3>
						<p>Swiftintern.com is a great place to build and post your resume online for free. It’s easy to sign up, free to use, and you can access your resume from anywhere once you have posted it. Use our free resume builder to create the perfect resume online in minutes. Have you asked yourself how do I post my resume free? We thought so. That’s why we created a system for you to post your resume online that is simple and easy.</p>
						<p></p>
					</div>
					<div class="col-md-3">
						<img src="<?php echo $cdn.'img/resume/resume2.gif' ?>" alt="<?php echo $title;?>" class="thumbnail" width=200>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-9">
						<h3 class="sub-heading">Edit Your Resume</h3>
						<p>Login any time to edit and update your online resume. Preview, print, and email your resume, cover letter, and references. Download your resume as a Microsoft Word document or email it directly to your job interview. </p>
						<p></p>
					</div>
					<div class="col-md-3">
						<img src="<?php echo $cdn.'img/resume/buildresume.png' ?>" alt="<?php echo $title;?>" class="thumbnail" width=200>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-9">
						<h3 class="sub-heading">Create beautiful, professional resumes in minutes, free</h3>
						<p>using our resume builder and when you’re ready to share it, we’ll guide you through sharing and promoting your resume online using social networks and professional networks. If you don’t want to post your resume right away, you can also download a plain text version for free and save it for later. </p>
						<p></p>
					</div>
					<div class="col-md-3">
						<img src="<?php echo $cdn.'img/resume/resumeonline.png' ?>" alt="<?php echo $title;?>" class="thumbnail" width=200>
					</div>
				</div>
			</div>
		</div>

		<hr>
		<div class="row text-center">
			<a href="resume/create" class="btn btn-success btn-lg">Build My Resume <i class="fa fa-arrow-circle-right fa-fw"></i></a>
		</div>
		<hr>
	</article>
</div>
<?php require_once $dir_public.'requires/footer.php';?>