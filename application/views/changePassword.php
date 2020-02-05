<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Change Password
            <small> Set new password for your account </small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Enter Details </h3>
                    </div>

                    <form role="form" action="<?php echo base_url() ?>changePassword" method="POST">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1"> Old Password </label>
                                        <input type="password" name="inputOldPassword" class="form-control" placeholder="Old Password" name="oldPassword" required>
                                    </div>
                                </div>
                            </div>
                            <hr>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>