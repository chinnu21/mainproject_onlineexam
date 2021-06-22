<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Exam extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('subject_model');
        $this->load->model('course_model');
        $this->load->model('exam_model');
        $this->load->model('semester_model');
        $this->load->library('session');

}

public function index()
{
  $this->session->set_userdata('qn_no',null);
  $this->session->set_userdata('exam_id',null);
  $this->session->set_userdata('qns',null);


  $role = $this->session->userdata('role');
  $uid  = $this->session->userdata('user_id');
  $data['role']=$role;
  $data['new']=1;
  $cr=0;
  $sem=0;

  if($role=="USER") {
    $cr=$this->session->userdata('course');
    $sem=$this->session->userdata('sem');
  }

  $data['exam']=$this->exam_model->list_exam($cr,$uid,$sem,$role);
  $data['courses']=$this->course_model->list_course($cr);
  $data['subjects']=array();//$this->subject_model->list_subject();
  $data['semesters']=array();//$this->semester_model->list_sem();
  $this->load->view("header.php");
  $this->load->view("exam.php",$data);
  $this->load->view("footer.php");
}
public function editexam()
{
  $role = $this->session->userdata('role');
  $uid  = $this->session->userdata('user_id');
  $data['role']=$role;
  $data['new']=0;
  $cr=0;
  $sem=0;

  if($role=="USER") {
  	$cr=$this->session->userdata('course');
    $sem=$this->session->userdata('sem');
  }
  $data['exam']=$this->exam_model->list_exam($cr,$uid,$sem,$role);
  $data['courses']=$this->course_model->list_course($cr);
  $data['subjects']=array();//$this->subject_model->list_subject($cr);
  $data['semesters']=array();//$this->semester_model->list_sem();
  $data['exam_i']=$this->exam_model->getexam($this->input->post('i'));
  $this->load->view("header.php");
  $this->load->view("exam.php",$data);
  $this->load->view("footer.php");
}

public function newexam(){

     
  $this->exam_model->newexam($this->input->post('title'),$this->input->post('date'),$this->input->post('time'),$this->input->post('duration'),$this->input->post('subject'),$this->input->post('portion'),$this->input->post('no_question'),$this->input->post('course'),$this->input->post('semester'));
 
  redirect('/exam');

}

public function updateexam(){

     
  $this->exam_model->updateexam($this->input->post('id'),$this->input->post('title'),$this->input->post('date'),$this->input->post('time'),$this->input->post('duration'),$this->input->post('subject'),$this->input->post('portion'),$this->input->post('no_question'),$this->input->post('course'),$this->input->post('semester'));
 
  redirect('/exam');

}
public function fetch_semester(){
  if($this->input->post('course_id'))
  {
   echo $this->course_model->fetch_sem($this->input->post('course_id'));
  }
}

public function fetch_subject(){
  if($this->input->post('sem_id'))
  {
   echo $this->course_model->fetch_subject($this->input->post('sem_id'));
  }
}
public function fetch_sem_subject(){
  if($this->input->post('sem_id'))
  {
   echo $this->course_model->fetch_sem_subject($this->input->post('sem_id'));
  }
}

public function deleteexam(){

    
    $this->exam_model->deleteexam($this->input->post('i'));
 
  redirect('/exam');



}

public function startnow()
{

  $this->load->model('question_model');
  $this->load->model('option_model');

  $exam_id = $this->input->post('iex');
  $exp_time = date_create($this->input->post('exp_time'));

  $exp_time = date_format($exp_time,"m/d/Y H:i:s");

  $uid = $this->session->userdata('user_id');

  $alreadyattended = $this->exam_model->alreadyattended($uid,$exam_id);
  if($alreadyattended==0){

  $this->session->set_userdata('exam_id',$this->input->post('iex'));
   $this->session->set_userdata('exp_time',$exp_time);
  $limit = $this->input->post('limit_qn');


  $qns=$this->question_model->list_question($this->input->post('iex'),1,$limit);
  $this->session->set_userdata('qns',$qns);
  $this->session->set_userdata('qn_no',0);

  $this->exam_model->updatemark($uid,$exam_id,0);

  redirect('/exam/exam_running');
}else{
  $this->load->view("alreadyattended.php");
}

}


