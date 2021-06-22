

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
#oo, #oo:visited {
  background-color: white;
  color: #f26d07;
  border: 2px solid #f26d07;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

#oo:hover, #oo:active {
  background-color: #f26d07;
  color: white;
}
</style>
   <div class="all-title-box">
    <div class="container text-center">
      <h1>Options<span class="m_1"></span></h1>
    </div>
  </div>
<?php  if($this->session->userdata('role') == 'FACULTY'){

  if($new==1){?>
  <form action="<?php echo base_url('option'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="420" border="0">
    <tr>
      <td width="140">Question</td>
      <td width="270"><textarea name="qn" readonly="readonly" id="txtfname" required="required" title="Question" autocomplete="off" placeholder="Enter Question"><?php echo $question[0]["qn"]; ?></textarea></td>
    </tr>
    <tr>
      <td width="140">Option</td>
      <td width="270">
<textarea name="option"  id="txtfname" required="required" title="Option" autocomplete="off" placeholder="Enter Option"></textarea>
      </td>
    </tr>
    <tr>
      <td width="140">Is Answer</td>
      <td width="270">
<input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="1" checked="checked"/>Yes
<input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="0" />No
      </td>
    </tr>
     
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" />
        <input type="hidden" name="pr"  value="1" />
        <input type="hidden" name="qid"  value="<?php echo $question[0]["id"]; ?>" />
      </td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php }else{ ?>
<form action="<?php echo base_url('option'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
      <td width="140">Question</td>
      <td width="270"><textarea name="qn" id="txtfname" required="required" title="Question" autocomplete="off" placeholder="Enter Question"><?php echo $question[0]["qn"]; ?></textarea></td>
    </tr>
    
    <tr>
      <td width="140">Option</td>
      <td width="270">
<textarea name="option"  id="txtfname" required="required" title="Option" autocomplete="off" placeholder="Enter Option"><?php echo $option[0]["option"]; ?></textarea>
      </td>
        <input type="hidden" name="pr"  value="2" />
        <input type="hidden" name="qid"  value="<?php echo $question[0]["id"]; ?>" />
        <input type="hidden" name="id" required="required" value="<?php echo $option[0]["Id"]; ?>" />
      </td>
    </tr>
    <tr>
      <td width="140">Is Answer</td>
      <td width="270">
        <?php
if($option[0]["Id"] == $question[0]["ans"]) {
        ?>
<input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="1" checked="checked"/>Yes
<input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="0" />No
<?php } else{ ?>
  <input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="1" />Yes
<input type="radio"  name="answer"  title="Answer" autocomplete="off" placeholder="Enter Answer" value="0" checked="checked" />No
<?php } ?>
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
  <div style="float: left">
<form name="fg" action="<?php echo base_url('question'); ?>" method="post">
<input type="hidden" name="iex" value="<?php echo $question[0]["exam"]; ?>"/>
<input id="oo" type="submit" name="ss" value="Questions"/>
      </form>
      </div>
    </div>
  <strong>Option List</strong>
  <table border="0" id="customers">
  <tr>
  <th>Sl.No.</th>
  <th>Option </th>
<!--  <th>Question </th> -->
  <th>Is Answer </th>
  <th>Action</th>
  

  </tr>
    <?php $i=1;foreach($options as $key => $val){ ?>
    <tr>
<td><?php echo $i++;//$val['id']; ?></td>
<td><?php echo $val['option']; ?></td>
<!--<td><?php echo $question[0]["qn"]; ?></td>-->
<td><?php
if($val["Id"] == $question[0]["ans"]) { ?>
<input type="checkbox" checked="checked" onclick="return false;" readonly="readonly" /><?php } else{ ?><input type="checkbox" onclick="return false;" readonly="readonly" /><?php }
        ?></td>
     <td>
    <?php  if($this->session->userdata('role') == 'FACULTY'){?>  <form name="fg" action="<?php echo base_url('option'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr"  value="3" />
        <input type="hidden" name="qid"  value="<?php echo $question[0]["id"]; ?>" />
<input type="submit" name="ss" value="Delete"/>
      </form>
      &nbsp;
      <form name="fg" action="<?php echo base_url('option/editoption'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
        <input type="hidden" name="qid"  value="<?php echo $question[0]["id"]; ?>" />
<input type="submit" name="ss" value="Edit"/>
      </form>
      <?php } ?>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>


 

