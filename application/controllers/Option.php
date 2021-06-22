<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
        $this->load->model('question_model');
        $this->load->model('option_model');
        $this->load->library('session');
        $role = $this->session->userdata('role');
  if($role==null){
    redirect('user/home');
  }

}

public function index()
{
  
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['new']=1;

  


 $process=0;
 if($this->input->post('pr')!=null){
  $process=$this->input->post('pr');
 }

//new 
if($process ==1){
  $this->option_model->newoption($this->input->post('qid'),$this->input->post('option'),$this->input->post('answer'));
}
//update
else if($process ==2){
  $this->option_model->updateoption($this->input->post('id'),$this->input->post('qid'),$this->input->post('option'),$this->input->post('answer'));
}
//delete
else if($process ==3){
  $this->option_model->deleteoption($this->input->post('i'));
}


  $data['question']=$this->question_model->getquestion($this->input->post('qid'));
  $data['options']=$this->option_model->list_option($this->input->post('qid'));
  $this->load->view("header.php");
  $this->load->view("option.php",$data);
  $this->load->view("footer.php");
}
public function editoption()
{
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['new']=0;
  $data['question']=$this->question_model->getquestion($this->input->post('qid'));
  
  $data['option']=$this->option_model->getoption($this->input->post('i'));
  $data['options']=$this->option_model->list_option($this->input->post('qid'));
  $this->load->view("header.php");
  $this->load->view("option.php",$data);
  $this->load->view("footer.php");
}

}

?>