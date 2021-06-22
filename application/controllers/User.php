<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->model('course_model');
        $this->load->model('semester_model');
        $this->load->library('session');

}

public function index()
{

  $data['courses']=$this->course_model->list_course();
$this->load->view("register.php",$data);
}

public function register_user(){

   /* $config['upload_path'] = 'uploads/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['file_name'] = $_FILES['photo']['name'];
                
                //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('photo')){
        $uploadData = $this->upload->data();
        $picture = $uploadData['file_name'];
    }else{
        $picture = '';
    }*/
$picture = '';
     $user=array(
      'fname'=>$this->input->post('txtfname'),
      'lname'=>$this->input->post('txtlname'),
      'address'=>$this->input->post('txtaddress'),
      'contact'=>$this->input->post('txtcontact'),
      'email'=>$this->input->post('txtemail'),
      'dob'=>$this->input->post('txtdob'),
      'gender'=>$this->input->post('gender'),
'photo'=>$picture,
      'username'=>$this->input->post('txtusername'),
      'password'=>$this->input->post('txtpassword'),
      'course'=>$this->input->post('course'),
      'sem'=>$this->input->post('sem'),
      'role'=>'USER'
        );
        print_r($user);

//$email_check=$this->user_model->email_check($user['user_email']);

if(true){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('user');


}

}

public function register_faculty_action(){

    /*$config['upload_path'] = 'uploads/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['file_name'] = $_FILES['photo']['name'];
                
                //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('photo')){
        $uploadData = $this->upload->data();
        $picture = $uploadData['file_name'];
    }else{
        $picture = '';
    }*/
$picture = '';
     $user=array(
      'name'=>$this->input->post('txtfname'),
      
      'address'=>$this->input->post('txtaddress'),
      'contact'=>$this->input->post('txtcontact'),
      'email'=>$this->input->post('txtemail'),
      'dob'=>$this->input->post('txtdob'),
      'gender'=>$this->input->post('gender'),
'photo'=>$picture,
      'username'=>$this->input->post('txtusername'),
      'password'=>$this->input->post('txtpassword'),
      'qualification'=>$this->input->post('course'),
      'role'=>'FACULTY'
        );
        print_r($user);

//$email_check=$this->user_model->email_check($user['user_email']);

if(true){
  $this->user_model->register_faculty($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('user');


}

}

public function login_view(){


$this->load->view("login.php");

}
public function faculty_login(){


$this->load->view("faculty_login.php");

}

public function register_faculty(){


$this->load->view("header.php");
$this->load->view("register_faculty.php");
$this->load->view("footer.php");

}

public function edit_faculty(){

$id = $this->input->post('i');

  $data['faculty']=$this->user_model->list_faculty($id);
$this->load->view("header.php");
$this->load->view("edit_faculty.php",$data);
$this->load->view("footer.php");

}


public function edit_faculty_action(){
/*
    $config['upload_path'] = 'uploads/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['file_name'] = $_FILES['photo']['name'];
                
                //Load upload library and initialize configuration
    $this->load->library('upload',$config);
    $this->upload->initialize($config);

    if($this->upload->do_upload('photo')){
        $uploadData = $this->upload->data();
        $picture = $uploadData['file_name'];
    }else{
        $picture = '';
    }
*/
     $picture = '';
     $user=array(
      'userid'=>$this->input->post('userid'),
      'name'=>$this->input->post('txtfname'),
      'address'=>$this->input->post('txtaddress'),
      'contact'=>$this->input->post('txtcontact'),
      'email'=>$this->input->post('txtemail'),
      'dob'=>$this->input->post('txtdob'),
      'gender'=>$this->input->post('gender'),
'photo'=>$picture,
      'username'=>$this->input->post('txtusername'),
      'password'=>$this->input->post('txtpassword'),
      'qualification'=>$this->input->post('course'),
      'role'=>'FACULTY'
        );
        print_r($user);

//$email_check=$this->user_model->email_check($user['user_email']);

if(true){
  $this->user_model->update_faculty($user);
  redirect('user/faculty');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('user');


}

}


function login_user(){ 
  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>$this->input->post('user_password')

    ); 
//$user_login['user_email'],$user_login['user_password']
    $users=$this->user_model->login_user($user_login);
   // $this->session->set_flashdata('error2_msg', $data);
      if($users)
      {
        $this->session->set_userdata('course',$users[0]['course']);
        $this->session->set_userdata('sem',$users[0]['sem']);
        $this->session->set_userdata('user_id',$users[0]['userid']);
        $this->session->set_userdata('role',$users[0]['role']);
        if($users[0]['role'] == 'ADMIN') redirect('Course/');
        if($users[0]['role'] == 'USER') redirect('Exam/');
        if($users[0]['role'] == 'FACULTY') redirect('Exam/');
      
      }
     else{
       $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
       redirect('user/login_view', 'refresh');

      }


}

