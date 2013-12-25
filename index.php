<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ONLINE IGNOU BCA/MCA % calc by Prasant Kumar Suman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="online ignou BCA/MCA % Calculator ignou Bca MCA ignou calculator">
    <meta name="keywords" content="online, ignou, BCA/MCA, % Calculator, ignou Bca MCA ignou calculator,Prasant Kumar suman">
    <meta name="robots" content="index, follow">
    <meta name="author" content="prasant Kumar Suman"> 

    <!-- Le styles -->
    <link href="CSS/style2_1.css" rel="stylesheet">
    <link href="CSS/style2_2.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
	  #resultId input[type="text"]
		{
			background:none repeat scroll 0 0 #white;
			height:20px;
			width:30px;
			border:1px;
			font-size:15px;
			color:black;
			margin-top:10px;
			text-align: center;

		}
	  #stuDetailId td
		{
			width:207px;
			text-align: center;
			vertical-align: middle;
			padding: 2px;
		}
	  #resultId td
		{
			text-align: center;
			vertical-align: middle;
			padding: 2px;
		}
		.res { font-size: 18px; }
		.tmp { margin: 20px; background-color: lavender;}
    </style>
    

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
	<link rel="shortcut icon" href="/images/favi.ico" type="image/x-icon">
	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-37884463-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script>
	<script type="text/javascript">

	</script>

  </head>
  	<body>
<?php
  $course = isset($_REQUEST['course'])? $_REQUEST['course']:'';
  $enrolment = isset($_REQUEST['enrol'])? $_REQUEST['enrol']:'';
  $type = isset($_REQUEST['type'])? $_REQUEST['type']:'';
  $isMCA = ( $course == 'MCA')?'selected':'';
  $isBCA = ( $course == 'BCA')?'selected':'';
  if (isset($_REQUEST['course']) && isset($_REQUEST['enrol'])) {
  	  $script = <<<SCRIPT
  <script type="text/javascript">
  	// $('#buttonAjax').click();
  </script>
SCRIPT;
  }

