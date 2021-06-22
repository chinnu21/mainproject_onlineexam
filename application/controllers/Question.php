<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
        $this->load->model('subject_model');
        $this->load->model('question_model');
        $this->load->library('session');
        $role = $this->session->userdata('role');
  if($role==null){
    redirect('user/home');
  }

}

public function index()
{
  $pr=0;
  if($this->input->post('pr')!==null) {$pr=$this->input->post('pr');}
  $data['iex']=$this->input->post('iex');
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['new']=1;

  if($pr==1) {$this->question_model->newquestion($this->input->post('qn'),$this->input->post('iex'));}
  if($pr==2) {$this->question_model->updatequestion($this->input->post('id'),$this->input->post('qn'),$this->input->post('iex'));}
  if($pr==3) {$this->question_model->deletequestion($this->input->post('i'));}
  //$data['subjects']=$this->subject_model->list_subject();
  $data['questions']=$this->question_model->list_question($this->input->post('iex'));
  $this->load->view("header.php");
  $this->load->view("question.php",$data);
  $this->load->view("footer.php");
}
public function editquestion()
{
  $data['iex']=$this->input->post('iex');
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['new']=0;
  //$data['subjects']=$this->subject_model->list_subject();
  $data['questions']=$this->question_model->list_question($this->input->post('iex'));
  $data['question']=$this->question_model->getquestion($this->input->post('i'));
  $this->load->view("header.php");
  $this->load->view("question.php",$data);
  $this->load->view("footer.php");
}

public function newquestion(){

     
  
 
  redirect('/Question');

}
public function updatequestion(){

     
  $this->question_model->updatequestion($this->input->post('id'),$this->input->post('qn'),$this->input->post('subj'));
 
  redirect('/Question');

}

public function deletequestion(){

    
    
 
  redirect('/Question');



}

}

?>