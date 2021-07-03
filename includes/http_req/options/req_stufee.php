<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$stu_fee = json_decode($postdata);
$fee_id = $stu_fee->fee_id;
$result = $mm_stufee_class -> selectStuFee($fee_id);
// echo json_encode($result);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
