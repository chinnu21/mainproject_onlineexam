<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>My School Education Category Bootstrap Responsive website Template | Register :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="My School Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!-- //Meta tag Keywords -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Custom-Files -->
    <link href="<?php echo base_url(); ?>/assets/cssn/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Bootstrap-CSS -->
    <link href="<?php echo base_url(); ?>/assets/cssn/style.css" rel='stylesheet' type='text/css' />
    <!-- Style-CSS -->
    <link href="<?php echo base_url(); ?>/assets/cssn/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <!-- //Web-Fonts -->

    <script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.0.min.js"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index.html">My School</a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="<?php echo base_url('/'); ?>" >Home</a></li>
                            <li><a href="<?php echo base_url('/'); ?>" >About</a></li>
                            
                            <li><a href="<?php echo base_url('/'); ?>" >Contact</a></li>
                            <li><a href="<?php echo base_url('user/login_view'); ?>" >Admin</a></li>
                <li><a href="<?php echo base_url('user/faculty_login'); ?>" >Faculty</a></li>
                <li><a href="<?php echo base_url('user/login_view'); ?>" >Student</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <!-- //header -->

    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Register Now</h3>
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/user/register_user'); ?>">
                    <div class="form-group">
                        <label class="col-form-label">First Name</label>
                        <input type="text" class="form-control" name="txtfname" id="txtfname" required="required" pattern="[a-zA-Z._]{3,}" title="First Name Here" autocomplete="off" placeholder="Enter First Name" />">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" name="txtlname" id="txtlname" required="required" pattern="[a-zA-Z._]{3,}" title="Last Name Here" autocomplete="off" placeholder="Enter Last Name" />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="txtaddress" class="form-control" type="text" id="txtaddress" value=""  required="required" title="Address here" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Contact</label>
                        <input type="tel" class="form-control" name="txtcontact" id="txtcontact" placeholder="1234567890" pattern="[6-9][0-9]{9}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Enter your email..."  id="contact-subject" required onChange="return gEmail()"/>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name="txtdob" id="txtdob" autocomplete="off" required="required" max="2004-12-31" />
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Gender</label><br/>
                       <input type="radio"  name="gender" id="gender" value="Male" checked="checked" ><span style="color: white">Male</span>&nbsp;&nbsp;
                        
						<input type="radio" name="gender" id="gender" value="Female"><span style="color: white">Female</span>
                    </div>
                    <!--
                     <div class="form-group">
                        <label class="col-form-label">Photo</label>
                        <input type="file"  class="form-control" name="photo" id="photo" autocomplete="off" required="required"/>
                    </div>-->
                    <div class="form-group">
                        <label class="col-form-label">User Name</label>
                       <input type="text" class="form-control" name="txtusername" id="txtusername" autocomplete="off" required="required" title="User Name here" />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                       <input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="Enter your password..."  required onChange="return gPwd()" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                       <input type="password" class="form-control" name="rtxtpassword" id="txtpassword" placeholder="Confirm your password..."  required onChange="return gPwd()" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Course</label>
                       <select name="course" id="course">
            <option value="-1">Select</option>
            <?php foreach($courses as $key => $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
          </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Semester</label>
                       <select name="sem" required="required" id="sem">
                        </select>
                    </div>
                    <!--
                    <div class="sub-w3l my-3">
                        <div class="sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-li text-style-w3ls">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div>-->
                    <input type="submit" name="btnsignup" id="btnsave" value="Sign Up" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
                </form>
                <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>"> Please Login</a></center>
            </div>
            <!-- //register -->
        </div>
    </div>
    <!-- //inner banner -->

    <!-- footer -->
    <footer class="py-5">
        <div class="container py-xl-4 py-lg-3">
            <div class="row footer-grids">
                <div class="col-lg-2 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3">Navigation</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.html">Index</a>
                        </li>
                        <li>
                            <a href="index.html">About Us</a>
                        </li>
                        <li>
                            <a href="index.html">What We Do?</a>
                        </li>
                        <li>
                            <a href="index.html">Our Gallery</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3">Some More</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.html">Apply Now</a>
                        </li>
                        <li>
                            <a href="index.html">Our Events</a>
                        </li>
                        <li>
                            <a href="index.html">Popular Courses</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid footer-contact mt-lg-0 mt-4">
                    <h3 class="mb-sm-4 mb-3">Get In Touch</h3>
                    <ul class="list-unstyled">
                        <li>
                            +01(24) 8543 8088
                        </li>
                        <li>
                            <a href="mailto:info@example.com">info@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid text-lg-right">
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.html">Our Statistics</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="index.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 footer-grid mt-lg-0 mt-4">
                    <div class="footer-logo">
                        <h2 class="text-lg-center text-center">
                            <a class="logo text-wh font-weight-bold" href="index.html">
                                My School</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copyright-w3ls py-4">
        <div class="container">
            <div class="row">
                <!-- copyright -->
                <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">© 2019 My School. All
                    Rights Reserved | Design by
                    <a href="https://w3layouts.com/" target="_blank">W3layouts</a>
                </p>
                <!-- //copyright -->
                <!-- social icons -->
                <div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
                    <ul>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="px-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="pl-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
    </div>
    <!-- //copyright -->
    <!-- move top icon -->
    <a href="#home" class="move-top text-center">
        <span class="fa fa-angle-double-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->
<script>
$(document).ready(function(){
 $('#course').change(function(){
  var course_id = $('#course').val();
  if(course_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>course/fetch_sem2",
    method:"POST",
    data:{course_id:course_id},
    success:function(data)
    {
        
     $('#sem').html(data);
     
    }
   });
  }
  else
  {
   $('#sem').html('');
  }
 });

 
 
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
          window.history.pushState(null, "", window.location.href);
      };
  });
</script>
</body>

</html>