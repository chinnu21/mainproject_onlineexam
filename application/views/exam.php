
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="all-title-box">
    <div class="container text-center">
      <h1>Exams<span class="m_1"></span></h1>
    </div>
  </div>

<?php  if($this->session->userdata('role') == 'ADMIN'){
if($new==1){
  ?>
  <form action="<?php echo base_url('exam/newexam'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0" id="customers">

<tr>
     <td width="10%">Course</td>
      <td width="20%">
<select id="course" name="course" required="required">
  <option value="-1">Select</option>
   <?php foreach($courses as $key => $val){ ?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
  ?>
</select>
      </td> <td width="10%">Semester</td>
      <td width="20%">
<select id="semester" name="semester" required="required">
   <?php foreach($semesters as $key => $val){ ?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['sem']; ?></option>
    <?php
  }
  ?>
</select>
      </td>
      <td width="10%">Subject</td>
      <td width="20%">
<select id="subject" name="subject" required="required">
   <?php foreach($subjects as $key => $val){ ?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
  ?>
</select>
      </td>
    </tr>

    <tr>
      <td width="10%">Title</td>
      <td width="20%"><input type="text" name="title" id="txtfname" required="required" title="Title" autocomplete="off" placeholder="Enter Title" /></td>
      <td width="10%">Exam Date</td>
      <td width="20%"><input type="date" name="date" id="txtfname" required="required" title="Date" autocomplete="off" placeholder="Enter Exam Date" /></td>
      <td width="10%">Exam Time</td>
      <td width="20%"><input type="time" name="time" id="txtfname" required="required" title="Time" autocomplete="off" placeholder="Enter Exam Time" /></td>
    </tr>
    <tr>
       <td width="10%">Exam Portion</td>
      <td width="50%"><textarea name="portion" id="txtfname" required="required" title="Exam Portion" autocomplete="off" placeholder="Enter Exam Portion" ></textarea></td>

      <td width="10%">Exam Duration</td>
      <td width="20%"><input type="text" name="duration" id="txtfname" required="required" title="Duration" autocomplete="off" placeholder="Enter Exam Duration" /></td>
      <td width="10%">No.of Questions</td>
      <td width="20%"><input type="text" name="no_question" id="txtfname" required="required" title="No.of Question" autocomplete="off" placeholder="Enter No Question" /></td>
    </tr>
    
    
    <tr><center>
    <td></td>
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>

   </center> </tr>
  </table>
</form>
<?php }
else{
  ?>
  <form action="<?php echo base_url('exam/updateexam'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0" id="customers">
    <tr>
      <td width="10%">Title</td>
      <td width="20%"><input type="text" name="title" id="txtfname" required="required" title="Title" autocomplete="off" placeholder="Enter Title" value="<?php echo $exam_i[0]["title"];?>" /></td>
      <td width="10%">Exam Date</td>
      <td width="20%"><input type="date" name="date" id="txtfname" required="required" title="Date" autocomplete="off" placeholder="Enter Exam Date" value="<?php echo $exam_i[0]["exam_date"];?>" /></td>
      <td width="10%">Exam Time</td>
      <td width="20%"><input type="time" name="time" id="txtfname" required="required" title="Time" autocomplete="off" placeholder="Enter Exam Time" value="<?php echo $exam_i[0]["exam_time"];?>" /></td>
    </tr>
    <tr>
       <td width="10%">Exam Portion</td>
      <td width="50%"><textarea name="portion" id="txtfname" required="required" title="Exam Portion" autocomplete="off" placeholder="Enter Exam Portion" > <?php echo $exam_i[0]["portion"];?></textarea></td>

      <td width="10%">Exam Duration</td>
      <td width="20%"><input type="number" name="duration" id="txtfname" required="required" title="Duration" autocomplete="off" placeholder="Enter Exam Duration" value="<?php echo $exam_i[0]["duration"];?>" /></td>
      <td width="10%">No.Question</td>
      <td width="20%"><input type="number" name="no_question" id="txtfname" required="required" title="No Question" autocomplete="off" placeholder="Enter No Question" value="<?php echo $exam_i[0]["no_question"];?>" /></td>
    </tr>
    <tr>
     <td width="10%">Course</td>
      <td width="20%">
<select id="course" name="course" required="required">
  <option value="-1">Select</option>
   <?php foreach($courses as $key => $val){ 
    if($exam_i[0]["course"]==$val['id']){?>
  <option selected="selected" value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
  <?php }
  else{?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>

    <?php
  }
}
  ?>
  
</select>
      </td>
      <td width="10%">Semester</td>
      <td width="20%">
<select id="semester" name="semester" required="required">
   <?php foreach($semesters as $key => $val){  if($exam_i[0]["sem"]==$val['id']){?>

  <option selected="selected" value="<?php echo $val['id']; ?>"><?php echo $val['sem']; ?></option>
<?php }
else{
?>
 <option  value="<?php echo $val['id']; ?>"><?php echo $val['sem']; ?></option>
    <?php
  }}
  ?>
</select>
      </td>
      <td width="10%">Subject</td>
      <td width="20%">
<select id="subject" name="subject" required="required">
   <?php foreach($subjects as $key => $val){  if($exam_i[0]["subject"]==$val['id']){?>

  <option selected="selected" value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
<?php }
else{
?>
 <option  value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }}
  ?>
</select>
      </td>
    </tr>
    
    <tr><center>
    <td><input type="hidden" name="id" id="btnsave" value="<?php echo $exam_i[0]["id"];?>" /></td>
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>

   </center> </tr>
  </table>
</form>
  <?php
}}
?>


 <div  width="100%">
  <strong><h2></h2></strong>
  <table width="800px" border="0" id="customers">
  <tr>
  <th width="5px">Sl.No.</th>
  <th width="25px">Title </th>
  <th width="50px">Exam Date & Time </th>
  <th width="100px">Duration </th>  
  <th width="100px">Subject </th>
  <th width="250px">Portion </th>

  <th width="30px">No.Question </th>
  <th width="10px">Status</th>

  <th width="150px">Action</th>
  

  </tr>
    <?php $i=1;foreach($exam as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['title']; ?></td>
<td><?php echo $val['exam_date']; ?>&nbsp; & <?php echo $val['exam_time']; ?></td>
<td><?php echo $val['duration']; ?></td>
<td><?php echo $val['subject_name']; ?> - <?php echo $val['course_name']; ?>- <?php echo $val['sem']; ?></td>
<td><?php echo $val['portion']; ?></td>
<td><?php echo $val['no_question']; ?></td>
<td><?php
if($val['running'] == 0){echo "Exam Scheduled  Now";}
if($val['running'] == 1){echo "Wait For Exam";}
if($val['running'] == -1){echo "Exam Expired"; }
if(isset($val['attended'])){
  if($val['attended']==0){echo "&nbsp;Not Attended";}
  if($val['attended']==2){echo "&nbsp;Not Attended & Fine Paid";}
}
?></td>
     <td>
   <?php  if($this->session->userdata('role') == 'ADMIN'){
    if($val['running'] == 1){
      ?>
      <div style="float: left;padding-right:10px;">
        <form name="fg" action="<?php echo base_url('exam/deleteexam'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
    </div>
    <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('exam/editexam'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Edit"/>
      </form></div>
      <?php 
      }
      } ?>
      <?php  if($this->session->userdata('role') == 'FACULTY'){
        if($val['running'] !=- 1){?>
        <div style="float: left;padding-right:10px;">
          <form name="fg" action="<?php echo base_url('question'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Questions"/>
      </form>
    </div>
      <?php } 
    if($val['running'] == -1 )
        {
          ?>
        <div style="float: left;padding-right:10px;">
          <form name="fg" action="<?php echo base_url('exam/result'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Result"/>
      </form>
    </div>
      <?php }
    } ?>
      <?php  if($this->session->userdata('role') == 'USER'){
        $f=0;
        if($val['running'] == 0 && $val['attended'] == 0 )
        {$f=1;
          ?>
        <div style="float: left;padding-right:10px;">
          <form name="fg" action="<?php echo base_url('exam/startnow'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="limit_qn" value="<?php echo $val['no_question'];?>"/>

<input type="hidden" name="exp_time" value="<?php echo $val['exp_time'];?>"/>
<input type="submit" name="ss" value="Start Now"/>
      </form>
    </div>
      <?php } 
     if($val['attended'] == 1)
        {$f=2;
          ?>
       <div style="float: left;padding-right:10px;">
        <form name="fg" action="<?php echo base_url('exam/result'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Result"/>
      </form>
    </div>
      <?php }
       if($val['running'] == -1 && $val['attended'] == 0)
        {$f=3;
          ?>
        <div style="float: left;padding-right:10px;">
         <!-- <form name="fg" action="<?php echo base_url('exam/fine'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="limit_qn" value="<?php echo $val['no_question'];?>"/>
<input type="submit" name="ss" value="Fine"/>
      </form>-->
      <form name="fg" action="<?php echo base_url('exam/pay'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="limit_qn" value="<?php echo $val['no_question'];?>"/>
<input type="submit" name="ss" value="Pay Fine"/>
      </form>
       </div>
      <?php }
      if($f==0){echo '--';}
    } ?>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
 <script>
$(document).ready(function(){
 $('#course').change(function(){
  var course_id = $('#course').val(); 
  if(course_id != '-1')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>exam/fetch_semester",
    method:"POST",
    data:{course_id:course_id},
    success:function(data)
    {
     $('#semester').html(data);
     
    }
   });
  }
  else
  {
   $('#semester').html('<option value="">Select</option>');
  }
 });

 $('#course').change();

 $('#semester').change(function(){
  var sem_id = $('#semester').val(); 
  if(sem_id != '-1')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>exam/fetch_sem_subject",
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
   $('#subject').html('<option value="">Select</option>');
  }
 });
$('#semester').change();
 
 
});

</script>
 


