<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$fee_data = json_decode($postdata);
$fee_name = $fee_data[0]->fee_name;
$fee_total = $fee_data[0]->fee_amount;
$fee_number = $fee_data[0]->fee_number;
$grade_id = $fee_data[0]->grade_id;
$fee_parts = $fee_data[0]->fee_parts;


$result = $mm_school_fee -> addFee($fee_name, $fee_total, $fee_number, $grade_id, $fee_parts);
// foreach($fee_parts as $item) { //foreach element in $arr
//     $result += 'gg'; //etc
// }
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
