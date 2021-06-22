<?php
class Question_model extends CI_model{
 
 
 
public function newquestion($qn,$subj){
 
 
    $qry="insert into tbl_question(qn,exam) values('".$qn."',".$subj.")";
    $query = $this->db->query($qry);
 
}
public function updatequestion($id,$qn,$subj){
 
 
    $qry="update tbl_question set qn='".$qn."',exam=".$subj." where id=".$id;
    $query = $this->db->query($qry);
 
}
public function deletequestion($id){ 
  $qry="delete from tbl_question where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_question($exam,$r=0,$limit=0){
  $result=array();
 
    $qry="select q.*,e.no_question from tbl_question as q  join tbl_exam as e on q.exam=e.Id where q.exam=".$exam;
    if($r!=0){$qry.=" ORDER BY RAND() LIMIT ".$limit;}
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function getquestion($id){
  $result=array();
 
    $qry="select q.* from tbl_question as q  where q.id=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}
 
 
}
 
 
?>