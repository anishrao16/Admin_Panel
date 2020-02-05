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
                        <span class="input-group-addon"> <label for="toDate"> <i class="fa fa-calender" /> </label> </span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                    <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text" />
                </div>

                <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
                    <button type="submit" class="btn btn-primary btn-md btn-block searchList pull-right"> <i class="fa fa-search" aria-hidden="true" /> </button>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
                    <button class="btn btn-md btn-default btn-block pull-right resetFilters"> <i class="fa fa-refresh" aria-hidden="true" /> </button>
                </div>

            </form>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> <?= !empty($userInfo) ? $userInfo->name." : ".$userInfo->email : "All Users" ?> </h3>
                        <div class="box-tools"></div>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th> Session Data </th>
                                <th> IP Address </th>
                                <th> User Agent </th>
                                <th> Agent Full String </th>
                                <th> Platform </th>
                                <th> Date-Time </th>
                            </tr>

                            <?php
                            if(!empty($userRecords))
                            {
                                foreach($userRecords as $record)
                                {
                                    ?>
                                    <tr>
                                        <td> <?php echo $record->sessionData ?> </td>
                                        <td> <?php echo $record->machineIp ?> </td>
                                        <td> <?php echo $record->userAgent ?> </td>
                                        <td> <?php echo $record->agentString ?> </td>
                                        <td> <?php echo $record->platform ?> </td>
                                        <td> <?php echo $record->createdDtm ?> </td>
                                    </tr>
                                    <?php
                                }
                            }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>