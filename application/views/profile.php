<?php
$userId = $userInfo->userId;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;
$role = $userInfo->role;
?>

<div class="content-wrapper">
    <sectio class="content-header">
        <h1>
            <i class="fa fa-user-circle"> </i> My Profile
            <small> View or Modify the information </small>
        </h1>
    </sectio>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/avtar.png" alt="User Profile Picture">
                        <h3 class="profile-username text-center"> <?= $name ?> </h3>
                        <p class="text-muted text-center"> <?= $role ?> </p>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"> <?= $email ?> </a>
                            </li>

                            <li class="list-group-item">
                                <b>Mobile</b> <a class="pull-right"> <?= $mobile ?> </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?= ($active == "details")? "active" : "" ?>"> <a href="#details" data-toggle="tab"> Details </a>  </li>
                        <li class="<?= ($active == "changepass")? "active" : "" ?>"><a href="#changepass" data-toggle="tab">Change Password</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="<?= ($active ==  "deatils")? "active" : "" ?> tab-pane" id="details">
                            <form action="<?php echo base_url(); ?>profileUpdate" method="post" id="editProfile" role="form">
                                <?php $this->load->helper('form'); ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname"> Full Name </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" />
                                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mobile"> Mobile Number </label>
                                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" value="<?php echo set_value('mobile', $mobile); ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"> Email Address </label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email; ?>" value="<?php echo set_value('email', $email); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                            </form>
                        </div>

                        <div class="<?= ($active == "changepass")? "active" : ""  ?> tab-pane" id="changepass">
                            <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1"> Old Password </label>
                                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Old Password" name="oldPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1"> New Password </label>
                                                <input type="password" class="form-control" id="inputPassword1" placeholder="New Password" name="newPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword2"> Confirm New Password </label>
                                                <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm New Password" name="cNewPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn-default" value="Reset" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> X </button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                <?php    } ?>
            </div>

        </div>
    </section>
</div>