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

<?php  if($this->session->userdata('role') == 'ADMIN'){

  if($new==1){?>
  <form action="<?php echo base_url('subject/newsubject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">Subject</td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" title="Course" autocomplete="off" placeholder="Enter Course" /></td>
    </tr>
    <tr>
      <td width="140">Course</td>
      <td width="270">
<select name="course">
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
<form action="<?php echo base_url('subject/updatesubject'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">Subject</td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" value="<?php echo $subject[0]["name"]; ?>" title="Subject" autocomplete="off" placeholder="Enter Subject" /></td>
    </tr>
    <tr>
      <td width="140">Course</td>
      <td width="270">
<select name="course">
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
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } } ?>

 <div style="margin-top:60px; margin-bottom:100px;">
  <strong>Subject List</strong>
  <table width="600px" border="0" id="customers">
  <tr>
  <th>ID#</th>
  <th>Subject </th>
  <th>Course </th>
  <th>Action</th>
  

  </tr>
    <?php foreach($subjects as $key => $val){ ?>
    <tr>
<td><?php echo $val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['course_name']; ?></td>
     <td>
    <?php  if($this->session->userdata('role') == 'ADMIN'){?>  <form name="fg" action="<?php echo base_url('subject/deletesubject'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
      &nbsp;
      <form name="fg" action="<?php echo base_url('subject/editsubject'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Edit"/>
      </form>
      <?php } ?>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
