<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$student = json_decode($postdata);
$result = $mm_school_student -> editStudent($student->stu_id, $student->stu_name, $student->stu_father, $student->stu_birth, $student->stu_gender, $student->stu_add, $student->stu_phone, $student->stu_grade);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
// echo json_encode($result);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
