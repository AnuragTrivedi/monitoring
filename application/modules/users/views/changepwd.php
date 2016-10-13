<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Change password                    
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>users/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Change PWD
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <form role="form">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input class="form-control" placeholder="Enter text">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" placeholder="Enter text">
                    </div>
                    <div class="form-group">
                        <label>Re-type password</label>
                        <input class="form-control" placeholder="Enter text">
                        <p class="help-block">New password & Re-type password should be same.</p>
                    </div>                         
                    <button type="submit" class="btn btn-default">Change</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>           
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>