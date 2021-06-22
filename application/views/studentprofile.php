

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style>
#oo:link, #oo:visited {
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
      <h1>Student Profile<span class="m_1"></span></h1>
    </div>
  </div>  
 <div style="margin-top:60px; margin-bottom:100px;"><?php  if($role == 'FACULTY'){?>
  <div style="float: left"><a id="oo" href="<?php echo base_url('user/users'); ?>?subj=<?php echo $subj; ?>" ><strong>Students</strong></a></div>
  <div style="float: right"><a id="oo" href="#" onclick="printDiv('printableArea')"><strong>Print</strong></a></div><?php } ?>
 <div  id="printableArea">
  <table border="0" id="customers">

  <tr>
 
  <th>Name </th>
  <th>Address </th>
  <th>Email </th>
  <th>Contact </th>
  <th>DOB </th>
  <th>Gender </th>
  <th>Username </th>
  <th>Course </th>
  <th>Semester </th>
 

  </tr>
    <?php foreach($users as $key => $val){ ?>
    <tr>

<td><?php echo $val['fname']."  ".$val['lname']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['email']; ?></td>
<td><?php echo $val['contact']; ?></td>
<td><?php echo $val['dob']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['username']; ?></td>
<td><?php echo $val['course_name']; ?></td>
<td><?php echo $val['sem_name']; ?></td>
   
    
    </tr>
   <?php } ?>
  </table>

<table border="0" id="customers" style="margin-top:35px">
    <tr>
        <td colspan="9" style="text-align: center;"><b>Exam Details</b>
          <br/><br/>
         </td>
        
      </tr>
  <tr>
 
  <th>Sl.No.  </th>
  <th>Exam Title </th>
  <th>Subject </th>
  <th>Exam Date & Time  </th>
  <th>Mark </th>
  
  </tr>
    <?php $i=1; foreach($exam as $key => $val){ ?>
    <tr>

<td><?php echo $i++; ?></td>
<td><?php echo $val['title']; ?></td>
<td><?php echo $val['subject_name']; ?>
    <p><?php echo $val['course_name']; ?> - <?php echo $val['sem_name']; ?></p>
</td>
<td><?php echo $val['exam_date']; ?> & <?php echo $val['exam_time']; ?></td>
<td><?php echo $val['mark']; ?></td>
   
    
    </tr>
   <?php } ?>
  </table>

<p>
  <br/>
  <div id="chartContainer" style="height: 370px; width: 100%;margin-top: 35px;"></div>
</p>

</div>

 </div>
 

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Exam Marks"
  },
  axisY: {
    title: "Marks"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.## Mark",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
          window.history.pushState(null, "", window.location.href);
      };
  });
</script>
