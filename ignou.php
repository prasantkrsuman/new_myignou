<?php

  require_once 'includes/result.php';
  require_once 'includes/include.php';

  $course = isset($_POST['course'])? $_POST['course']:'';
  $enrolment = isset($_POST['enrol'])? $_POST['enrol']:'';
  $type = isset($_POST['type'])? $_POST['type']:'';
  $name = isset($_POST['name'])? $_POST['name']:'';
  $percent = isset($_POST['percent'])? $_POST['percent']:'';

  //Post data to get student grade card from IGNOU
  $student['marks'] = "Program=$course&eno=$enrolment&submit=Submit&hidden_submit=OK";  
  
  // Student Course
  $student['course'] = $course; 
  
  // POST data  to get student detail from IGNOU
  $student['detail'] = "EnrNo=$enrolment&Program=$course&Submit=Submit";
    
  // TEST if BCA_MCA integrated course if yes collect BCA data
  if($course == 'MCA'){
    $post = "Program=BCA&eno=$enrolment&submit=Submit&hidden_submit=OK";
    if(!checkUrl($post)){
      $data['b'] = collectData($post);
      $bcahtml = getHTML($post);
    }
  }

  testCurl($student['marks']);
  

/*
 * This section will echo the html extract of the given enrollment
 */
  if($type == 'getHtml'){
    if (isset($bcahtml)) {
      echo "<div class=\"tmp\">$bcahtml</div>";
    }
    echo '<div class="tmp">';
    echo getHTML($student['marks']);
    echo '</div>';
  }
/*
 * This section will update the database with each enrollment no 
 */
  if($type == 'update'){
    $checkDB = "SELECT `id`  FROM `ignou` WHERE `enrol` = '$enrolment' AND `course` = '$course';";
    $result = mysql_query($checkDB);
    $temp = mysql_fetch_assoc($result);
    //Test if there is enrolment present if not insert else update percent
    if(!$temp){
      $insertDB = "INSERT INTO  `ignou` SET `enrol` = '$enrolment' , `name`  = '$name', `course`  = '$course', `percent` = '$percent';";
      mysql_query($insertDB); 
      //echo $insertDB;     
    }else{
      $updateDB = "UPDATE `ignou` SET `percent` = '$percent' WHERE `id`= '". $temp['id']."';";
      mysql_query($updateDB);
      //echo $updateDB;
    }
  }	
	

/*
 * This section of code will check whether the given enrollment is correct or not 
 * If correct then collect data and detail else return Enrolment NO not found
 */
  if($type == 'show'){
    if (!checkUrl($student)){
      $data['m'] = collectData($student); //m ->  student Marks array
      $data['d'] = collectDetail($student); // d-> student detail array
      $data['c'] = $course; // c-> course of student
      echo json_encode($data);
    }  
    
  }
