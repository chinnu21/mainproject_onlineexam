<?php
class User_model extends CI_model{
 
 
 
public function register_user($user){
 
 
$this->db->insert('tbl_user', $user);
 
}

public function register_faculty($user){
 
 
$this->db->insert('tbl_faculty', $user);
 
}
 
 public function update_faculty($user){
 
 $this->db->where('userid', $user['userid']);
 $this->db->update('tbl_faculty',$user);
 
}
public function login_user($user_login){
  $result=array();
 
  $qry="select * from tbl_user where email='".$user_login['user_email']."' and password='".$user_login['user_password']."'";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function login_faculty($user_login){
  $result=array();
 
  $qry="select * from tbl_faculty where email='".$user_login['user_email']."' and password='".$user_login['user_password']."'";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function list_faculty($id,$course=0){
  $result=array();
 
  $qry="select * from tbl_faculty where 1=1";
  if($id>0) $qry=$qry." and userid=".$id;

  if($course>0) $qry =" select f.* from tbl_faculty as f join tbl_faculty_subject as fs on f.userid=fs.userid where fs.course=".$course;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function list_user($subj=0,$role=-1,$uid=-1){
  $result=array();
 
    $qry="select u.*,c.name as course_name,sm.sem as sem_name from tbl_user as u join tbl_course as c on u.course=c.Id join tbl_sem as sm on u.sem=sm.Id where u.role='USER' ";

if($subj!=0){
  $qry="select u.*,c.name as course_name,sm.sem as sem_name from tbl_user as u join tbl_course as c on u.course=c.Id join tbl_sem as sm on u.sem=sm.Id join tbl_subject as sb on u.sem=sb.sem where u.role='USER' and sb.Id=".$subj;

}
if($role == "USER"){
  $qry .= " and u.userid=".$uid;
}

$qry .=" order by u.course,u.sem";

    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}




public function studentinfo($uid){
  $result=array();
 
    $qry="select u.*,c.name as course_name,sm.sem as sem_name from tbl_user as u join tbl_course as c on u.course=c.Id join tbl_sem as sm on u.sem=sm.Id where u.role='USER' and u.userid=".$uid;

    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function studentexaminfo($uid){
  $result=array();
 $qry="select r.mark,e.title,e.exam_date,e.exam_time,c.name as course_name,s.name as subject_name, sm.sem as sem_name from tbl_result as r join tbl_exam as e on r.exam=e.Id join tbl_course as c on e.course=c.id join tbl_subject as s on e.subject=s.id join tbl_sem as sm on e.sem=sm.id where r.userid=".$uid;

    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function updateuser($fname,$lname,$address,$email,$contact,$gender,$dob,$username,$password,$course,$sem,$uid){

  $qry = "update tbl_user set fname='".$fname."',lname='".$lname."',address='".$address."',email='".$email."',contact='".$contact."',gender='".$gender."',dob='".$dob."',username='".$username."',password='".$password."',course=".$course.",sem=".$sem." where userid=".$uid;
  $query = $this->db->query($qry);

}


public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('tbl_user');
  $this->db->where('user_email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
 
 
}
 
 
?>