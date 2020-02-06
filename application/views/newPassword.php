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
                <?php } ?>

                <form action="<?php echo base_url(); ?>createPasswordUser" method="POST">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" readonly required />
                        <span class="glyphicon glyphicon-envelop form-control-feedback"></span>
                        <input type="hidden" name="activation_code" value="<?php echo $activation_code; ?>" required />
                    </div>
                    <hr>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit" />
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js" />
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js" />
    </body>
</html>