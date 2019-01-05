<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$fee_part_data = json_decode($postdata);
$fee_part_id = $fee_part_data->fee_part_id;
$fee_part_amount = $fee_part_data->fee_part_amount;


$result = $mm_school_feenum -> editFeePart($fee_part_id, $fee_part_amount);
// foreach($fee_parts as $item) { //foreach element in $arr
//     $result += 'gg'; //etc
// }
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
