<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title> Admin Login </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewpoint'>
        <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"> <b> Admin Panel </b> </a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg"> Sign In </p>
                <?php $this->load->helper('form'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button> </div>'); ?>
                    </div>
                </div>
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if($error)
                {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>
                        <?php echo $error; ?>
                    </div>
                <?php }
                    $success = $this-session-flashdata('success');
                    if($success)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>
                        <?php $success; ?>
                        </div>
                    <?php } ?>

                <form action="<?php echo base_url(); ?>loginMe" method="post">
                    
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" required />
                        <span class="glyphicon glyphicon-envelop form-control-feedback"></span>
                    </div>
              
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label> <input type="checkbox"> Remember Me </label>
                            </div>
                        </div>
                        
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?> assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?> assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>