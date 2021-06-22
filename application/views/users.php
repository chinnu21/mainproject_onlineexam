

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style>
#oo:link, #oo:visited {
  background-color: white;
  color: #f26d07;
  border: 2px solid #f26d07;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

#oo:hover, #oo:active {
  background-color: #f26d07;
  color: white;
}
</style>
<div class="all-title-box">
    <div class="container text-center">
      <h1>Student Profile<span class="m_1"></span></h1>
    </div>
  </div>
<?php  if($role == 'USER'){

  if($pr == 'edit') { ?>

<form action="<?php echo base_url('user/users'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>
Update Profile
  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">First Name</td>
      <td width="270">
        <input type="text" name="fname" value="<?php echo $users[0]["fname"]; ?>" pattern="[a-zA-Z._]{3,}"  required="required" title="First Name" autocomplete="off" placeholder="Enter First Name" />
        </td>
         <td width="140">Last Name</td>
      <td width="270">
        <input type="text" name="lname" value="<?php echo $users[0]["lname"]; ?>" pattern="[a-zA-Z._]{3,}"  required="required" title="Last Name" autocomplete="off" placeholder="Enter Last Name" />
        </td>
        <td width="140">Address</td>
      <td width="270">
        <input type="text" name="address" value="<?php echo $users[0]["address"]; ?>" required="required" title="Address" autocomplete="off" placeholder="Enter Address" />
        </td>
    </tr>
    <tr>
      <td width="140">Email</td>
      <td width="270">
        <input type="email" name="email" value="<?php echo $users[0]["email"]; ?>" required="required" title="Email" autocomplete="off" placeholder="Enter Email" />
   </td>
         <td width="140">Contact</td>
      <td width="270">
        <input type="tel" name="contact" value="<?php echo $users[0]["contact"]; ?>" pattern="[6-9][0-9]{9}" required="required" title="Last Name" autocomplete="off" placeholder="Enter Last Name" />
        </td>
        <td width="140">DOB</td>
      <td width="270">
        <input type="date" name="dob" value="<?php echo $users[0]["dob"]; ?>" max="2004-12-31" required="required"  />
        </td>
    </tr>
     <tr>
      <td width="140">Gender</td>
      <td width="270">
        <input type="radio" name="gender" id="gender" value="Male" checked="checked" >&nbsp;Male&nbsp;&nbsp;&nbsp; 
<input type="radio" name="gender" id="gender" value="Female">&nbsp;&nbsp;Female
   </td>
    <td width="140">Course</td>
      <td width="270">
        <select name="course" id="course">
            <?php 
            
            foreach($courses as $key => $val){ $selected = '';
              if($val['id']==$users[0]['course']){$selected='selected="selected"';}

              ?>
                <option <?php echo $selected; ?> value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
          </select>
   </td>
         <td width="140">Semester</td>
      <td width="270">
        <select name="sem" id="sem">
            <?php 
           
            foreach($sem as $key => $val){ $selected = '';
              if($val['id']==$users[0]['sem']){$selected='selected="selected"';}
              ?>
                <option <?php echo $selected; ?> value="<?php echo $val['id']; ?>"><?php echo $val['sem']; ?></option>
            <?php } ?>
          </select>
        </td>
        
       </tr>
     <tr> 
       <td width="140">Username</td>
      <td width="270">
        <input type="text" name="username" value="<?php echo $users[0]["username"]; ?>"  required="required" title="Last Name" autocomplete="off" placeholder="Enter Last Name" />
        </td>
        <td width="140">Password</td>
      <td width="270">
        <input type="password" name="password" value="<?php echo $users[0]["password"]; ?>"  required="required"  />
        </td>
        <td width="140">Retype Password</td>
      <td width="270">
        <input type="password" name="repassword" value="<?php echo $users[0]["password"]; ?>"  required="required"  />
        </td>
    </tr>
  
    <tr><center>
    
      <td colspan="6"><center>
        <input type="hidden" name="id" required="required" value="<?php echo $users[0]["userid"]; ?>" />
        <input type="hidden" name="pr" value="update" />
        <input type="submit" name="btnsignup" id="btnsave" value="Save" /></center></td>
      <td></td>
   
   </center> </tr>
  </table>
</form>
<?php } } ?>

 <div style="margin-top:60px; margin-bottom:100px;">
  <?php  if($role == 'FACULTY'){?>
  <div style="float: left;margin-left:5%;"><a id="oo" href="<?php echo base_url('subject/'); ?>" ><strong>Subjects</strong></a></div>
  <div style="float: right;margin-right:15%"><a id="oo" href="#" onclick="printDiv('printableArea')"><strong>Print</strong></a></div><?php } ?>
 <div  id="printableArea">
  <table border="0" id="customers">
    <tr>
        <td colspan="11" style="text-align: center;"><h2>Student Profile</h2>
        
          <?php if($msg!=null) echo $msg; ?></td>
        
      </tr>
    
  <tr>
  <th>Sl.No.</th>
  <th>Name </th>
  <th>Address </th>
  <th>Email </th>
  <th>Contact </th>
  <th>DOB </th>
  <th>Gender </th>
  <th>Username </th>
  <th>Course </th>
  <th>Semester </th>
  <th>Action</th>
 

  </tr>
    <?php $i=1;foreach($users as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['fname']."  ".$val['lname']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['email']; ?></td>
<td><?php echo $val['contact']; ?></td>
<td><?php echo $val['dob']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['username']; ?></td>
<td><?php echo $val['course_name']; ?></td>
<td><?php echo $val['sem_name']; ?></td>
   <td> <?php  if($role == 'USER'){?>
      <div style="float: left;padding-right:10px;"><form name="fg" action="<?php echo base_url('user/users'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['userid'];?>"/>
<input type="hidden" name="pr" value="edit"/>
<input type="submit" name="ss" value="Edit"/>
      </form>
    </div>

      
    <?php } ?>
    <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('user/studentprofile'); ?>" method="post">
<input type="hidden" name="uid" value="<?php echo $val['userid'];?>"/>
<input type="hidden" name="subj" value="<?php echo $subj;?>"/>

<input type="submit" name="ss" value="View Profile"/>
      </form>
    </div>
  </td>
    
    </tr>
   <?php } ?>
  </table></div>

 </div>
 

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


