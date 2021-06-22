<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>SmartEDU </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/assets/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="<?php echo base_url(); ?>/assets/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: 5%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fd7157;
  color: white;
}

#menu{
    color: white;
    font-weight:500;
    font-size:18px;


}
</style>
</head>
<body class="host_version"> 

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER --> 

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <?php  if($this->session->has_userdata('role') ){?>
    <?php  if($this->session->userdata('role') == 'ADMIN'){?>
                            <li class="nav-item"><a id="menu" href="<?php echo base_url('course/'); ?>" >Course</a>  </li>
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('semester/'); ?>" >Semester</a>  </li>
                        <?php } ?>
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('subject/'); ?>" >Subject</a>  </li>
                            

                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('user/faculty'); ?>" >Faculty</a>  </li>
                            <?php  if($this->session->userdata('role') == 'ADMIN'){?>
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('user/users'); ?>" >Students</a>  </li>
                        <?php } ?>
                        <?php  if($this->session->userdata('role') == 'USER'){?>
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('user/users'); ?>" >My Profile</a>  </li>
                        <?php } ?>
                   
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('exam/'); ?>" >Exam</a>  </li>
                            <li class="nav-item"><a id="menu"  href="<?php echo base_url('/'); ?>" >SignOut</a></li>
                          
                         <?php } else{
                            redirect('/');
                          } ?>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->