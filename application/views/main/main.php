<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>tmail dashboard</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="dash">
	<div id="container main">
		<div id="main">
			<section class="mail z-depth-1">
				<header>
					<h5 class="user"><?php echo $this->session->userdata('name'); ?><span class="hide-on-small-only">@mmail.com</span></h5><div id="m"><img src="<?php echo base_url(); ?>assets/images/m.png"></div>
				</header>
				<div class="row row_mail">
					<div class="mails col s3">
						<ul class="tabs">
							<li class="tab col s3"><a class="active" href="#test1">pending</a></li>
							<li class="tab col s3"><a  href="#test2">sent</a></li>
						</ul>
						<div id="test1" class="col s12">
							<?php 
							for ($i=0; $i < count($correos); $i++) {
								if ($correos[$i]->enviado == false) {
									echo "<a class='btn_mail truncate' id='" . $correos[$i]->id . "'>" . $correos[$i]->asunto . "</a>" . "</br>";
								}
							}
							?>
						</div>
						<div id="test2" class="col s12">
							<?php 
							for ($i=0; $i < count($correos); $i++) {
								if ($correos[$i]->enviado == true) {
									echo "<a class='btn_mail truncate' id='" . $correos[$i]->id . "'>" . $correos[$i]->asunto . "</a>" . "</br>";
								}
							}
							?>
						</div>
						
					</div>
					<div class="options col s9"><div class="logout"><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons">settings</i></a></div></div>

					<!-- Dropdown Structure -->
					<ul id='dropdown1' class='dropdown-content'>
						<li><a href="<?php echo base_url();?>main/logout/">Logout</a></li>
					</ul>

					<div class="contents col s9">
						<div id="des"></div>
						<div id="cont">
						</div>
						<!-- Teal page content  -->
					</div>
					<a href="<?php echo base_url();?>main/newEmail/" class="send btn-floating btn-large waves-effect waves-light"><i class="material-icons">create</i><!--i class="material-icons">add</i--></a>
				</div>
			</section>
		</div>
	</div>
	<div id="color"></div>
	
	<footer>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js" ></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js" ></script>
	</footer>

</body>
</html>