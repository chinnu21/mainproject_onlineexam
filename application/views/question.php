

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <div class="all-title-box">
    <div class="container text-center">
      <h1>Questions<span class="m_1"></span></h1>
    </div>
  </div>
<?php  if($this->session->userdata('role') == 'FACULTY'){

  if($new==1){?>
  <form action="<?php echo base_url('question/'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">Question</td>
      <td width="270"><textarea name="qn" id="txtfname" required="required" title="Question" autocomplete="off" placeholder="Enter Question"></textarea></td>
    </tr>
    <tr>
      <td width="140">Exam ID</td>
      <td width="270">
<select id="subj" name="iex">
   
<option  value="<?php echo $iex; ?>"><?php echo $iex; ?></option>
    
</select><input type="hidden" name="pr" required="required" value="1" />
      </td>
    </tr>
     
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php }else{ ?>
<form action="<?php echo base_url('question/'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
      <td width="140">Question</td>
      <td width="270"><textarea name="qn" id="txtfname" required="required" title="Question" autocomplete="off" placeholder="Enter Question"><?php echo $question[0]["qn"]; ?></textarea></td>
    </tr>
    
    <tr>
      <td width="140">Exam ID</td>
      <td width="270">
<select id="subj" name="iex">
   
<option  value="<?php echo $iex; ?>"><?php echo $iex; ?></option>
    
</select><input type="hidden" name="id" required="required" value="<?php echo $question[0]["id"]; ?>" /><input type="hidden" name="pr" required="required" value="2" />
      </td>
    </tr>
   
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } } ?>

 <div style="margin-top:60px; margin-bottom:100px;"></div>
  <strong>Question List</strong>
  <table border="0" id="customers">
  <tr>
  <th>Sl.No.</th>
  <th>Question </th>
  <th>Exam ID# </th>
  <th>Action</th>
  

  </tr>
    <?php $i=1;foreach($questions as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['qn']; ?></td>
<td><?php echo $val['exam']; ?></td>
     <td>
    <?php  if($this->session->userdata('role') == 'FACULTY'){?>  
      <form name="fg" action="<?php echo base_url('question/'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="pr" required="required" value="3" />
<input type="hidden" name="iex" required="required" value="<?php echo $iex; ?>" />
<input type="submit" name="ss" value="Delete"/>
      </form>
      &nbsp;
      <form name="fg" action="<?php echo base_url('question/editquestion'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="iex" required="required" value="<?php echo $iex; ?>" />
<input type="submit" name="ss" value="Edit"/>
      </form>
      &nbsp;
      <form name="fg" action="<?php echo base_url('option'); ?>" method="post">
<input type="hidden" name="qid" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="iex" required="required" value="<?php echo $iex; ?>" />
<input type="submit" name="ss" value="Options"/>
      </form>
    <?php }else{ ?>
      &nbsp;
      <form name="fg" action="<?php echo base_url('option'); ?>" method="post">
<input type="hidden" name="qid" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="iex" required="required" value="<?php echo $iex; ?>" />
<input type="submit" name="ss" value="Options"/>
      </form>
      <?php } ?>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>


 

