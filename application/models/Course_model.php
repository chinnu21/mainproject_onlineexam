<?php
class Course_model extends CI_model{
 
 
 
public function newcourse($name){
 
 
    $qry="insert into tbl_course(name) values('".$name."')";
    $query = $this->db->query($qry);
 
}
public function deletecourse($id){ 
  $qry="delete from tbl_course where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_course(){
  $result=array();
 
    $qry="select * from tbl_course";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

 public function getcourse($id){
  $result=array();
 
    $qry="select * from tbl_course where id=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}
public function fetch_subject($course_id)
 {
  $qry="select * from tbl_subject where course=".$course_id;
  $query = $this->db->query($qry);
  $output = '<option value="-1">Select</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }

 public function fetch_sem($course_id)
 {
  $qry="select * from tbl_sem where course=".$course_id;
  $query = $this->db->query($qry);
  $output = '<option value="-1">Select</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->sem.'</option>';
  }
  return $output;
 }

  public function fetch_sem2($course_id)
 {
  $qry="select * from tbl_sem where course=".$course_id;
  $query = $this->db->query($qry);
  $output = '';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->sem.'</option>';
  }
  return $output;
 }

  public function fetch_sem_subject($sem_id)
 {
  $qry="select * from tbl_subject where sem=".$sem_id;
  $query = $this->db->query($qry);
  $output = '<option value="-1">Select</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }

public function updatecourse($id,$name){
  $result=array();
 
    $qry="update tbl_course set name='".$name."' where id=".$id;
    $query = $this->db->query($qry);


 
}
 
}
 
 
?>