<?php

include '../../init.php';
header("content-type:application/json");

$postdata = file_get_contents("php://input");
$stu_fees = json_decode($postdata);
$result = $mm_stufee_class -> editStuFee($stu_fees);
// echo json_encode($result);
echo json_encode($result);
// echo $result;
//echo $mm_class_class -> fmly_tch_remove('Grade-11', 'Class A', 14);

?>