?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/"><img src="images/logo4.jpg" title="IGNOU BCA MCA % CALCULATOR" class="img-rounded"/></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">Home</a></li>
              <li><a  target="_TOP" href="https://www.facebook.com/ignoubca">About</a></li>
              <li><a  target="_TOP" href="https://www.facebook.com/PKSUMAN">Contact</a></li>
            </ul>
            <form class="navbar-form pull-right" autocomplete="on" style="padding-top: 3px;" id = "formId">
              <input class="input-medium ui-autocomplete-input" type="text" autocomplete="on" value="<?php echo $enrolment;?>" maxlength="9" title="ENTER YOUR ENROLLMENT NUMBER..." placeholder="Enter Enrollment No.." id="enrolId" >
           <select id="course" class="span2" title="SELECT YOUR COURSE">
				<option value="">---Course---</option>
				<option <?php echo $isBCA;?> value="BCA">BCA</option>
				<option <?php echo $isMCA;?> value="MCA">MCA or BCA-MCA Integerated</option>
				<!-- <option value="MCA">BCA-MCA Integrated</option> -->
			</select>
              <button type="submit" class="btn btn-primary" id="buttonAjax" data-loading-text="Please wait..." title="Calculate YOUR BCA,MCA or BCA-MCA integrated %">calculate %</button>
            </form>
          </div><!--/.nav-collapse -->

        </div>
      </div>
    </div>


	<div class="container">
  <!-- Main hero unit for a primary marketing message or call to action -->
  <div class="hero-unit" style="padding-bottom: 1px;padding-top: 5px; font-family:'Segoe UI'; background-color:#f3f2f2; text-align:center">
				<h2 style="color: #9a0000; font-weight:lighter">IGNOU BCA/MCA % CALCULATOR</h2>
                <p style=""><a style="text-decoration:underline" href="http://www.myignou.com/Calculator/BCA-Revised?ref=pksuman">click here for BCA Revised Syllabus % Calculator</a></p>
  </div>

      	<!-- Example row of columns -->
	<div id="mainId" class="container" >
				<div id="topId" class="navbar"> Get your ignou BCA/MCA % at a single click</div>
				<div id="stuDetailId" class="container" style="display:none" >
		        <table  class="table table-bordered" >
		          <tr>
		            <td> Enrollment No </td><td colspan="4" ></td>
		            <td colspan="2" >Current Address</td><td colspan="6" ></td>
		          </tr>
		          <tr>
		            <td>Name</td><td colspan="4" ></td>
		            <td colspan="2" >Email Id</td><td colspan="6"></td>
		            </tr>
		          <tr>
		            <td>Father's Name</td><td colspan="4" ></td>
		            <td colspan="2" >Phone No</td><td colspan="6" ></td>
		          </tr>
		        </table>
				</div>
				<div class="container" id="stuMarksId" style="display:none">	  
					<div>
				      <ul class="nav nav-tabs" id="myTab">
				          <li class="active"><a data-toggle="tab" href="#resultId"  id="getresultId">RESULT CALCULATED</a></li>
				          <li class=""><a data-toggle="tab" href="#resultTmp" id="getignouPageId" >Result as on IGNOU Website</a></li>
				      </ul>
				      <div class="tab-content">
								<div id="resultId" class="container tab-pane active">
									<form name="bcaMcaAll" style=" padding-bottom: 30px;">
										<div id="bca" style="background-color:#ECFFFF">
											<table  class="table table-bordered" >
												<thead style="font-weight: bolder;" >
													<tr class="th">
														<td rowspan="2">Code</td><td width="20%" rowspan="2">Title</td><td colspan="3">Assignment</td><td colspan="2">Term End Theory</td>
														<td colspan="2">Term End Practical</td><td colspan="2">Total Marks</td><td colspan="2">Final Marks</td><td rowspan="2">Status</td>
													</tr>
													<tr class="th">
														<td>1st</td><td>2nd</td><td style="width: 4%;">@30/25</td><td>Marks</td>
														<td style="width: 8%;">@60/70/75</td><td style="width: 6%;">Marks</td><td style="width: 4%;">@15/75</td>
														<td style="width: 4%;">Obtained</td><td>Max</td><td style="width: 5%;">Weightage</td><td style="width: 6%;">Final %</td>
													</tr>
												</thead>
												<tbody>
													<tr style="font-weight: bolder;font-size:20"><td colspan="14">Semester 1st </td></tr>
													<tr id="CS610">
														<td >CS-610</td><td >Foundation Course in English for Computing</td><td><input type="text" id="CS610A1" name="CS610[A1]" /></td><td><input type="text" id="CS610A2" name="CS610[A2]" /></td><td></td><td><input type="text" id="CS610T" name="CS610[T]" /></td><td></td><td></td><td></td><td></td><td>75</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="BSHF1">
														<td >BSHF-01</td><td >Foundation Course in Humanities and Social Science</td><td><input type="text" id="BSHF1A1" name="BSHF1[A1]" /></td><td><input type="text" id="BSHF1A2" name="BSHF1[A2]" /></td><td></td><td><input type="text" id="BSHF1T" name="BSHF1[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>100</td><td></td><td></td>
													</tr>
													   <tr id="FHS1">
														<td >FHS-1</td><td>Foundation Course in Humanities and Social Science</td><td><input type="text" id="FHS1A1" name="FHS1[A1]" /></td><td><input type="text" id="FHS1A2" name="FHS1[A2]" /></td><td></td><td><input type="text" id="FHS1T" name="FHS1[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>100</td><td></td><td></td>
													   </tr>
													<tr id="CS611">
														<td >CS-611</td><td >Computer Fundamentals and PC Software</td><td><input type="text" id="CS611A1" name="CS611[A1]" /></td><td><input type="text" id="CS611A2" name="CS611[A2]" /></td><td></td><td><input type="text" id="CS611T" name="CS611[T]" /></td><td></td><td><input type="text" id="CS611P" name="CS611[P]" /></td><td></td>
														<td></td><td>100</td><td>50</td><td></td><td></td>
													   </tr>
													<tr><td colspan="14"style="font-weight: bolder;font-size:20" >Semester 2nd</td></tr>
													<tr id="CS612">
														<td >CS-612</td><td >PC Software Application Skills</td><td><input type="text" id="CS612A1" name="CS612[A1]" /></td><td><input type="text" id="CS612A2" name="CS612[A2]" /></td><td></td><td><input type="text" id="CS612T" name="CS612[T]" /></td><td></td><td></td><td></td><td></td><td>85</td><td>50</td><td></td><td></td>
													</tr>
													   <tr id="CS60">
														<td >CS-60</td><td >Foundation Course in Mathematics in Computing</td><td><input type="text" id="CS60A1" name="CS60[A1]" /></td><td><input type="text" id="CS60A2" name="CS60[A2]" /></td><td></td><td><input type="text" id="CS60T" name="CS60[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>100</td><td></td><td></td>
													</tr>
													   <tr id="CS62">
														<td >CS-62</td><td >'C' Programming &amp; Data Structure</td><td><input type="text" id="CS62A1" name="CS62[A1]" /></td><td><input type="text" id="CS62A2" name="CS62[A2]" /></td><td></td><td><input type="text" id="CS62T" name="CS62[T]" /></td><td></td><td><input type="text" id="CS62P" name="CS62[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr> 
													<tr><td colspan="14" style="font-weight: bolder;font-size:20">Semester 3rd</td></tr>
													<tr id="FST1">
														<td >FST-01</td><td >Foundation Course in Science in Technology</td><td><input type="text" id="FST1A1" name="FST1[A1]" /></td><td><input type="text" id="FST1A2" name="FST1[A2]" /></td><td></td><td><input type="text" id="FST1T" name="FST1[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>100</td><td></td><td></td>
													</tr>
													<tr id="CS63">
														<td >CS-63</td><td >Introduction to System Software (UNIX)</td><td><input type="text" id="CS63A1" name="CS63[A1]" /></td><td><input type="text" id="CS63A2" name="CS63[A2]" /></td><td></td><td><input type="text" id="CS63T" name="CS63[T]" /></td><td></td><td><input type="text" id="CS63P" name="CS63[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													   <tr id="CS5">
														<td >CS-05</td><td >Elements of System Analysis and Design</td><td><input type="text" id="CS5A1" name="CS5[A1]" /></td><td><input type="text" id="CS5A2" name="CS5[A2]" /></td><td></td><td><input type="text" id="CS5T" name="CS5[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr><td colspan="14" style="font-weight: bolder;font-size:20">Semester 4th</td></tr>
													<tr id="CS6">
														<td >CS-06</td><td >Introduction to DBMS</td><td><input type="text" id="CS6A1" name="CS6[A1]" /></td><td><input type="text" id="CS6A2" name="CS6[A2]" /></td><td></td><td><input type="text" id="CS6T" name="CS6[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="CS64">
														<td >CS-64</td><td >Introducation to Computer Organisation</td><td><input type="text" id="CS64A1" name="CS64[A1]" /></td><td><input type="text" id="CS64A2" name="CS64[A2]" /></td><td></td><td><input type="text" id="CS64T" name="CS64[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="CS65">
														<td >CS-65</td><td >Windows Programming</td><td><input type="text" id="CS65A1" name="CS65[A1]" /></td><td><input type="text" id="CS65A2" name="CS65[A2]" /></td><td></td><td></td><td></td><td><input type="text" id="CS65P" name="CS65[P]" /></td><td></td><td></td><td>100</td><td>25</td><td></td><td></td>
													</tr>
													<tr id="CS66">
														<td >CS-66</td><td >Multimedia</td><td><input type="text" id="CS66A1" name="CS66[A1]" /></td><td><input type="text" id="CS66A2" name="CS66[A2]" /></td><td></td><td><input type="text" id="CS66T" name="CS66[T]" /></td><td></td><td></td><td></td><td></td><td>85</td><td>25</td><td></td><td></td>
													</tr>
													<tr id="CS67">
														<td >CS-67</td><td >RDBMS Lab</td><td><input type="text" id="CS67A1" name="CS67[A1]" /></td><td><input type="text" id="CS67A2" name="CS67[A2]" /></td><td></td><td></td><td></td><td><input type="text" id="CS67P" name="CS67[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr><td colspan="14" style="font-weight: bolder;font-size:20">Semester 5th</td></tr>
													<tr id="CS68">
														<td >CS-68</td><td >Computer Networks</td><td><input type="text" id="CS68A1" name="CS68[A1]" /></td><td><input type="text" id="CS68A2" name="CS68[A2]" /></td><td></td><td><input type="text" id="CS68T" name="CS68[T]" /></td><td></td><td><input type="text" id="CS68P" name="CS68[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													   </tr>
													<tr id="BCS61">
														<td >BCS-061 / CS-69</td><td >TCP/IP Programming</td><td><input type="text" id="BCS61A1" name="BCS61[A1]" /></td><td><input type="text" id="BCS61A2" name="BCS61[A2]" /></td><td></td><td><input type="text" id="BCS61T" name="BCS61[T]" /></td><td></td><td><input type="text" id="BCS61P" name="BCS61[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="CS70">
														<td >CS-70</td><td >Introdunction to Software Engineering</td>
														<td><input type="text" id="CS70A1" name="CS70[A1]" /></td><td><input type="text" id="CS70A2" name="CS70[A2]" /></td><td></td><td><input type="text" id="CS70T" name="CS70[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													   </tr>
													<tr id="CS71">
														<td >CS-71</td><td >Computer Oriented Numerical Techniques</td><td><input type="text" id="CS71A1" name="CS71[A1]" /></td><td><input type="text" id="CS71A2" name="CS71[A2]" /></td><td></td><td><input type="text" id="CS71T" name="CS71[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr><td colspan="14" style="font-weight: bolder;font-size:20">Semester 6th</td></tr>
													<tr id="CS72">
														<td >CS-72</td><td >C++ and Object Oriented Programming</td><td><input type="text" id="CS72A1" name="CS72[A1]" /></td><td><input type="text" id="CS72A2" name="CS72[A2]" /></td><td></td><td><input type="text" id="CS72T" name="CS72[T]" /></td><td></td><td><input type="text" id="CS72P" name="CS72[P]" /></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="CS73">
														<td >CS-73</td><td >Theory of Computer Science</td><td><input type="text" id="CS73A1" name="CS73[A1]" /></td><td><input type="text" id="CS73A2" name="CS73[A2]" /></td><td></td><td><input type="text" id="CS73T" name="CS73[T]" /></td><td></td><td></td><td></td><td></td><td>100</td><td>50</td><td></td><td></td>
													</tr>
													<tr id="CS74">
														<td >CS-74</td><td >Introduction to Internet Programming (Java, ActiveX)</td><td><input type="text" id="CS74A1" name="CS74[A1]" /></td><td><input type="text" id="CS74A2" name="CS74[A2]" /></td><td></td><td><input type="text" id="CS74T" name="CS74[T]" /></td><td></td><td><input type="text" id="CS74P" name="CS74[P]" /></td><td></td><td></td><td>100</td><td>25</td><td></td><td></td>
													</tr>
													<tr id="CS75">
														<td >CS-75</td><td >Intranet Administration</td><td><input type="text" id="CS75A1" name="CS75[A1]" /></td><td><input type="text" id="CS75A2" name="CS75[A2]" /></td><td></td><td><input type="text" id="CS75T" name="CS75[T]" /></td><td></td><td></td><td></td><td></td><td>85</td><td>25</td><td></td><td></td>
													</tr>
													<tr id="CS76">
														<td>CS-76</td>
														<td colspan="4">Project @ 150</td>
														<td><input type="text" id="CS76T" name="CS76[T]" /></td><td colspan="2">Viva @ 50</td>
														<td><input type="text" id="CS76P" name="CS76[P]" /></td></td>
														<td></td><td>200</td><td>50</td><td></td><td></td>
													</tr>
													   <tr  id="gtA"><td colspan="9">Final Total for All Subjects</td><td></td><td>2330</td><td>1200</td><td></td><td></td></tr>
													   <tr  id="gtC"><td colspan="9">Final Total for All Completed Subjects</td><td></td><td></td><td></td><td></td><td></td>
													</tr> 
												</tbody>
											</table>
										</div>
										<div id="mca" style="display:none;background-color:#ECFFFF">
							        <table class="table table-bordered">
							          <tr class="th">
							            <td rowspan="2"><b> SEM </b></td>
							            <td rowspan="2" width="8%"><b> COURSE<br>CODE </b></td>
							            <td  rowspan="2"><b> ASGN </b></td>
							            <td colspan="4"><b> TERM END PRACTICAL </b></td>
							            <td rowspan="2"><b> Term<br>End<br>Theory </b></td>
							      
							            <td colspan="2"><b> WEIGHTAGE</b></td>
							            <td colspan="2"><b> MARKS </b></td>
							            <td rowspan="2"><b> Per %</b></td>
							            <td rowspan="2"><b> STATUS </b></td>
							          </tr>
							          <tr class="th">
							            <td ><b> Lab1 </b></td>
							            <td ><b> Lab2 </b></td>
							            <td ><b> Lab3 </b></td>
							            <td><b> Lab4 </b></td>
							            <td ><b> @25% </b></td>
							            <td ><b> @75% </b></td>
							            <td ><b> Total </b></td>
							            <td ><b> Max  </b></td>
							          </tr>
							          <tr id="mcatoggle"><td>Ist <br> IInd</td><td colspan="9"><b>Marks Carried From BCA <br> Out of 1000</b></td><td></td><td>1000</td><td></td><td></td>
							          </tr>
							          <tr id="MCS011"><td rowspan="7"> Ist </td>
							            <td> MCS-011 </td><td><input type="text" name="MCS011[A]" id="MCS011A"/></td><td></td><td></td><td></td><td></td><td><input type="text" name="MCS011[T]" id="MCS011T"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS012"><td style="display:none;"></td>
							            <td>MCS-012 </td><td><input type="text" name="MCS012[A]"id="MCS012A"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS012T" name="MCS012[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS013"><td style="display:none;"></td>
							            <td> MCS-013 </td><td><input type="text" id="MCS013A" name="MCS013[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS013T" name="MCS013[T]"/></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCS014"><td style="display:none;"></td>
							            <td> MCS-014 </td><td><input type="text" name="MCS014[A]"id="MCS014A"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS014T" name="MCS014[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS015"><td style="display:none;"></td>
							            <td> MCS-015 </td><td><input type="text" id="MCS015A" name="MCS015[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS015T" name="MCS015[T]"/></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL016"><td style="display:none;"></td>
							            <td> MCSL-016 </td><td><input type="text" id="MCSL016A" name="MCSL016[A]"/></td><td><input type="text" id="MCSL016L1" name="MCSL016[L1]"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL017"><td style="display:none;"></td>
							            <td> MCSL-017 </td><td><input type="text" id="MCSL017A" name="MCSL017[A]"/></td><td><input type="text" id="MCSL017L1" name="MCSL017[L1]"/></td><td><input type="text" id="MCSL017L2" name="MCSL017[L2]"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCS021">
							            <td rowspan="5"> IInd </td>
							            <td> MCS-021 </td><td><input type="text" id="MCS021A" name="MCS021[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text"  name="MCS021[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS022"><td style="display:none;"></td>
							            <td> MCS-022</td><td><input type="text" id="MCS022A"  name="MCS022[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS022T"  name="MCS022[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS023"><td style="display:none;"></td>
							            <td> MCS-023 </td><td><input type="text" id="MCS023A"  name="MCS023[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS023T" name="MCS023[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS024"><td style="display:none;"></td>
							            <td> MCS-024 </td><td><input type="text" id="MCS024A" name="MCS024[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS024T" name="MCS024[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL025"><td style="display:none;"></td>
							            <td> MCSL-025 </td><td><input type="text" id="MCSL025A" name="MCSL025[A]"/></td><td><input type="text" id="MCSL025L1" name="MCSL025[L1]"/></td><td><input type="text" id="MCSL025L2" name="MCSL025[L2]"/></td><td><input type="text" id="MCSL025L3" name="MCSL025[L3]"/></td><td><input type="text" id="MCSL025L4" name="MCSL025[L4]"/></td><td></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS031">
							            <td rowspan="6"> IIIrd</td><td> MCS-031 </td><td><input type="text" id="MCS031A" name="MCS031[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS031T" name="MCS031[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS032"><td style="display:none;"></td>
							            <td>MCS-032 </td><td><input type="text" id="MCS032A" name="MCS032[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS032T" name="MCS032[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS033"><td style="display:none;"></td>
							            <td> MCS-033 </td><td><input type="text" id="MCS033A" name="MCS033[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS033T" name="MCS033[T]"/></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCS034"><td style="display:none;"></td>
							            <td>MCS-034 </td><td><input type="text" id="MCS034A" name="MCS034[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS034T" name="MCS034[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS035"><td style="display:none;"></td>
							            <td>MCS-035 </td><td><input type="text" id="MCS035A" name="MCS035[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS035T" name="MCS035[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL036"><td style="display:none;"></td>
							            <td> MCSL-036 </td><td><input type="text" id="MCSL036A" name="MCSL036[A]"/></td><td><input type="text" id="MCSL036L1" name="MCSL036[L1]"/></td><td><input type="text" id="MCSL036L2" name="MCSL036[L2]"/></td><td><input type="text" id="MCSL036L3" name="MCSL036[L3]"/></td><td></td><td></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS041">
												<td rowspan="5"> IVth </td><td> MCS-041 </td><td><input type="text" id="MCS041A" name="MCS041[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS041T" name="MCS041[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS042"><td style="display:none;"></td>
							            <td> MCS-042 </td><td><input type="text" id="MCS042A" name="MCS042[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS042T" name="MCS042[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS043"><td style="display:none;"></td>
							            <td> MCS-043 </td><td><input type="text" id="MCS043A" name="MCS043[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS043T" name="MCS043[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS044"><td style="display:none;"></td>
							            <td> MCS-044 </td><td><input type="text" id="MCS044A" name="MCS044[A]"/></td><td></td><td></td><td></td><td><input type="text" id="MCS044L" name="MCS044[L]"/></td><td><input type="text" id="MCS044T" name="MCS044[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL045"><td style="display:none;"></td>
							            <td> MCSL-045 </td><td><input type="text" id="MCSL045A" name="MCSL045[A]"/></td><td><input type="text" id="MCSL045L1" name="MCSL045[L1]"/></td><td><input type="text" id="MCSL045L2" name="MCSL045[L2]"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCS051">
							            <td rowspan="7"> Vth </td><td> MCS-051 </td><td><input type="text" id="MCS051A" name="MCS051[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS051T" name="MCS051[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCS052"><td style="display:none;"></td>
							            <td> MCS-052 </td><td><input type="text" id="MCS052A" name="MCS052[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS052T" name="MCS052[T]"/></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCS053"><td style="display:none;"></td>
							            <td> MCS-053 </td><td><input type="text" id="MCS053A" name="MCS053[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCS053T" name="MCS053[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSE003"><td style="display:none;"></td>
							            <td> MCSE-003 </td><td><input type="text" id="MCSE003A" name="MCSE003[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCSE003T" name="MCSE003[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
									  		</tr>
							          <tr id="MCSE004"><td style="display:none;"></td>
							            <td> MCSE-004 </td><td><input type="text" id="MCSE004A" name="MCSE004[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCSE004T" name="MCSE004[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSE011"><td style="display:none;"></td>
							            <td> MCSE-011 </td><td><input type="text" id="MCSE011A" name="MCSE011[A]"/></td><td></td><td></td><td></td><td></td><td><input type="text" id="MCSE011T" name="MCSE011[T]"/></td><td></td><td></td><td></td><td>100</td><td></td><td></td>
							          </tr>
							          <tr id="MCSL054"><td style="display:none;"></td>
							            <td> MCSL-054 </td><td><input type="text" id="MCSL054A" name="MCSL054[A]"/></td><td><input type="text" id="MCSL054L1" name="MCSL054[L1]"/></td><td><input type="text" id="MCSL054L2" name="MCSL054[L2]"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td>50</td><td></td><td></td>
							          </tr>
							          <tr id="MCSP060">
							            <td> VIth</td><td> MCSP-060 </td><td></td><td></td><td></td><td></td><td><input type="text" id="MCSP060L" name="MCSP060[L]"/></td><td><input type="text" id="MCSP060T" name="MCSP060[T]"/></td><td></td><td></td><td></td><td>200</td><td></td><td></td>
							          </tr >
									  		<tr id="totalMca">
													<td colspan="9"></td><td> <b>Total<b> </td><td></td><td>2800</td><td></td><td></td>
									  		</tr>
							        </table>
					      		</div>
					      		<div class="pull-right"><button type="submit" class="btn btn-primary" id="recalAjax" data-loading-text="Re-Calculating Please wait......" title="Re-Calculate YOUR  %">Re-calculate %</button></div>
				      		</form>
				    		</div>
							<div id="resultTmp" class="container tab-pane fade" ></div>        
				  </div>
				</div>
	</div>
	</div>
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'bcamcamyignou'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
				<!-- footer -->
			<hr>
			<footer align="center">
        <p><a href="https://www.facebook.com/PKSUMAN" target="_TOP" title="Prasant Kumar Suman"><img src="https://badge.facebook.com/badge/1376086386.1446.1021577450.png" style="border: 0px;" /> <br>&copy; Developed By Prasant Kumar Suman</a></p>
     	</footer>
	</div> <!-- /container -->




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

       <script type="text/javascript" src="js/jquery.min.js" ></script>
       <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js" ></script>
		<script type="text/javascript" src="js/ignou.max.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		 <?php if (isset($script)) {  echo $script;  } ?>
		
  </body>
</html>