<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Sign Up </title>
        <?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
        <?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
        <?php echo link_tag('assets/css/sb-admin.css'); ?>
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <div class="card-header"> Register an Account </div>
                <div class="card-body">

                    <?php if($this->session->flashdata('success')) { ?>
                        <p style="color: green; font-size: 18px;"> <?php echo $this->session->flashdata('success'); ?> </p>
                    <!--- </div> --->
                    <?php } ?>

                    <?php if ($this->session->flashdata('error')) { ?>
                        <p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
                    <?php } ?> 
                
                    <?php echo form_open('user/signup'); ?>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <?php echo form_input(['name'=>'firstname','id'=>'firstname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('firstname')]); ?>
                                        <?php echo form_label('Enter your first name', 'firstname'); ?>
                                        <?php echo form_error('firstname',"<div style='color:red'> "," </div>"); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <?php echo form_input(['name'=>'lastname','id'=>'lastname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('lastname')]); ?>
                                        <?php echo form_label('Enter your last name', 'lastname'); ?>
                                        <?php echo form_error('lastname',"<div style='color:red'> "," </div>"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <?php echo form_input(['name'=>'emailid','id'=>'emailid','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('emailid')]); ?>
                            <?php echo form_label('Enter your email id', 'emailid'); ?>
                            <?php echo form_error('emailid',"<div style='color:red'> "," </div>"); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <?php echo form_input(['name'=>'mobilenumber','id'=>'mobilenumber','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('mobilenumber')]); ?>
                            <?php echo form_label('Enter your mobile number', 'mobilenumber'); ?>
                            <?php echo form_error('mobilenumber',"<div style='color:red'> "," </div>"); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <?php echo form_input(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password')]); ?>
                                    <?php echo form_label('Password', 'password'); ?>
                                    <?php echo form_error('password',"<div style='color:red'> "," </div>"); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <?php echo form_input(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('confirmpassword')]); ?>
                                    <?php echo form_label('Confirm Password', 'confirmpassword'); ?>
                                    <?php echo form_error('confirmpassword',"<div style='color:red'> "," </div>"); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php echo form_submit(['name'=>'Register','value'=>'Register','class'=>'btn btn-primary btn-block']); ?>

                </div>
            </div>
        </div>
    </body>
</html>