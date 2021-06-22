<?php
class Exam_model extends CI_model{
 
 
 
public function newexam($title,$exam_date,$exam_time,$duration,$subject,$portion,$no_question,$course,$sem){
 
 
    $qry="insert into tbl_exam(title,exam_date,exam_time,duration,subject,`portion`,no_question,course,sem) values('".$title."','".$exam_date."','".$exam_time."','".$duration."',".$subject.",'".$portion."',".$no_question.",".$course.",".$sem.")";
    $query = $this->db->query($qry);

    $hr=intval($duration/60);
    $mn=0;
    if($duration>($hr*60))
        $mn = $duration-($hr*60);
    $qry=" update tbl_exam set exp_time=addtime( STR_TO_DATE(concat(exam_date,concat(' ',exam_time)),'%Y-%m-%d %H:%i'),'".$hr.":".$mn.":00') where id=LAST_INSERT_ID()";
    $query = $this->db->query($qry);
     
 
}

public function updateexam($id,$title,$exam_date,$exam_time,$duration,$subject,$portion,$no_question,$course,$sem){
 
 
    $qry="update tbl_exam set title='".$title."',exam_date='".$exam_date."',exam_time='".$exam_time."',duration='".$duration."',subject=".$subject.",`portion`='".$portion."',no_question=".$no_question.",course=".$course.",sem=".$sem." where id=".$id;
    $query = $this->db->query($qry);

    $hr=intval($duration/60);
    $mn=0;
    if($duration>($hr*60))
        $mn = $duration-($hr*60);
    $qry=" update tbl_exam set exp_time=addtime( STR_TO_DATE(concat(exam_date,concat(' ',exam_time)),'%Y-%m-%d %H:%i'),'".$hr.":".$mn.":00') where id=".$id;
    $query = $this->db->query($qry);
     
 
}

public function deleteexam($id){ 
  $qry="delete from tbl_exam where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_exam($course=0,$uid=0,$sem=0,$role){
  $result=array();
 
   // $qry="select e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id";
  $qry1="(select 0 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() between concat(e.exam_date,concat(' ',e.exam_time)) AND e.exp_time )";
        $qry2="(select 1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() < concat(e.exam_date,concat(' ',e.exam_time)) )";
        $qry3="(select -1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time )";

    if($role=='USER'){ 
        $qry1="(select 0 as attended,0 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() between concat(e.exam_date,concat(' ',e.exam_time)) AND e.exp_time  and e.Id not in(SELECT exam from tbl_result where userid=".$uid.") and e.course=".$course." and e.sem=".$sem.")";
        $qry1_1="(select 1 as attended,0 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() between concat(e.exam_date,concat(' ',e.exam_time)) AND e.exp_time  and e.Id in(SELECT exam from tbl_result where userid=".$uid.") and e.course=".$course." and e.sem=".$sem.")";
        $qry2="(select -1 as attended,1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() < concat(e.exam_date,concat(' ',e.exam_time)) and e.course=".$course." and e.sem=".$sem.")";
        $qry3="(select 1 as attended,-1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time and e.Id in(SELECT exam from tbl_result where userid=".$uid.") and e.course=".$course." and e.sem=".$sem.")";
        $qry4="(select 0 as attended,-1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time and e.Id not in(SELECT exam from tbl_result where userid=".$uid.") and e.Id not in(SELECT exam from tbl_payment where userid=".$uid.") and e.course=".$course." and e.sem=".$sem.")";
        $qry4_1="(select 2 as attended,-1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time and e.Id not in(SELECT exam from tbl_result where userid=".$uid.") and e.Id in(SELECT exam from tbl_payment where userid=".$uid.") and e.course=".$course." and e.sem=".$sem.")";

        $qry=$qry1." UNION ALL ".$qry1_1." UNION ALL ".$qry2." UNION ALL ".$qry3." UNION ALL ".$qry4." UNION ALL ".$qry4_1;

        
    /*
    select e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() between concat(e.exam_date,concat(' ',e,exam_time)) AND e.exp_time    startnow

    select e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() < concat(e.exam_date,concat(' ',e.exam_time))       future

select e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time  expired

select 0 as attended, e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id where now() > e.exp_time and e.Id not in(SELECT exam from tbl_result where userid=1)

    */
}
else if($role=='FACULTY'){
    $qry1="(select 0 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id join tbl_faculty_subject as fs on e.subject=fs.subject where fs.userid=".$uid." and now() between concat(e.exam_date,concat(' ',e.exam_time)) AND e.exp_time )";
    $qry2="( select 1 as running, e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id join tbl_faculty_subject as fs on e.subject=fs.subject where fs.userid=".$uid." and now() < concat(e.exam_date,concat(' ',e.exam_time)) )";
    $qry3="(select -1 as running,e.*,s.name as subject_name,c.name as course_name,sem.sem from tbl_exam as e join tbl_subject as s on e.subject=s.id join tbl_course as c on e.course=c.id join tbl_sem as sem on e.sem=sem.Id join tbl_faculty_subject as fs on e.subject=fs.subject where fs.userid=".$uid." and now() > e.exp_time )";
    $qry=$qry1." UNION ALL ".$qry2." UNION ALL ".$qry3;

}
else{
    $qry=$qry1." UNION ALL ".$qry2." UNION ALL ".$qry3;
}
    
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function result_list($exam_id,$role,$uid){
  $result=array();
 
    $qry="select r.*,u.fname,u.lname,u.address,u.email,u.contact from tbl_result as r join tbl_user as u on r.userid=u.userid where r.exam=".$exam_id;

    if($role == 'USER') { $qry .= " and r.userid=".$uid ;  }

    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function getexam($i){
  $result=array();
 
    $qry="select e.*,s.name as subject_name from tbl_exam as e join tbl_subject as s on e.subject=s.id where e.Id=".$i;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function isExamExpired($exam_id){
  
 
    $qry="select e.* from tbl_exam as e where now() < e.exp_time and e.Id=".$exam_id;
    $query = $this->db->query($qry);
 
    return $query->num_rows();
 
}

public function alreadyattended($uid,$exam_id){
    $qry="select * from tbl_result where userid=".$uid." and exam=".$exam_id;
    $query = $this->db->query($qry);
    return $query->num_rows();
}

public function updatemark($uid,$exam_id,$qn_no,$mark=0){
    $qry="select * from tbl_result where userid=".$uid." and exam=".$exam_id;
    $query = $this->db->query($qry);
 
    
    if($query->num_rows()==0){
        $qry="insert into tbl_result(userid,exam,mark,exam_date) values(".$uid.",".$exam_id.",".$mark.",curdate())";
        $query = $this->db->query($qry);
    }
    else{
        $qry="update tbl_result set mark=mark+".$mark." where userid=".$uid." and exam=".$exam_id;
        $query = $this->db->query($qry);
    }
    return;
}

public function fine_payment($exam_id,$uid,$fee,$card_type,$card_name,$card_no,$cvv,$exp_year,$exp_month){ 

    $status =0;
    $qry="select * from tbl_bank where nameoncard='".$card_name."' and cardtype='".$card_type."' and exp_month='".$exp_month."' and exp_year='".$exp_year."' and cvv='".$cvv."' and balance > ".$fee." and cardno='".$card_no."'";
    $query = $this->db->query($qry);
    if($query->num_rows()>0){
        $qry="insert into tbl_payment(userid,exam,paid_date,fee) values(".$uid.",".$exam_id.",curdate(),".$fee.")";
        $query = $this->db->query($qry);
        $status = 1;

        $qry="update tbl_bank set balance=balance-".$fee." where nameoncard='".$card_name."' and cardtype='".$card_type."' and exp_month='".$exp_month."' and exp_year='".$exp_year."' and cvv='".$cvv."' and balance > ".$fee." and cardno='".$card_no."'";
        $this->db->query($qry);
    }
    return $status;
 
}

public function fine_pay($exam_id,$uid,$fee){ 

    $status =0;
    
        $qry="insert into tbl_payment(userid,exam,paid_date,fee) values(".$uid.",".$exam_id.",curdate(),".$fee.")";
        $query = $this->db->query($qry);
        $status = 1;

       
    return $status;
 
}


 
 
}
 
 
?>