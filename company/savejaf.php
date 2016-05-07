<?php

session_start();

include '../db_connection.php';

$designation = $_POST["designation"];
$jobdesc = $_POST["jobdesc"];
$ctc = $_POST["ctc"];
$gross = $_POST["gross"];
$perks = $_POST["perks"];
$bond = $_POST["bond"];
$cgpa = $_POST["cgpa"];
$written = $_POST["written"];
$interview = $_POST["interview"];
$other = $_POST["other"];
$selproc = "";
$deadline = $_POST['deadline'];
$dateofvisit=$_POST['dateofvisit'];
$success = 0;

if(isset($_POST["pptalk"]) && $_POST["pptalk"] == 'Yes')
	$selproc=$selproc."Pre-Placement Talk";

if(isset($_POST["shortlistfromresume"]) && $_POST["shortlistfromresume"] == 'Yes')
	$selproc=$selproc." Shortlisting From Resumes";

if(isset($_POST["gd"]) && $_POST["gd"] == 'Yes')
	$selproc=$selproc." Group Discussion";

$sql = "INSERT into jaf_details (company_id,company_name,job_designation,job_description,ctc,gross,perks,bond,cgpa,written,interview,other,selection_proc,dateofvisit,deadline) values('".$_SESSION['cid']."','".$_SESSION['cname']."','".$designation."','".$jobdesc."','".$ctc."','".$gross."','".$perks."','".$bond."','".$cgpa."','".$written."','".$interview."','".$other."','".$selproc."','".$dateofvisit."','".$deadline."')";
if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
	$success=1;
	
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

if($success==1){
	ob_start();
?>

<p>
<h1 align="center"><u> Job Annoucement Form </u></h1>
<h3 align="center"><u><?php echo $_SESSION['cname']; ?></u></h3>
 &nbsp; &nbsp; &nbsp; <font size='5'>Job Designation: <?php echo $designation;?><br>
 &nbsp; &nbsp; &nbsp;Job Description: <?php echo $jobdesc;?><br>
 &nbsp; &nbsp; &nbsp;Cost to Company: <?php echo $ctc; ?><br>
 &nbsp; &nbsp; &nbsp;Gross Take Home: <?php echo $gross; ?><br>
 &nbsp; &nbsp; &nbsp;Perks: <?php echo $perks; ?><br>
 &nbsp; &nbsp; &nbsp;Bond: <?php echo $bond; ?><br>
 &nbsp; &nbsp; &nbsp;CGPA Cutoff: <?php echo $cgpa; ?><br>
 &nbsp; &nbsp; &nbsp;Selection Procedure: <?php echo $selproc?><br>
 &nbsp; &nbsp; &nbsp;Written: <?php echo $written; ?><br>
 &nbsp; &nbsp; &nbsp;Interview: <?php echo $interview;?><br>
 &nbsp; &nbsp; &nbsp;Others: <?php echo $other;?><br>
 &nbsp; &nbsp; &nbsp;Date of Visit: <?php echo $dateofvisit;?><br>
 &nbsp; &nbsp; &nbsp;Application deadline: <?php echo $deadline;?><br>
 </font>
</p> 
 <?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
        $filename="../JAFs/".$_SESSION['cname']."_".$designation."_PEC.pdf";
        //output pdf
        //$mpdf->Output($filename,'D');

        //open in browser
        //$mpdf->Output();

        //save to server
        $mpdf->Output($filename,'F');
        header('Location:fill-jaf.php?status=success');
}
?>