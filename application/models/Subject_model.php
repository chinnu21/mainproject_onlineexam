<?php
class Subject_model extends CI_model{
 
 
 
public function newsubject($name,$course,$sem){
 
 
    $qry="insert into tbl_subject(name,course,sem) values('".$name."',".$course.",".$sem.")";
    $query = $this->db->query($qry);
 
}
public function updatesubject($id,$name,$course,$sem){
 
 
    $qry="update tbl_subject set name='".$name."',course=".$course.",sem=".$sem." where id=".$id;
    $query = $this->db->query($qry);
 
}
public function deletesubject($id){ 
  $qry="delete from tbl_subject where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_subject($course=0,$role,$uid=0,$sem=0){
  $result=array();
 
    $qry="select s.*,c.name as course_name,sem.sem as sem_name from tbl_subject as s join tbl_course as c on s.course=c.id join tbl_sem as sem on s.sem=sem.Id";
    if($role == 'USER'){
        if($sem>0){ $qry=$qry." where s.sem=".$sem;}
    }
    if($role == 'FACULTY'){
        $qry=$qry." where s.id IN(select subject from tbl_faculty_subject where userid=".$uid.")";
    }
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function getsubject($id){
  $result=array();
 
    $qry="select s.* from tbl_subject as s where id=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

 
public function list_facultysubject($id){
  $result=array();

 
    $qry="select s.Id,ss.name,c.name as course_name,sem.sem as sem_name from tbl_faculty_subject as s join tbl_subject as ss on s.subject=ss.Id join tbl_course as c on s.course=c.id join tbl_sem as sem on s.sem=sem.Id where s.userid=".$id;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function newfacultysubject($faculty,$course,$sem,$subject){
 
 
    $qry="insert into tbl_faculty_subject(course,sem,subject,userid) values(".$course.",".$sem.",".$subject.",".$faculty.")";
    $query = $this->db->query($qry);
 
}

public function updatefacultysubject($id,$faculty,$course,$sem,$subject){
 
 
    $qry="update tbl_faculty_subject set course=".$course.",sem=".$sem.",subject=".$subject.",userid=".$faculty." where id=".$id;
    $query = $this->db->query($qry);
 
}
 
 public function deletefacultysubject($id){
 
 
    $qry="delete from tbl_faculty_subject where id=".$id;
    $query = $this->db->query($qry);
 
}
 
}
 
 
?>