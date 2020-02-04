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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>