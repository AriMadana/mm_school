<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$grade = json_decode($postdata);
$result = $mm_school_grade -> editGrade($grade->grade_id, $grade->grade_name);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
// echo json_encode($result);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>