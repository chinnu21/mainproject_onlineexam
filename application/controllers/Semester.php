<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Semester extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('semester_model');
        $this->load->model('course_model');
        $this->load->library('session');
        $role = $this->session->userdata('role');
  if($role==null){
    redirect('user/home');
  }

}

public function index()
{
  //$course_id=$this->input->post('course_id')
  //$data['role']=$role;
  $data['new']=1;
  $data['courses']=$this->course_model->list_course();
  $cr=0;
  if($this->session->userdata('role')=="USER") $cr=$this->session->userdata('course');
  $data['semesters']=$this->semester_model->list_sem($cr);
  $this->load->view("header.php");
  $this->load->view("sem.php",$data);
  $this->load->view("footer.php");
}
public function editsem()
{
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['new']=0;
  $data['courses']=$this->course_model->list_course();
  $cr=0;
  if($role=="USER") $cr=$this->session->userdata('course');
  $data['semesters']=$this->semester_model->list_sem($cr);
  $data['semester']=$this->semester_model->getsem($this->input->post('i'));
  $this->load->view("header.php");
  $this->load->view("sem.php",$data);
  $this->load->view("footer.php");
}

public function newsem(){

     
  $this->semester_model->newsem($this->input->post('course'),$this->input->post('name'));
 
  redirect('/semester');

}
public function updatesem(){

     
  $this->semester_model->updatesem($this->input->post('id'),$this->input->post('course'),$this->input->post('name'));
 
  redirect('/semester');

}

public function deletesem(){

    
    $this->semester_model->deletesem($this->input->post('i'));
 
  redirect('/semester');



}

}

?>