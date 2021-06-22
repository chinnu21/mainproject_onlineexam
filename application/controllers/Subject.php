<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('subject_model');
        $this->load->model('course_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $role = $this->session->userdata('role');
  if($role==null){
    redirect('user/home');
  }

}

public function index()
{
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
  $data['subjects']=$this->subject_model->list_subject($cr,$role,$uid,$sem);
  $data['courses']=$this->course_model->list_course();
  
  $this->load->view("header.php");
  $this->load->view("subject.php",$data);
  $this->load->view("footer.php");
}
public function editsubject()
{
  $role = $this->session->userdata('role');
  $uid  = $this->session->userdata('user_id');
  $data['role']=$role;
  $data['new']=0;
  $data['courses']=$this->course_model->list_course();
  $cr=0;
  $sem=0;
  if($role=="USER") {
    $cr=$this->session->userdata('course');
    $sem=$this->session->userdata('sem');
  }
  $data['subjects']=$this->subject_model->list_subject($cr,$role,$uid,$sem);
  $data['subject']=$this->subject_model->getsubject($this->input->post('i'));
  $this->load->view("header.php");
  $this->load->view("subject.php",$data);
  $this->load->view("footer.php");
}

public function newsubject(){

     if($this->input->post('sem')!='-1')
  $this->subject_model->newsubject($this->input->post('name'),$this->input->post('course'),$this->input->post('sem'));
 
  redirect('/subject');

}
public function updatesubject(){

     if($this->input->post('sem')!='-1')
  $this->subject_model->updatesubject($this->input->post('id'),$this->input->post('name'),$this->input->post('course'),$this->input->post('sem'));
 
  redirect('/subject');

}

public function deletesubject(){

    
    $this->subject_model->deletesubject($this->input->post('i'));
 
  redirect('/subject');



}

public function faculty_subject(){
    $id=$this->input->post('faculty');
    $process=0;
    $data['new']=1;
    if($this->input->post('pr')){$process=$this->input->post('pr');}

    if($process==1){//new
       $this->subject_model->newfacultysubject($id,$this->input->post('course'),$this->input->post('sem'),$this->input->post('subject'));

    }/*
    if($process==2){//edit
      $data['new']=0;
      
    }
    if($process==3){//update
       $this->subject_model->updatefacultysubject($this->input->post('i'),$id,$this->input->post('course'),$this->input->post('sem'),$this->input->post('subject'));
    }*/
    if($process==4){//delete
       $this->subject_model->deletefacultysubject($this->input->post('i'));      
    }
  
  
    $data['courses']=$this->course_model->list_course();
    $data['facultyinfo']=$this->user_model->list_faculty($id);
    $data['result']=$this->subject_model->list_facultysubject($id);

    $this->load->view("header.php");
  $this->load->view("faculty_subject.php",$data);
  $this->load->view("footer.php");

  }


}

?>