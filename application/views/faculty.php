

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<div class="all-title-box">
    <div class="container text-center">
      <h1>Faculties<span class="m_1"></span></h1>
    </div>
  </div>

 <div style="margin-top:60px; margin-bottom:100px;">
 
  <table border="0" id="customers">
    <tr>
        <td colspan="10" style="text-align: center;"><b></b></td>
      </tr>
    <?php if($this->session->userdata('role') == 'ADMIN'){?>
      <tr>
        <td colspan="10" style="text-align: right;"><a href="<?php echo base_url('user/register_faculty'); ?>"><b>New Faculty</b></a></td>
      </tr><?php } ?>
  <tr>
  <th>Sl.No.</th>
  <th>Name </th>
  <th>Address </th>
  <th>Email </th>
  <th>Contact </th>
  <th>DOB </th>
  <th>Gender </th>
  <th>Username </th>
  <th>Qualification </th>
  <?php  if($this->session->userdata('role') == 'ADMIN'){?>  
   <th>Action</th>
   <?php } ?>

  </tr>
    <?php $i=1;foreach($faculty as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['email']; ?></td>
<td><?php echo $val['contact']; ?></td>
<td><?php echo $val['dob']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['username']; ?></td>
<td><?php echo $val['qualification']; ?></td>
 <?php  if($this->session->userdata('role') == 'ADMIN'){?>       <td>
   
      <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('user/deletefaculty'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['userid'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form></div>
      <div style="float: left;padding-right:10px;">
      <form name="fg" action="<?php echo base_url('user/edit_faculty'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['userid'];?>"/>

<input type="submit" name="ss" value="Edit"/>
      </form>
      </div>
      <div style="float: left;padding-right:10px;">
        <form name="fg" action="<?php echo base_url('subject/faculty_subject'); ?>" method="post">
<input type="hidden" name="faculty" value="<?php echo $val['userid'];?>"/>
<input type="submit" name="ss" value="Subjects"/>
      </form>
    </div>
     
    </td> <?php } ?>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>
 

