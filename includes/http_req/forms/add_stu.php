<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$student = json_decode($postdata);
$school_id = $_SESSION['school_id'];
$result = $mm_school_student -> addStudent($student->name, $student->father, $student->birth, $student->gender, $student->add, $student->phone, $student->grade, $school_id);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
