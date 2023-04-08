<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $page ?> - <?= APP_NAME ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="<?= ROOT ?>assets/img/favicon.png" rel="icon">
	<link href="<?= ROOT ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="<?= BASE ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= BASE ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= BASE ?>vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="<?= BASE ?>vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="<?= BASE ?>vendor/remixicon/remixicon.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="<?= ROOT ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">
		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?= ROOT ?>assets/img/logo.png" alt="">
				<span class="d-none d-lg-block">NiceAdmin</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->
		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">
				<li class="nav-item dropdown pe-3">
					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="<?= ROOT ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
					</a><!-- End Profile Iamge Icon -->
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6>Kevin Anderson</h6>
							<span>Web Designer</span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>
					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->
			</ul>
		</nav><!-- End Icons Navigation -->
	</header><!-- End Header -->
	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">
		<ul class="sidebar-nav" id="sidebar-nav">
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Dashboard") ? "" : "collapsed"; ?>" href="index.html">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->
			<li class="nav-item">
				<a class="nav-link <?= ($pagegroup != "Components") ? "collapsed" : ""; ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-menu-button-wide"></i>
					<span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="components-nav" class="nav-content collapse <?= ($pagegroup == "Components") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
					<li>
						<a href="components-alerts.html" class="<?=($page == "Alerts") ? "active" : ""; ?>">
							<i class="bi bi-circle"></i><span>Alerts</span>
						</a>
					</li>
					<li>
						<a href="components-accordion.html">
							<i class="bi bi-circle"></i><span>Accordion</span>
						</a>
					</li>

				</ul>
			</li><!-- End Components Nav -->
			<li class="nav-heading">Pages</li>
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Profile") ? "" : "collapsed"; ?>" href="users-profile.html">
					<i class="bi bi-person"></i>
					<span>Profile</span>
				</a>
			</li><!-- End Profile Page Nav -->
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Login") ? "" : "collapsed"; ?>" href="pages-login.html">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Login</span>
				</a>
			</li><!-- End Login Page Nav -->
		</ul>
	</aside><!-- End Sidebar-->