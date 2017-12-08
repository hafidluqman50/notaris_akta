<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak Surat</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.css') ?>">
	<style>
		@page{
			size:A3 landscape;
		}
	</style>
</head>
<body>
	<?= $format_surat; ?>
</body>
</html>