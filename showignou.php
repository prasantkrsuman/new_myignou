<?php
define ('OFFSET',20);
define ('MIDSET',15);
require_once('includes/include.php');
$url  = $_SERVER['SCRIPT_NAME'];
$countQuery = "select count(*) As `total` from `ignou`;";
$totalResult=mysql_query($countQuery)or die (mysql_error());
$total= mysql_fetch_assoc ( $totalResult);
$totalRecords=$total['total'];
$totalPages=ceil($totalRecords/OFFSET);
$page=isset($_GET ['page'])? $_GET ['page']:1;
$limit =($page - 1)* OFFSET;
$selectQuery="select * from `ignou` ORDER BY `id` ASC LIMIT $limit,".OFFSET."; ";
$resultQuery=mysql_query($selectQuery)or die (mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ONLINE IGNOU BCA/MCA % calc by Prasant Kumar Suman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="online ignou BCA/MCA % Calculator ignou Bca MCA ignou calculator">
    <meta name="author" content="prasant Kumar Suman"> 
    <link rel="shortcut icon" href="/images/favi.ico" type="image/x-icon">
    <!-- Le styles -->
    <link href="/CSS/style2_1.css" rel="stylesheet">
    <link href="/CSS/style2_2.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
	  </style>


   
  </head>
  <body>
  	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" style="padding-bottom: 1px;padding-top: 5px;">
		<h2 align="center" style="color: #13ECE4">IGNOU BCA/MCA % CALCULATOR USERS DETAIL</h2>
		<!--<p></p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
      </div>
      <div class="container">
  	<table border="1" width="100%" class="table table-bordered">
		<thead>
		 <th>#ID</th>
		 <th>Name</th>
		 <th>Enrolment No</th>
		 <th>Course</th>
		 <th>Percentage</th>
		</thead>
<?php
		while($res = mysql_fetch_assoc ( $resultQuery))
{ ?>
	<tr>
		<td><?php echo $res['id']; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><a href ="/?enrol=<?php echo $res['enrol']; ?>&course=<?php echo $res['course']; ?>"><?php echo $res['enrol']; ?></a></td>
		<td><?php echo $res['course']; ?></td>
		<td><?php echo $res['percent']; ?></td>
	<tr><?php } ?>
	</table>

<div class ="pagination pagination-centered">
	<ul>
<?php
  $startRange = $page - floor(MIDSET/2);
  $endRange = $page + floor(MIDSET/2);
  if($startRange <= 0){
    $endRange += abs($startRange)+1;
    $startRange = 1;
  }
  if($endRange > $totalPages){
    $startRange -= $endRange-$totalPages;
    $endRange = $totalPages;
  }

    if (1 == $page) {
      echo "<li class =\"privious\"><a>&larr; Older</a><li>";
    }else{
      $pgo = $page - 1;
      echo "<li class =\"privious\"><a href=\"{$url}?page=$pgo\" >Older</a><li>";
    }
    $range = range($startRange,$endRange);

    for($i=1;$i<=$totalPages;$i++){
        if($range[0] > 2 And $i == $range[0]) echo "<li class=\"disabled\"><a>...</a></li>";
        // loop through all pages. if first, last, or in range, display
        if($i==1 Or $i==$totalPages Or in_array($i,$range))
        {
          echo ($i == $page) ? "<li class=\"disabled\" ><a title=\"Go to page $i of $totalPages\" class=\"current\" >$i</a></li>":"<li><a title=\"Go to page $i of $totalPages\" href=\"$url?page=$i\">$i</a></li>";
        }
        if($range[MIDSET-1] < $totalPages-1 And $i == $range[MIDSET-1]) echo "<li class=\"disabled\"><a>...</a></li>";
    }
    if ($totalPages == $page) {
      echo "<li class =\"next\"><a>Newer &rarr;</a></li>";
    }else{
      $pgn = $page + 1;
      echo "<li class =\"next\"><a href=\"{$url}?page={$pgn}\">Newer &rarr;</a></li>";
    } 
?>
</ul>
</div></div>

</body></html>