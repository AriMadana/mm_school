<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$grade = json_decode($postdata);

$result = $mm_stu_list_and_acdm_class -> add_one_stu($grade->new_grade, 1);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
