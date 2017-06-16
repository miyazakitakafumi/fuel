<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FuelPHP Framework</title>
	<?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php echo $name; ?>
			</div>
			<div class="col-md-4">
				<?php echo $memo; ?>
			</div>
			<div class="col-md-4">
				<?php  print_r($session); ?>
			</div>
		</div>
	</div>
</body>
</html>
