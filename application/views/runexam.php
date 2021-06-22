
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<style>
        #clock {
            font-size: 18px;
            width: 200px;
            margin: 20px;
            float: right;
            text-align:center;

            border: 1px solid black;
            border-radius: 10px;
            padding:15px;
        }
    </style>
    <div class="all-title-box">
    <div class="container text-center">
      <h1>Examination<span class="m_1"></span></h1>
    </div>
  </div>
  <form action="<?php echo base_url('exam/exam_running'); ?>" method="post"  name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0" id="customers">
    <tr>
      <td colspan="2"><h2><div id="clock">00:00:00</div></h2></td>
    </tr>
    <tr>
      <td width="10%">Question : <?php echo $this->session->userdata('qn_no');?></td>
      <td width="20%">
        <?php echo $qn['qn']?>
        <input type="hidden" name="ans" value="<?php echo $qn['ans'];?>"/>
      </td>
      
    </tr>

    <?php 
    $index=1;
    foreach($option as $key => $val){ ?>
    <tr>
       <td width="10%">Option : <?php echo $index++;?></td>
      
      <td width="20%"><input type="radio" name="option" id="option" required="required" value="<?php echo $val['Id'];?>" /><?php echo $val['option'];?></td>
     
    </tr>
    <?php
  }
  ?>
   
    
    <tr><center>
    <td></td>
      <td><input type="submit" name="btnsignup" id="btnsave" value="submit" /></td>

   </center> </tr>
  </table>
</form>
<script>

// Set the date we're counting down to
var countDownDate = new Date('<?php echo $exp_time;?>').getTime();

function calcdiff() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("clock").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s <br/>time left";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    window.location.replace("<?php echo base_url('exam/exam_running'); ?>");
  }
}
// Update the count down every 1 second
var x = setInterval(calcdiff, 1000);
calcdiff();

</script>

<script>

        //setInterval(showTime, 1000);
        function showTime() {
            let time = new Date();
         /*   let hour = time.getHours();
            let min = time.getMinutes();
            let sec = time.getSeconds();
            am_pm = "AM";
  
            if (hour > 12) {
               // hour -= 12;
                am_pm = "PM";
            }
            if (hour == 0) {
                hr = 12;
                am_pm = "AM";
            }
  
            hour = hour < 10 ? "0" + hour : hour;
            min = min < 10 ? "0" + min : min;
            sec = sec < 10 ? "0" + sec : sec;
  
            let currentTime = hour + " : " 
                + min + " : " + sec + " " + am_pm;
  

            document.getElementById("clock")
                .innerHTML = currentTime;
                */
let yest = new Date('2021-06-10 11:10:00');
let date = new Date(time-yest);
let hour = date.getHours();
let min = date.getMinutes();
let sec = date.getSeconds();
let day = date.getUTCDate() - 1;
   
                document.getElementById("clock").innerHTML = hour + ":" + min + ":" + sec;//secondsToHMS((yest - time) / 1000);//dateDiffToString(yest,time);

        }
  
       // showTime();

        function dateDiffToString(a, b){

    // make checks to make sure a and b are not null
    // and that they are date | integers types

    diff = Math.abs(a - b);

    ms = diff % 1000;
    diff = (diff - ms) / 1000;
    ss = diff % 60;
    diff = (diff - ss) / 60;
    mm = diff % 60;
    diff = (diff - mm) / 60;
    hh = diff % 24;
    days = (diff - hh) / 24;

    return days + ":" + hh+":"+mm+":"+ss+"."+ms;

}

function secondsToHMS(secs) {
  function z(n){return (n<10?'0':'') + n;}
  var sign = secs < 0? '-':'';
  secs = Math.abs(secs);
  return sign + z(secs/3600 |0) + ':' + z((secs%3600) / 60 |0) + ':' + z(secs%60);
}
    </script>
 