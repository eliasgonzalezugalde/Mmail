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
					<div id="m"><img src="<?php echo base_url(); ?>assets/images/m.png"></div>
				</header>
				<div class="row row_mail">
					<div class="new contents col s12">
						<form action='<?php echo base_url();?>main/sendEmail/' method='post' name='process'>
							<h4>New Email</h4>
							<input value="<?php echo $query[0]->email; ?>" type='text' readonly="readonly" name='sender' id='sender' size='25' /><br />
							<input placeholder='address' type='email' class="validate" name='address' id='address' size='25' /><br />
							<input placeholder='subject' type='text' name='subject' id='subject' size='25' /><br />
							<textarea placeholder='content' id="content" name="content" class="materialize-textarea" id="content"></textarea><br />
							<button class="send btn-floating btn-large waves-effect waves-light" type="submit" name="action" id="btn_send"><i class="material-icons">send</i>/button>
						</form>
					</div>
					<a href="" class="create btn-floating btn-large waves-effect waves-light"><i class="material-icons">create</i></a>
				</div>
			</section>
		</div>
	</div>
	<div id="color"></div>
	
	<footer>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js" ></script>
		<!--cript type="text/javascript" href="<?php //echo base_url(); ?>assets/js/functions.js" ></script-->
	</footer>

</body>
</html>