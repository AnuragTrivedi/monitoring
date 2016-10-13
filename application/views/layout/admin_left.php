<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">        
        <?php if(isset($_SESSION['first_name'])){?>
        <a class="navbar-brand" href="<?php echo base_url() ?>users/dashboard">
            <img alt="bharatiya janata party (BJP) logo" src="<?php echo base_url() ?>images/logo-bjp.gif" height="40px;">
        </a>  
        <?php }else {?>
        <a class="navbar-brand" href="<?php echo base_url() ?>users/login">
            <img alt="bharatiya janata party (BJP) logo" src="<?php echo base_url() ?>images/logo-bjp.gif" height="40px;">
        </a>  
        <?php }?>  
    </div>   
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <!-- Top Menu Items -->
    <?php if (isset($_SESSION['first_name'])) { ?>
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if (isset($_SESSION['first_name'])) {
        echo $_SESSION['first_name'];
    } ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!--<li>
                        <a href="<?php echo base_url() ?>users/changepwd"><i class="fa fa-fw fa-edit"></i> Change password</a>
                    </li>                                 
                    <li class="divider"></li>--> 
                    <li>
                        <a href="<?php echo base_url() ?>users/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>    
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url() ?>users/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li> 
                <!--<li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> User Management <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse">
                        <li>
                            <a href="<?php echo base_url() ?>users/create">Users</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>users/list">Create new users</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Survey Management <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo2" class="collapse">
                        <li>
                            <a href="<?php echo base_url() ?>users/create">Survey list</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>users/list">Create new Survey</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>survey/add_question">Add new Survey question</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>survey/list_of_questions">Question list</a>
                        </li>
                    </ul>
                </li>-->                
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-arrows-v"></i> Campaign <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo4" class="collapse">
                        <li>
                            <a href="<?php echo base_url() ?>users/create">List</a>
                        </li>                        
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>users/logout"><i class="fa fa-fw fa-file"></i>Logout</a>
                </li>
            </ul>
        </div>
<?php } else { ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url() ?>users/login"><i class="fa fa-fw fa-dashboard"></i> Login</a>
                </li> 
                <li>
                    <a href="<?php echo base_url() ?>users/registration"><i class="fa fa-fw fa-file"></i> Registration</a>
                </li>            
            </ul>
        </div>
<?php } ?>
    <!-- /.navbar-collapse -->
</nav>