<?php
class Semester_model extends CI_model{
 
 
 
public function newsem($course,$sem){
 
 
    $qry="insert into tbl_sem(course,sem) values(".$course.",'".$sem."')";
    $query = $this->db->query($qry);
 
}
public function updatesem($id,$course,$sem){
 
 
    $qry="update tbl_sem set course=".$course.",sem='".$sem."' where id=".$id;
    $query = $this->db->query($qry);
 
}
public function deletesem($id){ 
  $qry="delete from tbl_sem where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_sem($course=0){
  $result=array();
 
    $qry="select s.*,c.name as course_name from tbl_sem as s join tbl_course as c on s.course=c.id ";
    if($course>0){ $qry=$qry." where c.id=".$course;}

    $qry.=" order by c.id";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function getsem($id){
  $result=array();
 
    $qry="select s.* from tbl_sem as s where id=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}
 
 
}
 
 
?>