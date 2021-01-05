<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=(isset($title)?'POS | '.$title:'POS')?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="<?=base_url(); ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url(); ?>public/css/sb-admin-2.css" rel="stylesheet">
	<?php if (isset($styles)): ?>
		<?php foreach ($styles as $style): ?>
			<link href="<?=base_url()?>public/<?=$style?>" rel="stylesheet">
		<?php endforeach; ?>
	<?php endif ?>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
