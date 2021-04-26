<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Apotek Arjasa 2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url('images/icons/favicon.ico') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/animate/animate.css') ?>" rel="stylesheet">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url ('assets/css-hamburgers/hamburgers.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/animsition/css/animsition.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/select2/select2.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url ('assets/daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('css/util.css') ?>" rel="stylesheet">
	<link href= "<?php echo base_url ('css/main.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="<?php echo site_url('index.php/login/proses_lupa_sandi/'); ?>" method="POST" class="login100-form validate-form">
				<div align="center">
				<img src="<?php echo base_url('assets/logo.png')?>" width="100px;">
					
				</div>
				<br>
				<br>
					
					<?php if($this->session->flashdata('pesan')) { ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('pesan'); ?>
						</div>
						<br>
					<?php } ?>

					<span class="login100-form-title p-b-33">
						Isikan Username
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<br>
					<br>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn">
							Kirim
						</button>
						
					</div>
						<div class="text-center"><a href="<?php echo base_url('index.php/login/login/') ?>">Kembali ke Login</a></div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/jquery/jquery-3.2.1.min.js') ?>" </script>

	<script src="<?php echo base_url ('assets/animsition/js/animsition.min.js') ?>" </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/bootstrap/js/popper.js') ?>"</script>
	<script src="<?php echo base_url ('assets/bootstrap/js/bootstrap.min.js') ?>" </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/select2/select2.min.js') ?>" </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/daterangepicker/moment.min.js') ?>" </script>
	<script src="<?php echo base_url ('assets/daterangepicker/daterangepicker.js') ?>" </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/countdowntime/countdowntime.js') ?>" </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('js/main.js') ?>" </script>

</body>
</html>