<div class="all-title-box">
    <div class="container text-center">
      <h1>Courses<span class="m_1"></span></h1>
    </div>
  </div>

<?php  if($this->session->userdata('role') == 'ADMIN'){


if($new==1){
	?>
  <form action="<?php echo base_url('course/newcourse'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140"><b>Course</b></td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" title="Course" autocomplete="off" placeholder="Enter Course" /></td>
    </tr>
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>

<?php } else{?>
	<form action="<?php echo base_url('course/updatecourse'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">Course</td>
      <td width="270">
      	<input type="text" name="name" value="<?php echo $course[0]["name"]; ?>" required="required" title="Course" autocomplete="off" placeholder="Enter Course" />
      	<input type="hidden" name="id" required="required" value="<?php echo $course[0]["id"]; ?>" /></td>
    </tr>
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } }?>



 <div style="margin-top:60px; margin-bottom:100px;">
  <strong></strong>
  <table width="auto" border="0" id="customers">
  <tr>
  <th>Sl.No.</th>
  <th>Course </th>
    <?php  if($this->session->userdata('role') == 'ADMIN'){?>
      <th>Action</th> <?php } ?>
  

  </tr>
    <?php $i=1;foreach($courses as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
   <?php  if($this->session->userdata('role') == 'ADMIN'){?>   <td>
 <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('course/deletecourse'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form></div>
      <div style="float: left">
       <form name="fg" action="<?php echo base_url('course/editcourse'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Edit"/>
      </form></div>
      <!--&nbsp;
       <form name="fg" action="<?php echo base_url('semester'); ?>" method="post">
<input type="hidden" name="course_id" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Semester"/>
      </form>-->
     
    </td> <?php } ?>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
