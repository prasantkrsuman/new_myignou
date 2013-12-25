<?php
  require_once 'includes/result.php';
$allData = array();

if($data = isset($_POST)?$_POST:0){
	foreach ($data as $key => $value) {
		array_push($allData, calMarks(assignKey($value,$key)));
	}
}

echo json_encode($allData);
