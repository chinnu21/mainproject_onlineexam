<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('course_model');
        $this->load->library('session');

}

public function index()
{
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['courses']=$this->course_model->list_course();
  $data['new']=1;
  $this->load->view("header.php");
  $this->load->view("course.php",$data);
  $this->load->view("footer.php");
}

public function newcourse(){

     
  $this->course_model->newcourse($this->input->post('name'));
 
  redirect('/course');

}
public function updatecourse(){

     
  $this->course_model->updatecourse($this->input->post('id'),$this->input->post('name'));
 
  redirect('/course');

}

public function deletecourse(){

    
    $this->course_model->deletecourse($this->input->post('i'));
 
  redirect('/course');



}

public function editcourse(){

    
    $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['courses']=$this->course_model->list_course();
  $data['course']=$this->course_model->getcourse($this->input->post('i'));
  $data['new']=0;
  $this->load->view("header.php");
  $this->load->view("course.php",$data);
  $this->load->view("footer.php");



}

public function fetch_sem(){
  if($this->input->post('course_id'))
  {
   echo $this->course_model->fetch_sem($this->input->post('course_id'));
  }
}
public function fetch_sem2(){
  if($this->input->post('course_id'))
  {
   echo $this->course_model->fetch_sem2($this->input->post('course_id'));
  }
}

public function fetch_sem_subject(){
  if($this->input->post('sem_id'))
  {
   echo $this->course_model->fetch_sem_subject($this->input->post('sem_id'));
  }
}
}

?>