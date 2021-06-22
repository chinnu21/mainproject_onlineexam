<div class="all-title-box">
    <div class="container text-center">
      <h1>Exam Result<span class="m_1"></span></h1>
    </div>
  </div>

 <div style="margin-top:60px; margin-bottom:100px;">
  <strong><h2> </h2></strong>
  <table  id="customers">
  <tr>
  <th >Sl.No.</th>
  <th >Student Info </th>
  <th >Exam Date </th>
  <th >Mark </th> 
  

  </tr>
    <?php 

    $i=1;
    foreach($results as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['fname']; ?>&nbsp; <?php echo $val['lname']; ?>
  <p><?php echo $val['email']; ?>&nbsp;<?php echo $val['contact']; ?></p>
</td>
<td><?php echo $val['exam_date']; ?></td>
<td><?php echo $val['mark']; ?></td>

    
    </tr>
   <?php } ?>
  </table></center>

 </div>
 