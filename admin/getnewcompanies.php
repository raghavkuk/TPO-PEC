<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT JAF_id, company_id, company_name, job_designation, jobtype from jaf_details where reviewed='0' and removed='0' order by JAF_id desc";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<div class='table-responsive'><table class='table' id='comp'><caption>New Companies that added a JAF</caption><thead><td><b>Company Name & Profile</b></td><td><b>Job Type</b></td><td><b>Update JAF</b></td><td><b>Download Original JAF</b></td><td><b>Send to Students</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$id=$row['JAF_id'];
			$filename = $row['company_name']."_".$row['job_designation']."_PEC.pdf";
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."(".$row['job_designation'].")</td><td class='data'>".$row['jobtype']."</td><td class='data'><a href='editjaf.php?jaf_id=".$row['JAF_id']."'>Edit JAF</a></td><td><a href='downloadpdf.php?filename=../JAFs/".$filename."' target='_blank'>Download JAF</a></td><td><button class='showform' id='".$row['JAF_id']."'>Send</button></td><td><button onclick='preview2($id)'>Remove Company</button></td></tr>";
		
		}
		$rethtml = $rethtml."</table></div>";
}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
/*$myfile = fopen("newfile.html", "w") or die("Unable to open file!");
fwrite($myfile, $rethtml);
fclose($myfile);
rename("newfile.html","newfile.doc");*/
$mysqli->close();
echo $rethtml;
?>