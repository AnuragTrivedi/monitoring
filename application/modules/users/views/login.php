<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome                            
                </h1>                
            </div>
        </div>
        <!-- /.row -->
        <div class="row"> 
            <div class="col-lg-6">                                                                
                <img alt="bharatiya janata party (BJP) logo" src="<?php echo base_url() ?>images/big-bjp-logo.jpg">
                <p>
                    About Company  About Company About Company About Company
                    About Company  About Company About Company About Company
                    About Company  About Company About Company About Company
                </p>
            </div>
                <?php
                if (isset($error_message)) {
                    echo $error_message;
                } else {
                    echo validation_errors();
                }
                ?>  
                <div class="col-lg-6">
                <form method="POST" action="<?php echo base_url(); ?>users/login">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" maxlength="20">
                        <p class="help-block">Input your unique user name & password.</p>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" maxlength="20">
                    </div>                          
                    <input type="submit" class="btn btn-default" name="submit" value="Login">                                        
                </form>
                <a href="<?php echo base_url() ?>users/registration"> Forgot Password?</a> / <a href="<?php echo base_url() ?>users/registration"> New User? Click here to Register</a>/
               </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


