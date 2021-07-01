<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Menu Utama Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">     
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

   


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">


    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.js'); ?>"></script> 

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body class="bg-light">

    <div id="sideNavigation" class="sidenav">


        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo base_url('Admin') ?>"><img
                src="<?php echo base_url('assets/image/home.png'); ?>" class="gk" width="30" height="30">Laporan</a>


        <a href="<?= base_url('Logout') ?>" style="margin-top: 70%;"><img
                src="<?php echo base_url('assets/image/logout.png'); ?>" class="gk" width="30" height="30">Keluar</a>


    </div>

    <nav class="topnav navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="#" onclick="openNav()">
                        <svg width="30" height="30" id="icoOpen">
                            <path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
                            <path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
                            <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                        </svg>
                    </a>
                </li>
                <li>

                </li>
            </ul>

        </div>
    </nav>