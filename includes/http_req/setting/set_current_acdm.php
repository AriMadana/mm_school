<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$acdm = json_decode($postdata);

$result = $mm_school_head -> setAcdmCurrent($acdm, $_SESSION['school_id']);
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
