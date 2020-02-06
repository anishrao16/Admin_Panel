<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Reset Password </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="<?php echo base_ur(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_ur(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_ur(); ?>assets/dist/css/AdminLTE.min.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"> <b> Admin Panel </b> </a>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg"> Reset Password </p>
                <?php $this->load->helper('form'); ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>  </div>'); ?>
                    </div>
                </div>

                <?php 
                    $this->load->helper('error');
                    $error = $this->session->flashdata('error');

                    if($error)
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
