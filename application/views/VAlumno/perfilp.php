<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!--==============================================================
	=            Cargar el estilo y funciones del grocery            =
	===============================================================-->
	<?php foreach ($css_files as $file): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $file; ?>">
	<?php endforeach ?>
	<?php foreach ($js_files as $file): ?>
		<script src="<?php echo $file;?>"></script>
	<?php endforeach ?>
	<script>
		$(function() {
			$(".footer-tools").css({
				"visibility":"hidden",
				"display":"none"
			});
			$(".header-tools").css({
				"visibility":"hidden",
				"display":"none"
			});
			$(".filter-row.gc-search-row").css({
				"visibility":"hidden",
				"display":"none"
			});
			

		});
	</script>
</head>
<body>
	<div class="container-fluid">
		<?php echo $output; ?>
	</div>

</body>
</html>