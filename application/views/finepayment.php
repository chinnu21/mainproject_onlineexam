<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fine Payment</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Please do Payment here</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form"  method="post" action="<?php echo base_url('exam/fine_payment'); ?>">
 <center> <p>
Card Payment Section                    </p>
  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="500px" border="0">
    <tr>
      <td><br/>Fee Rs.</td>
      <td><br/><input type="text" name="fee" required="required" value="500" readonly="readonly" />
      <input type="hidden" name="exam_id" required="required" value="<?php echo $exam_id;?>" readonly="readonly" />
    </td>
    </tr>
    
    <tr>
      <td >Card Type</td>
      <td ><select name="card_type">
        <option>Visa</option>
        <option>Master</option>
        <option>Maestro</option>
      </select></td>
    </tr>
    <tr>
      <td><br/>Name on Card</td>
      <td><br/><input type="text" name="card_name" required="required" title="Name On card Here" autocomplete="off" placeholder="Enter Name" /></td>
    </tr>
    <tr>
      <td><br/>Card Number</td>
      <td><br/><input name="card_no" type="number" id="txtaddress"   required="required" placeholder="Card Number here" autocomplete="off" /></td>
    </tr>
    <tr>
      <td><br/>CVV</td>
      <td><br/><input type="number" name="cvv" id="txtcontact" placeholder="xxx" pattern="[0-9]{3}"></td>
    </tr>
    <tr>
      <td><br/>Expiry year</td>
      <td><br/><select name="exp_year">
        <option>2021</option>
        <option>2022</option>
        <option>2023</option>
        <option>2024</option>
        <option>2025</option>
        <option>2026</option>
        <option>2027</option>
      </select></td>
    </tr>
    <tr>
      <td><br/>Expiry Month</td>
      <td><br/><select name="exp_month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select></td>
    </tr>

    <tr><center>
      <td><br/></td>
      <td><br/><input type="submit" name="btnsignup" id="btnsave" value="Pay Now" />
        </td>
   
   </center> </tr>
  </table>
        </div>
    </center>
      </form>
                      <center><b>Cancel Payment</b> <br></b><a href="<?php echo base_url('exam'); ?>"> Exam</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>


  </body>
</html>