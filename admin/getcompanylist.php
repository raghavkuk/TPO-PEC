<?php
session_start();
include '../db_connection.php';
$prog=$_GET['prog'];
$progquery="";
if($prog=="BE")
	$progquery=" AND jobtype='Placement' AND programme like '%BE%'";
else if($prog=="ME")
	$progquery=" AND jobtype='Placement' AND programme like '%ME%'";
else if($prog=="BEINT")
	$progquery=" AND jobtype='Internship' AND programme like '%BE%'";
$rethtml = "";
$sql="SELECT company_name from jaf_details where reviewed!='0' and dateofdept < curdate() and dateofdept!='0000-00-00' and removed='0'".$progquery." order by dateofvisit";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<select id='companylist' class='form-control input-lg'>";
		while($row=$result->fetch_assoc()) {
			$company=$row['company_name'];
			$rethtml = $rethtml."<option value='$company'>$company</option>";
		
		}
		$rethtml = $rethtml."</select>";
}
		 else {
	$rethtml="<h4>Sorry! No companies found.</h4>";
}
/*$myfile = fopen("newfile.html", "w") or die("Unable to open file!");
fwrite($myfile, $rethtml);
fclose($myfile);
rename("newfile.html","newfile.doc");*/
$mysqli->close();
echo $rethtml;
?>