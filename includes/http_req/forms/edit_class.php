<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$class_data = json_decode($postdata);
$class_id = $class_data->class_id;
$class_name = $class_data->class_name;


$result = $mm_school_class -> editClass($class_id, $class_name);
// foreach($fee_parts as $item) { //foreach element in $arr
//     $result += 'gg'; //etc
// }
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