function login_faculty(){ 
  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>$this->input->post('user_password')

    ); 
//$user_login['user_email'],$user_login['user_password']
    $users=$this->user_model->login_faculty($user_login);
   // $this->session->set_flashdata('error2_msg', $data);
      if($users)
      {
        $this->session->set_userdata('user_id',$users[0]['userid']);
        $this->session->set_userdata('role',$users[0]['role']);
		    redirect('Course/');
      
      }
     else{
       $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
       redirect('user/faculty_login', 'refresh');

      }


}

public function faculty()
{
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $cr=0;
  if($role=="USER") $cr=$this->session->userdata('course');
  $data['faculty']=$this->user_model->list_faculty(0,$cr);
  $this->load->view("header.php");
  $this->load->view("faculty.php",$data);
  $this->load->view("footer.php");
}

public function studentprofile()
{
  $role = $this->session->userdata('role');
  $uid  = $this->input->post('uid');
  $data['role']=$role;

  $subj=0;
  if( $this->input->post('subj')!=null){
    $subj= $this->input->post('subj');
  }
  $data['subj'] = $subj;
  
  $data['users']=$this->user_model->studentinfo(  $uid );
  $exam=$this->user_model->studentexaminfo(  $uid );

  $datapoints =array();
  foreach($exam as $key => $val){
    $row = array("y" => $val['mark'], "label" => $val['subject_name'].'-'.$val['title'] );
    array_push($datapoints,$row);
  }


  $data['dataPoints']=$datapoints;
  $data['exam'] = $exam;
  $this->load->view("header.php");
  $this->load->view("studentprofile.php",$data);
  $this->load->view("footer.php");
}

public function fetch_student(){
  $uid = $this->session->userdata('user_id');
  $role = $this->session->userdata('role');
    if($this->input->post('course_id'))
  {
   echo $this->user_model->fetch_student($this->input->post('course_id'),$uid,$role);
  }
}

public function users()
{
  $role = $this->session->userdata('role');
  $uid  = $this->session->userdata('user_id');
  $data['role']=$role;
  $data['msg'] ='';
  $subj=0;
  if($this->input->post('subject')!=null){
    $subj=$this->input->post('subject');
  }
  if($this->input->get('subj')!=null){ // from profile page
    $subj=$this->input->get('subj');
  }

$pr='';
  if($this->input->post('pr')!=null){
    $pr=$this->input->post('pr');
   
  }

  if($pr == 'update'){
    if($this->input->post('password') == $this->input->post('repassword')){
      $this->user_model->updateuser($this->input->post('fname'),$this->input->post('lname'),$this->input->post('address'),$this->input->post('email'),$this->input->post('contact'),$this->input->post('gender'),$this->input->post('dob'),$this->input->post('username'),$this->input->post('password'),$this->input->post('course'),$this->input->post('sem'),$uid);
}else{ $data['msg'] == 'Password mismatch';}
}


$users=$this->user_model->list_user($subj,$role,$uid);
$data['users']=$users;

 if($pr == 'edit'){
       $data['courses']=$this->course_model->list_course();
       $data['sem']=$this->semester_model->list_sem($users[0]['course']);
}




 $data['pr'] = $pr;
 $data['subj'] = $subj;

  $this->load->view("header.php");
  $this->load->view("users.php",$data);
  $this->load->view("footer.php");
}

function user_profile(){
$this->load->view("header.php");
$this->load->view('user_profile.php');
$this->load->view("footer.php");

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}

 function home(){
$this->load->view("home.php");


}}

?>