<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<link rel="stylesheet" href="<?= base_url('/vendor/font-awesome/css/font-awesome.min.css'); ?>">

	<!-- Core CSS -->
	<link rel="stylesheet" href="<?= base_url('/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('/vendor/style.css'); ?>">

</head>

<body class="bg-gray-200">

	<main class="container mt-4">

		<!-- message -->
		<div class="notif" data-pesan="<?= $this->session->flashdata('pesan'); ?>" data-alert="<?= $this->session->flashdata('alert'); ?>"></div>