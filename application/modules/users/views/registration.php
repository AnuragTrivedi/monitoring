<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php echo $heading; ?>                            
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>users/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i>Registration
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <?php echo validation_errors(); ?>
            <form method="POST" action="<?php echo base_url(); ?>users/registration">
                <div class="col-lg-6">   
                    <div class="form-group">
                        <label>Please select user type according to your job</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="user_type" id="optionsRadios1" value="nukkad" checked>Register for Nukked
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="user_type" id="optionsRadios2" value="survey">Register for Survey
                            </label>
                        </div>                                
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <?php echo form_error('first_name'); ?>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if (isset($first_name)) echo $first_name; ?>" size="50">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if (isset($last_name)) echo $last_name; ?>" size="50">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" value="<?php if (isset($user_id)) echo $user_id; ?>" size="20">
                        <p class="help-block">User Id should be unique.</p>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" size="20">
                    </div>
                    <div class="form-group">
                        <label>Re-type password</label>
                        <input type="password" class="form-control" name="passconf" id="passconf" size="20">
                        <p class="help-block">Password & Re-type password should be.</p>
                    </div>
                    <div class="form-group">
                        <label>Mobile No</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php if (isset($mobile)) echo $mobile; ?>" size="10">
                        <p class="help-block">Please enter your 10 digit mobile number</p>
                    </div>
                    <div class="form-group">
                        <label>Email-Id</label>
                        <input type="text" class="form-control" placeholder="Enter text" name="email_id" id="email_id" value="<?php if (isset($email_id)) echo $email_id; ?>" size="50">
                        <p class="help-block">Please enter your email-id</p>
                    </div>
                    <button type="reset" class="btn btn-default" name="resend_otp" id="resend_otp" >Resend OTP</button>                        
                </div>
                <div class="col-lg-6">
                    <h2>OTP (One Time Password)</h2>
                    <div class="form-group">
                        <label>OTP</label>
                        <input type="text" class="form-control" name="otp" id="otp" size="4">
                        <p class="help-block">Contact to Admin for OTP</p>
                    </div>
                    <input type="submit" class="btn btn-default" name="submit" value="Submit">
                    <input type="reset" class="btn btn-default" name="reset" value="reset">                    
                </div>
                <a href="<?php echo base_url() ?>users/login">Member user click here for login</a>
            </form>    
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>