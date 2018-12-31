<?php

include '../../init.php';
header("content-type:application/json");

$result = $mm_school_acdm -> selectAcdm($_SESSION['school_id']);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
// echo json_encode($result);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
