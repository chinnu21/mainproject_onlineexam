

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="all-title-box">
    <div class="container text-center">
      <h1>Semesters<span class="m_1"></span></h1>
    </div>
  </div>  
<?php  if($this->session->userdata('role') == 'ADMIN'){

  if($new==1){?>
  <form action="<?php echo base_url('semester/newsem'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140"><b>Semester</b></td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" title="Semester" autocomplete="off" placeholder="Enter Semester" /></td>
    </tr>
    <tr>
      <td width="140"><b>Course</b></td>
      <td width="270">
<select id="course" name="course">
   <?php foreach($courses as $key => $val){ ?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
  ?>
</select>
      </td>
    </tr>
     
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php }else{ ?>
<form action="<?php echo base_url('semester/updatesem'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
      <td width="140">Semester</td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" value="<?php echo $semester[0]["sem"]; ?>" title="Semester" autocomplete="off" placeholder="Enter Semester" /></td>
    </tr>
    
    <tr>
      <td width="140">Course</td>
      <td width="270">
<select id="course" name="course">
   <?php foreach($courses as $key => $val){ 
if($semester[0]["course"]==$val['id']){
    ?>
  <option selected="selected"  value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
<?php } else{ ?>
<option  value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
}
  ?>
</select><input type="hidden" name="id" required="required" value="<?php echo $semester[0]["id"]; ?>" />
      </td>
    </tr>
   
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } } ?>

 <div >
  <strong></strong>
  <table border="0" id="customers">
  <tr>
  <th>Sl.No.</th>
  <th>Semester </th>
  <th>Course </th>
 <?php  if($this->session->userdata('role') == 'ADMIN'){?>  <th>Action</th><?php } ?>
  

  </tr>
    <?php $i=1;foreach($semesters as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['sem']; ?></td>
<td><?php echo $val['course_name']; ?></td>
     <?php  if($this->session->userdata('role') == 'ADMIN'){?> <td>
    
    <div style="float: left;padding-right:10px;">
     <form name="fg" action="<?php echo base_url('semester/deletesem'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
    </div>
    <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('semester/editsem'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Edit"/>
      </form>
    </div>
     
    </td>
     <?php } ?>
    </tr>
   <?php } ?>
  </table></center>

 </div>
 

