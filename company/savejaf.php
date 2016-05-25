<?php

session_start();

include '../db_connection.php';
$type=$_POST["type"];
$designation = $_POST["designation"];
$jobdesc = $_POST["jobdesc"];
$ctc = $_POST["ctc"];
$gross = $_POST["gross"];
$perks = $_POST["perks"];
$bond = $_POST["bond"];
$cgpa = $_POST["cgpa"];
$prog=$_POST['prog'];
$written = $_POST["written"];
$interview = $_POST["interview"];
$other = $_POST["other"];
$selproc = "";
$deadline = $_POST['deadline'];
$dateofvisit=$_POST['dateofvisit'];
$success = 0;
$branches=array();
$c = 0;
$trades="";
$branchesme=array();
$d = 0;
$tradesme="";
if(isset($_POST["aero"]) && $_POST["aero"] == 'Aerospace')
{	$branches[$c]="Aerospace";
    $c++;
}
if(isset($_POST["cse"]) && $_POST["cse"] == 'Computer Science')
{$branches[$c]="Computer Science";
$c++;
}
if(isset($_POST["ece"]) && $_POST["ece"] == 'Electronics and Communication'){
	$branches[$c]="Electronics and Communication";
	$c++;
}
if(isset($_POST["ee"]) && $_POST["ee"] == 'Electrical'){
	$branches[$c]="Electrical";
    $c++;
	}
if(isset($_POST["mech"]) && $_POST["mech"] == 'Mechanical'){
	$branches[$c]="Mechanical";
	$c++;
}
if(isset($_POST["meta"]) && $_POST["meta"] == 'Metallurgy'){
	$branches[$c]="Metallurgy";
    $c++;
	}
if(isset($_POST["prod"]) && $_POST["prod"] == 'Production'){
	$branches[$c]="Production";
    $c++;
	}
	$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$trades=$trades.$branches[$i].",";
		$i++;
	}
	$trades=$trades.$branches[$i];
}
$c=0;
if(isset($_POST["meaero"]) && $_POST["meaero"] == 'Aerospace')
{	$branchesme[$c]="Aerospace";
    $c++;
}
if(isset($_POST["mecse"]) && $_POST["mecse"] == 'Computer Science')
{$branchesme[$c]="Computer Science";
$c++;
}
if(isset($_POST["meece"]) && $_POST["meece"] == 'Electronics and Communication'){
	$branchesme[$c]="Electronics and Communication";
	$c++;
}
if(isset($_POST["meee"]) && $_POST["meee"] == 'Electrical'){
	$branchesme[$c]="Electrical";
    $c++;
	}
if(isset($_POST["memech"]) && $_POST["memech"] == 'Mechanical'){
	$branchesme[$c]="Mechanical";
	$c++;
}
if(isset($_POST["memeta"]) && $_POST["memeta"] == 'Metallurgy'){
	$branchesme[$c]="Metallurgy";
    $c++;
	}
if(isset($_POST["meprod"]) && $_POST["meprod"] == 'Production'){
	$branchesme[$c]="Production";
    $c++;
	}
$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$tradesme=$tradesme.$branchesme[$i].",";
		$i++;
	}
	$tradesme=$tradesme.$branchesme[$i];
}
if($tradesme=="")
	$tradesme="NA";
if($trades=="")
	$trades="NA";
$sp=array();
$c=0;
if(isset($_POST["pptalk"]) && $_POST["pptalk"] == 'Pre-Placement Talk')
$sp[$c++]="Pre-Placement Talk";	

if(isset($_POST["shortlistfromresume"]) && $_POST["shortlistfromresume"] == 'Shortlist from Resumes')
	$sp[$c++]="Shortlist from Resumes";
if(isset($_POST["gd"]) && $_POST["gd"] == 'Group Discussion')
	$sp[$c++]="Group Discussion";
$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$selproc=$selproc.$sp[$i].",";
		$i++;
	}
	$selproc=$selproc.$sp[$i];
}
$sql = "INSERT into jaf_details (company_id,company_name,jobtype,job_designation,job_description,ctc,gross,perks,bond,cgpa,programme,branches_be,branches_me,written,interview,other,selection_proc,dateofvisit,deadline) values('".$_SESSION['cid']."','".$_SESSION['cname']."','".$type."','".$designation."','".$jobdesc."','".$ctc."','".$gross."','".$perks."','".$bond."','".$cgpa."','".$prog."','".$trades."','".$tradesme."','".$written."','".$interview."','".$other."','".$selproc."','".$dateofvisit."','".$deadline."')";
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
 &nbsp; &nbsp; &nbsp; <font size='5'>Job Type: <?php echo $type;?><br>
 &nbsp; &nbsp; &nbsp; Job Designation: <?php echo $designation;?><br>
 &nbsp; &nbsp; &nbsp;Job Description: <?php echo $jobdesc;?><br>
 &nbsp; &nbsp; &nbsp;Cost to Company/ Stipend: <?php echo $ctc; ?><br>
 &nbsp; &nbsp; &nbsp;Gross Take Home: <?php echo $gross; ?><br>
 &nbsp; &nbsp; &nbsp;Perks: <?php echo $perks; ?><br>
 &nbsp; &nbsp; &nbsp;Bond: <?php echo $bond; ?><br>
 &nbsp; &nbsp; &nbsp;CGPA Cutoff: <?php echo $cgpa; ?><br>
 &nbsp; &nbsp; &nbsp;Programmes Allowed: <?php echo $prog; ?><br>
 &nbsp; &nbsp; &nbsp;Trades Allowed (BE): <?php echo $trades?><br>
 &nbsp; &nbsp; &nbsp;Trades Allowed (ME): <?php echo $tradesme?><br>
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