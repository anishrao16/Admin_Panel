<!DOCTYPE html>
<html lang="en">
    <head>
        <title> My Profile </title>
        <?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
        <?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
        <?php echo link_tag('assets/vendor/datatables/dataTables.bootstrap4.css'); ?> 
    </head>

    <body id="page-top">
        <?php include APPPATH.'views/user/includes/header.php'; ?>

        <div id="wrapper">
            <?php include APPPATH.'views/user/includes/sidebar.php'; ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                    
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo site_url('user/Dashboard'); ?>"> User </a>
                        </li>
                        
                        <li class="breadcrumb-item active"> My Profile </li>
                    </ol>

                    <h1> My Profile </h1>
                    <hr>

                    <?php if($this->session->flashdata('success')) { ?>
                        <p style="color: green; font-size: 18px;"> <?php echo $this->session->flashdata('success'); ?> </p>
                        </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('error')) {?>
                        <p style="color: red; font-size: 18px;"> <?php echo $this->session->flashdata('error'); ?> </p> 
                    <?php } ?>

                    <?php echo form_open('user/User_profile/updateprofile'); ?>

                    <p> <strong> Reg. Date : </strong> <?php echo $profile->regDate; ?> </p>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <?php echo form_input(['name'=>'firstname','id'=>'firstname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('firstname',$profile->firstname)]); ?>
                                    <?php echo form_label('Enter your first name','firstname'); ?>
                                    <?php echo form_error('firstname',"<div style='color:red'> "," </div>"); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <?php echo form_input(['name'=>'lastname','id'=>'lastname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('lastname',$profile->lastname)]); ?>
                                    <?php echo form_label('Enter your last name','lastname'); ?>
                                    <?php echo form_error('lastname',"<div style='color:red'> "," </div>"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>