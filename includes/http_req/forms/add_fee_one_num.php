<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$new_fee_num = json_decode($postdata);
$fee_id = $new_fee_num->fee_id;
$fee_num_amount = $new_fee_num->fee_num_amount;


$result = $mm_school_feenum -> addOneFeeNum($fee_id, $fee_num_amount);
// foreach($fee_parts as $item) { //foreach element in $arr
//     $result += 'gg'; //etc
// }
//$teachers = $mm_teacher_class -> activated_teacher_list_for_sub($grade, $subject, $user_id);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
