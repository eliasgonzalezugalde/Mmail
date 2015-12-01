<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mmail</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div id="container">
		<div class="row login card" id="login">
			<form action='<?php echo base_url();?>login' method='post' name='process'>
				<img src="<?php echo base_url(); ?>assets/images/logo.png">
				<input placeholder='user' type='text' name='username' id='username' size='25' /><br/>
				<input placeholder='password' type='password' name='password' id='password' size='25' /><br/>
				<button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action">Submit</button>
				<a class="register_btn btn waves-effect waves-light cyan darken-3" id="btn_login" >register</a>
			</form>
		</div>
		<div class="row login card" id="register">
			<form action='<?php echo base_url();?>register' method='post' name='process'>
				<input placeholder='user' type='text' name='username_register' id='username_register' size='25' /><br/>
				<input placeholder='password' type='password' name='password_register' id='password_register' size='25' /><br/>
				<input placeholder='confirm password' type='password' name='password_register_2' id='password_register_2' size='25' /><br/>
				<input placeholder='alternative address' type='email' class="validate" name='address_register' id='address_register' size='25' /><br />
				<button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action" id="btn_register">Registrer</button>
				<a class="register_btn btn waves-effect waves-light cyan darken-3" id="back_login">Back</a>
			</form>
		</div>
		<div class="cover"></div>
	</div>
	
	<footer>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js" ></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js" ></script>
	</footer>

</body>
</html>