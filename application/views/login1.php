<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login-CI Login Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Please do Login here</h3>
                </div>
                <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');

                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('user/login_user'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Enter E-mail" name="user_email" type="email" required="required" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="user_password" type="password"  required="required" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                        </fieldset>
                    </form>
                <center><b>You are not registered ?</b> <br></b><a href="<?php echo base_url('user'); ?>">Register here</a></center><!--for centered text-->

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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