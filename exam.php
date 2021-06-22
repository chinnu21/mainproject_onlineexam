
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
  background-color: #4CAF50;
  color: white;
}
</style>
<?php  if($this->session->userdata('role') == 'ADMIN'){?>
  <form action="<?php echo base_url('exam/newexam'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0" id="customers">
    <tr>
      <td width="10%">Title</td>
      <td width="20%"><input type="text" name="title" id="txtfname" required="required" title="Title" autocomplete="off" placeholder="Enter Title" /></td>
      <td width="10%">Exam Date</td>
      <td width="20%"><input type="date" name="date" id="txtfname" required="required" title="Date" autocomplete="off" placeholder="Enter Exam Date" /></td>
      <td width="10%">Exam Time</td>
      <td width="20%"><input type="time" name="time" id="txtfname" required="required" title="Time" autocomplete="off" placeholder="Enter Exam Time" /></td>
    </tr>
    <tr>
      <td width="10%">Subject</td>
      <td width="20%">
<select name="subject">
   <?php foreach($subjects as $key => $val){ ?>
  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
    <?php
  }
  ?>
</select>
      </td>
      <td width="10%">Exam Duration</td>
      <td width="20%"><input type="text" name="duration" id="txtfname" required="required" title="Duration" autocomplete="off" placeholder="Enter Exam Duration" /></td>
      <td width="10%">No.Question</td>
      <td width="20%"><input type="text" name="no_question" id="txtfname" required="required" title="No Question" autocomplete="off" placeholder="Enter No Question" /></td>
    </tr>
    <tr>
      <td width="10%">Exam Portion</td>
      <td width="50%"><textarea name="portion" id="txtfname" required="required" title="Exam Portion" autocomplete="off" placeholder="Enter Exam Portion" ></textarea></td>
    </tr>
    
    <tr><center>
    <td></td>
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>

   </center> </tr>
  </table>
</form>
<?php } ?>


 <div style="margin-top:60px; margin-bottom:100px;">
  <strong><h2>Exam List</h2></strong>
  <table width="100%" border="0" id="customers">
  <tr>
  <th width="5%">ID#</th>
  <th width="15%">Title </th>
  <th width="10%">Exam Date & Time </th>
  <th width="10%">Duration </th>  
  <th width="10%">Subject </th>
  <th width="10%">Portion </th>

  <th width="10%">No.Question </th>
  <th width="10%">Action</th>
  

  </tr>
    <?php foreach($exam as $key => $val){ ?>
    <tr>
<td><?php echo $val['id']; ?></td>
<td><?php echo $val['title']; ?></td>
<td><?php echo $val['exam_date']; ?>&nbsp; & <?php echo $val['exam_time']; ?></td>
<td><?php echo $val['duration']; ?></td>
<td><?php echo $val['subject_name']; ?></td>
<td><?php echo $val['portion']; ?></td>
<td><?php echo $val['no_question']; ?></td>
     <td>
   <?php  if($this->session->userdata('role') == 'ADMIN'){?>
      <form name="fg" action="<?php echo base_url('exam/deleteexam'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
      <?php } ?>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
