<?php
  require_once 'includes/result.php';
  require_once 'includes/include.php';
  $query = isset($_POST['q'])? trim($_POST['q']):false;

  if ($query) {
  	# code...
    $data = array();
  $checkDB = "SELECT *  FROM `ignou` WHERE `enrol` LIKE '{$query}%';";	
  $result = mysql_query($checkDB);

  while ( $temp = mysql_fetch_assoc($result)) {
  	// array_push($data, $temp);
    $data[] = $temp; 
  }
 echo json_encode($data); }