<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users" /> Login History
            <small> Track Login History </small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <form action="<?php echo base_url() ?>login-history" method="POST" id="searchList">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
                    <div class="input-group">
                        <input id="fromDate" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date" autocomplete="off" />
                        <span class="input-group-addon"> <label for="fromDate"> <i class="fa fa-calender" /> </label> </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
                    <div class="input-group">
                        <input id="toDate" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date" autocomplete="off" />
                        <span class="input-group-addon">  </span>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>