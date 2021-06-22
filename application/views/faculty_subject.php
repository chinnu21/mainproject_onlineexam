

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="all-title-box">
    <div class="container text-center">
      <h1>Subjects - Faculty<span class="m_1"></span></h1>
    </div>
  </div>

<?php  if($this->session->userdata('role') == 'ADMIN'){

  if($new==1){?>
  <form action="<?php echo base_url('subject/faculty_subject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140"><h3>Faculty Info</h3> </td>
      <td width="270"><?php echo $facultyinfo[0]["name"];?>
      <?php echo $facultyinfo[0]["address"];?>
      <?php echo $facultyinfo[0]["email"];?>
      <?php echo $facultyinfo[0]["contact"];?>
      <input type="hidden" name="faculty" required="required" value="<?php echo $facultyinfo[0]["userid"];?>" /></td>
    </tr>
    <tr>
      <td width="140">Course</td>
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
      <td>Semester</td>
      <td>
        <select id="sem" name="sem">
         <option value="-1">Semester</option>
        </select>
    </td>
    </tr>
    <tr>
      <td>Subject</td>
      <td>
        <select id="subject" name="subject">
         <option value="-1">Subject</option>
        </select>
    </td>
    </tr>
    
    <tr><center>
    
      <td><input type="hidden" name="pr" required="required" value="1" />
        <input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php }else{ ?>
<form action="<?php echo base_url('subject/updatefacultysubject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
      <td width="140"><h3>Faculty Info</h3></td>
      <td width="270"><?php echo $facultyinfo[0]["name"];?>
      <?php echo $facultyinfo[0]["address"];?>
      <?php echo $facultyinfo[0]["email"];?>
      <?php echo $facultyinfo[0]["contact"];?>
      <input type="hidden" name="faculty" required="required" value="<?php echo $facultyinfo[0]["userid"];?>" /></td>
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
    <tr>
      <td>Subject</td>
      <td>
        <select id="subject" name="subject">
         <option value="-1">Subject</option>
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
  <th>Action</th>
  

  </tr>
    <?php $i=1;foreach($result as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['sem_name']; ?></td>
<td><?php echo $val['course_name']; ?></td>
     <td>
    <?php  if($this->session->userdata('role') == 'ADMIN'){?>  
      <form name="fg" action="<?php echo base_url('subject/faculty_subject'); ?>" method="post">
<input type="hidden" name="faculty" value="<?php echo $facultyinfo[0]["userid"];?>"/>
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr" required="required" value="4" />
<input type="submit" name="ss" value="Delete"/>
      </form>
     
      <?php } ?>
    </td>
    
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
   $('#sem').html('<option value="-1">Select Semester</option>');
  }
 });

  $('#sem').change(function(){
  var sem_id = $('#sem').val();alert(sem_id);
  if(sem_id != '-1')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>course/fetch_sem_subject",
    method:"POST",
    data:{sem_id:sem_id},
    success:function(data)
    {
     $('#subject').html(data);
     
    }
   });
  }
  else
  {
   $('#subject').html('<option value="">ffgdf Subject</option>');
  }
 });


 
 
});
</script>

