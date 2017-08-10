<?php
html5_doctype ();
og_html_prefix ();
?>
<head>
<title><?php Template::escape(check_status());?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="core.min.css" />
<style type="text/css">
body {
	text-align: center;
	background-color: black;
}
</style>
</head>

<body>
	<img src="<?php Template::escape(ViewBag::get("http_status_image"));?>"
		alt="<?php echo check_status()?>">
	<?php Template::footer();?>
	</body>
</html>