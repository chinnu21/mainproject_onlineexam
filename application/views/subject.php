

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="all-title-box">
    <div class="container text-center">
      <h1>Subjects<span class="m_1"></span></h1>
    </div>
  </div>

<?php  if($this->session->userdata('role') == 'ADMIN'){

  if($new==1){?>
  <form action="<?php echo base_url('subject/newsubject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140"><b>Subject</b></td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" title="Course" autocomplete="off" placeholder="Enter Subject" /></td>
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
      <tr>
      <td><b>Semester</b></td>
      <td>
        <select id="sem" name="sem">
         <option value="-1">Semester</option>
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
<form action="<?php echo base_url('subject/updatesubject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
      <td width="140">Subject</td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" value="<?php echo $subject[0]["name"]; ?>" title="Subject" autocomplete="off" placeholder="Enter Subject" /></td>
    </tr>
    
    <tr>
      <td width="140">Course</td>
      <td width="270">
<select id="course" name="course">
   <?php foreach($courses as $key => $val){ 
if($subject[0]["course"]==$val['id']){
    ?>
  <option selected="selected"  value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
<?php } else{ ?>
<option  value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
}
  ?>
</select><input type="hidden" name="id" required="required" value="<?php echo $subject[0]["id"]; ?>" />
      </td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>
        <select id="sem" name="sem">
         <option value="-1">Semester</option>
        </select>
    </td>
    </tr>
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } } ?>

 <div style="margin-top:60px; margin-bottom:100px;">
  <strong></strong>
  <table border="0" id="customers">
  <tr>
  <th>Sl.No.</th>
  <th>Subject </th>
  <th>Semester </th>
  <th>Course </th>
  <?php  if($this->session->userdata('role') != 'USER'){?>  <th>Action</th><?php } ?>
  

  </tr>
    <?php $i=1;foreach($subjects as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['sem_name']; ?></td>
<td><?php echo $val['course_name']; ?></td>
   <?php  if($this->session->userdata('role') != 'USER'){?>  <td>
    <?php  if($this->session->userdata('role') == 'ADMIN'){?>  
      <div style="float: left;padding-right:10px;">
        <form name="fg" action="<?php echo base_url('subject/deletesubject'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
      </div>
      <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('subject/editsubject'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Edit"/>
      </form></div>
      <?php } ?>
      <?php  if($this->session->userdata('role') == 'FACULTY'){?> 
       <div style="float: left;padding-right:10px;">
        <form name="fg" action="<?php echo base_url('user/users'); ?>" method="post">
        <input type="hidden" name="subject" value="<?php echo $val['id'];?>"/>
        <input type="submit" name="ss" value="Students"/>
        </form>
      </div>
      <?php } ?>
    </td>
  <?php } ?>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
 <script>
$(document).ready(function(){
 $('#course').change(function(){
  var course_id = $('#course').val();
  if(course_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>course/fetch_sem",
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
   $('#sem').html('<option value="">Select Semester</option>');
  }
 });

 
 
});
</script>

