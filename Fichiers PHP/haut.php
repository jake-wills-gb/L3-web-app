<html>
<head>
	<title>E-Talents</title>

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>style/css/sb-admin-2.css'/>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <hr class="sidebar-divider my-0">
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Talents 2020</div>
      </a>
      <hr class="sidebar-divider my-0">
      <a class="nav-item" href="<?php echo base_url();?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="nav-link collapsed">Acceuil</div>
      </a>
      <hr class="sidebar-divider my-0">
      <a class="nav-item" href="<?php echo base_url();?>index.php/Compte/lister">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="nav-link collapsed">Comptes</div>
      </a>
      <hr class="sidebar-divider my-0">
      <a class="nav-item" href="<?php echo base_url();?>index.php/Candidature/get">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="nav-link collapsed">Consulter une candidature</div>
      </a>
      <hr class="sidebar-divider my-0">
      <a class="nav-item" href="<?php echo base_url();?>index.php/Concours/afficher">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="nav-link collapsed">Concours</div>
      </a>
      <hr class="sidebar-divider my-0">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <a class="nav-item" href="<?php echo base_url();?>index.php/Compte/connecter">
            <div class="nav-link collapsed">Connexion</div>
          </a>
        </nav>