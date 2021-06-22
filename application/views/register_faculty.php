
<div class="all-title-box">
    <div class="container text-center">
      <h1>New Faculty<span class="m_1"></span></h1>
    </div>
  </div>
                      
  <div style="margin-top:60px; margin-bottom:100px;">
    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('user/register_faculty_action'); ?>">
 <center> <p>
                   <h3>   Faculty Registration
                    </h3></p><?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>
  <table width="500px" border="0">
    <tr>
      <td >Name</td>
      <td ><input type="text" name="txtfname" id="txtfname" required="required" pattern="[a-zA-Z._]{3,}" title="First Name Here" autocomplete="off" placeholder="Enter First Name" /></td>
    </tr>
    
    <tr>
      <td><br/>Address</td>
      <td><br/><input name="txtaddress" type="text" id="txtaddress" value=""  required="required" title="Address here" autocomplete="off" /></td>
    </tr>
    <tr>
      <td><br/>Contact</td>
      <td><br/><input type="tel" name="txtcontact" id="txtcontact" placeholder="1234567890" pattern="[6-9][0-9]{9}"></td>
    </tr>
    <tr>
      <td><br/>Email</td>
      <td><br/><input type="email" name="txtemail" id="txtemail" placeholder="Enter your email..."  id="contact-subject" required onChange="return gEmail()"   ></td>
    </tr>
    <tr>
      <td><br/>Date Of Birth</td>
      <td><br/><input type="date" name="txtdob" id="txtdob" autocomplete="off" required="required" max="2004-12-31" /></td>
    </tr>
<tr>
           <td><br/>Gender</td>
<td><br/><input type="radio" name="gender" id="gender" value="Male" checked="checked" >&nbsp;Male&nbsp;&nbsp;&nbsp; 
<input type="radio" name="gender" id="gender" value="Female">&nbsp;&nbsp;Female
</td>
    </tr>
 <!-- <tr>
      <td><br/>Photo</td>
      <td><br/><input type="file" name="photo" id="photo" autocomplete="off" required="required"/></td>
    </tr>-->
    <tr>
      <td><br/>User Name</td>
      <td><br/><input type="text" name="txtusername" id="txtusername" autocomplete="off" required="required" title="User Name here" /></td>
    </tr>
    <tr>
      <td><br/>Password</td>
      <td><br/><input type="password" name="txtpassword" id="txtpassword" placeholder="Enter your password..."  required onChange="return gPwd()" ></td>
    </tr>
    <tr>
      <td><br/>Confirm Password</td>
      <td><br/><input type="password" name="rtxtpassword" id="txtpassword" placeholder="Confirm your password..."  required onChange="return gPwd()" ></td>
    </tr>
    <tr><td><br/>Qualification </td>
    <td><br/> <input type="text" name="course" id="txtusername" autocomplete="off" required="required" title="Qualification here" />
      </td></tr>
    <tr><center>
      <td><br/></td>
      <td><br/>
        
        <input type="submit" name="btnsignup" id="btnsave" value="Register Faculty" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
        </div>
    </center>
      </form>



</span>


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
