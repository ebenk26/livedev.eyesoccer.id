<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <meta name="author" content="">
        <title>eyeMarket Admin</title>

        <script>
          var base_url = '<?php echo base_url(); ?>';  
        </script>

        <!-- Bootstrap core CSS -->
        <!-- <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bs/css_new/bootstrap.min.css ">

        <!-- Custom fonts for this template -->
        <link href="<?php echo base_url(); ?>bs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="<?php echo base_url(); ?>bs/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>bs/css/sb-admin.css" rel="stylesheet">

        <style type="text/css">
            .fade.in {
              opacity: 1;
            }
            .modal.in .modal-dialog {
              -webkit-transform: translate(0, 0);
              -o-transform: translate(0, 0);
              transform: translate(0, 0);
            }

            .modal-backdrop .fade .in {
              opacity: 0.5 !important;
            }


            .modal-backdrop.fade {
                opacity: 0.5 !important;
            }

            .content-addFriend
            {
                margin-top: 15%;
                /*margin-left: 120%;*/
            }

            .bottom-sticky-shopping
            {
                text-align: center;
                background-color: rgba(0,0,0,.3);
                position: fixed;
                right: 0;
                left: 0;
                z-index: 1030;
            }

            .navbar-fixed-bottom
            {
                bottom: 0;
                margin-bottom: 0;
                border-width: 1px 0 0;
            }

            .loading-eyeme{display:none;position: fixed;top: 0;left: 0;height: 100%;width: 100%;background: url('/assets/img/ajax-loader.gif') 50% 50% no-repeat;
        </style>

    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="#">eyeMarket Admin</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="width: 195px;">
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="#">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">
                                Dashboard 
                            </span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard" onclick="gantiActive()">
                        <a class="nav-link" href="<?= base_url() ?>eyemarket/crud_product">
                            <i class="fa fa-fw fa-reorder"></i>
                            <span class="nav-link-text">
                                Product 
                            </span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li> -->
            <?php 
                // var_dump($username);exit();
                $username = $this->session->userdata('username');
                if ($username != NULL)
                {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
            <?php
                }
                else
                {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-hidden="true" data-toggle="modal" data-target="#modalLogin">
                            <i class="fa fa-fw fa-sign-in"></i>
                            Login
                        </a>
                    </li>
            <?php       
                }
            ?>
                </ul>
            </div>
        </nav>

        <!-- Modal Login -->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="login_admin" method="post" accept-charset="utf-8">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end Modal Login -->

        <script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>

        <div class="content-wrapper" style="margin-left: 195px;">

            <div class="container-fluid">

                <!-- Breadcrumbs -->
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Dashboard</li>
                </ol> -->
                <div class="row">
                    <div class="col-lg-8">
                    </div>

                    <div class="col-lg-4">
                    </div>
                </div>
        <?php
            if ($username != NULL)
            {
                echo $content;
            }
            else
            {
        ?>
                <h3>Selamat datang di eyeMarket Admin. silahkan Login terlebih dahulu</h3>
        <?php        
            }
        ?>
                
            </div>
        </div>

        <footer class="sticky-footer" style="width: 100%;">
            <div class="container">
                <div class="text-center">
                    <small>Copyright &copy; Robi's Dashboard 2017</small>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Logout Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <!-- <script src="assets/jquery/jquery.min.js"></script> -->
        
        
        <!-- <script src="<?=base_url()?>bs/popper/popper.min.js"></script>  -->
        <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>bs/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <!-- <script src="assets/jquery-easing/jquery.easing.min.js"></script> -->
        <!-- <script src="<?=base_url()?>bs/chart.js/Chart.min.js"></script> -->
        <script src="<?=base_url()?>bs/datatables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>bs/datatables/dataTables.bootstrap4.js"></script>
        <script src="<?=base_url()?>bs/tinymce/tinymce.min.js"></script>
        <script src="<?=base_url()?>bs/tinymce/tinymce-init.js"></script>
        <script src="<?=base_url()?>bs/js/sb-admin.js"></script>
        <script src="<?=base_url()?>bs/js/eyesoccer.js"></script>

    </body>

</html>
