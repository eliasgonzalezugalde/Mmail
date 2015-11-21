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
					<h5 class="user"><?php echo $query[0]->email; ?></h5><div id="m"><img src="<?php echo base_url(); ?>assets/images/m.png"></div>
				</header>
				<div class="row row_mail">
					<div class="mails col s3">
						<?php 
						for ($i=0; $i < count($correos); $i++) {
							echo "<a class='btn_mail' id='" . $correos[$i]->id . "'>" . $correos[$i]->asunto . "</a>" . "</br>";
						}
						?>
						
					</div>

					<div id="mailInside" class="contents col s9">
						<!-- Teal page content  -->
					</div>
					<a href="<?php echo base_url();?>main/newEmail/<?php echo $query[0]->id; ?>" class="send btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
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