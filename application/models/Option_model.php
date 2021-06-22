<?php
class Option_model extends CI_model{
 
 
 
public function newoption($qn,$option,$ans){
 
 
    $qry="insert into tbl_option(question,option) values(".$qn.",'".$option."')";
    $query = $this->db->query($qry);

if($ans==1){
    $qry="select id from tbl_option where question=".$qn." and option='".$option."'";
    $query = $this->db->query($qry);

    $result = $query->result_array();

    $qry="update tbl_question set ans=".$result[0]["id"]." where Id=".$qn;
    $query = $this->db->query($qry);
}
 
}
public function updateoption($id,$qn,$option,$ans){
 
 
    $qry="update tbl_option set question=".$qn.",option='".$option."' where id=".$id;
    $query = $this->db->query($qry);
    if($ans==1){
    $qry="update tbl_question set ans=".$id." where Id=".$qn;
    $query = $this->db->query($qry);
 }
}
public function deleteoption($id){ 
  $qry="delete from tbl_option where Id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_option($qid,$r=0){//question based
  $result=array();
 
    $qry="select o.*,q.qn,q.ans from tbl_option as o join tbl_question as q on o.question=q.Id where q.Id=".$qid;
    if($r!=0){$qry.=" ORDER BY RAND() ";}
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function getoption($id){//option id
  $result=array();
 
    $qry="select o.*,q.qn,q.ans from tbl_option as o join tbl_question as q on o.question=q.Id where o.id=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}
 
 
}
 
 
?>