public function exam_running()
{

  $this->load->model('question_model');
  $this->load->model('option_model');

  
  $exam_id = $this->session->userdata('exam_id');  
  $exp_time = $this->session->userdata('exp_time'); 

   $this->load->view("header.php");

  if($this->exam_model->isExamExpired($exam_id)>0)
  
  {

    $uid = $this->session->userdata('user_id');

    $qn_no = $this->session->userdata('qn_no');

    
    /*    Answer checking   */

    if($this->input->post('ans')!=null){

      $ans=$this->input->post('ans');
      $opt=$this->input->post('option');

      

      $mark=0;
      if($ans==$opt)
      {
        $mark=1;
        $this->exam_model->updatemark($uid,$exam_id,$qn_no,$mark);
      }
      


    }
    /*    Answer checking   */

    
    $qns = $this->session->userdata('qns');


  if($qn_no<sizeof($qns)){
    
    $qn=$qns[$qn_no];
    $data["qn"]=$qn;

    $option=$this->option_model->list_option($qn["id"],1);
    $data["option"]=$option;

    $qn_no=$qn_no+1;
    $this->session->set_userdata('qn_no',$qn_no);


   $data['exp_time'] = $exp_time;
    $this->load->view("runexam.php",$data);
    

  }
  else{
    //Exam Over
    $this->session->set_userdata('exam_id',null);
    $this->session->set_userdata('exp_time',null);
    $this->session->set_userdata('qn_no',null);
    $this->load->view("examover.php");
  }
}
else{
  //exam expired
  $this->session->set_userdata('exam_id',null);
  $this->session->set_userdata('qn_no',null);
  $this->load->view("examexpired.php");
}
 $this->load->view("footer.php");
  //redirect('/exam/process_exam');

}

public function result(){

    $role = $this->session->userdata('role'); 
    $uid = $this->session->userdata('user_id'); 
    $exam_id = $this->input->post('iex');

    $data["results"] = $this->exam_model->result_list($exam_id,$role,$uid);
 
   $this->load->view("header.php");
   $this->load->view("result.php",$data);
   $this->load->view("footer.php");

}

public function fine(){

    $role = $this->session->userdata('role'); 
    $uid = $this->session->userdata('user_id'); 
    $exam_id = $this->input->post('iex');

    $data["exam_id"] = $exam_id;
 
 
   $this->load->view("finepayment.php",$data);


}

public function fine_payment(){


    $uid = $this->session->userdata('user_id'); 
    $exam_id = $this->input->post('exam_id'); 
    $fee = $this->input->post('fee'); 
    $card_type = $this->input->post('card_type'); 
    $card_name = $this->input->post('card_name'); 
    $card_no = $this->input->post('card_no'); 
    $cvv = $this->input->post('cvv'); 
    $exp_year = $this->input->post('exp_year'); 
    $exp_month = $this->input->post('exp_month');

    $status = $this->exam_model->fine_payment($exam_id,$uid,$fee,$card_type,$card_name,$card_no,$cvv,$exp_year,$exp_month);

    if( $status == 1 ) {
      $this->load->view("successpay.php");

    }
    else{
      $this->load->view("failurepay.php");

    }

}

public function pay()
  {
    $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
    /**
     * You can calculate payment amount as per your logic
     * Always set the amount from backend for security reasons
     */
    

    $exam_id = $this->input->post('iex'); 
    $fee = 500;//$this->input->post('fee'); 
    $_SESSION['payable_amount'] = $fee;
    $_SESSION['exam_id'] = $exam_id;

    $razorpayOrder = $api->order->create(array(
      'receipt'         => rand(),
      'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
      'currency'        => 'INR',
      'payment_capture' => 1 // auto capture
    ));


    $amount = $razorpayOrder['amount'];

    $razorpayOrderId = $razorpayOrder['id'];

    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

    $data = $this->prepareData($amount,$razorpayOrderId);

    $this->load->view('rezorpay',array('data' => $data));
  }

  /**
   * This function verifies the payment,after successful payment
   */
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
      $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
    try {
        $attributes = array(
          'razorpay_order_id' => $_SESSION['razorpay_order_id'],
          'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
      } catch(SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay_Error : ' . $e->getMessage();
      }
    }
    if ($success === true) {
      /**
       * Call this function from where ever you want
       * to save save data before of after the payment
       */
    //  $this->setRegistrationData();
      $exam_id= $_SESSION['exam_id'];
      $uid= $_SESSION['user_id'];
      $fee= $_SESSION['payable_amount'];


      $status = $this->exam_model->fine_pay($exam_id,$uid,$fee);

      $this->session->set_userdata('exam_id',null);
      $this->session->set_userdata('payable_amount',null);
      
      redirect(base_url().'exam/success');
    }
    else {
      redirect(base_url().'exam/paymentFailed');
    }
  }

  /**
   * This function preprares payment parameters
   * @param $amount
   * @param $razorpayOrderId
   * @return array
   */
  public function prepareData($amount,$razorpayOrderId)
  {
    $data = array(
      "key" => RAZOR_KEY,
      "amount" => $amount,
      "name" => "Online Exam",
      "description" => "Exam not Attending Fee",
      "image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
      "prefill" => array(
        "name"  => $this->input->post('name'),
        "email"  => $this->input->post('email'),
        "contact" => $this->input->post('contact'),
      ),
      "notes"  => array(
        "address"  => "Hello World",
        "merchant_order_id" => rand(),
      ),
      "theme"  => array(
        "color"  => "#F37254"
      ),
      "order_id" => $razorpayOrderId,
    );
    return $data;
  }

  public function success()
  {
    $this->load->view("successpay.php");
  }
  /**
   * This is a function called when payment failed,
   * and shows the error message
   */
  public function paymentFailed()
  {
    $this->load->view("failurepay.php");
  }


}

?>