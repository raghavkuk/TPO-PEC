<?php
header('Content-Type: text/xml');
session_start();
include '../db_connection.php';
$cgpa=$_GET['cgpa'];
$branch=$_GET['branch'];
$gender=$_GET['gender'];
$branchquery="";
$genderquery="";
if($branch=='All')
	$branchquery="";
else
	$branchquery=" AND student_branch='".$branch."'";
if($gender=='Both')
	$genderquery="";
else
	$genderquery=" AND gender='".$gender."'";
$retxml = "<numbers>";
$companies=array();
$i=0;
$sql="SELECT company1, company2, company3 from placementdetails_me where cgpa>=$cgpa AND status IN ('PLACED','PLACED (PPO)')".$branchquery.$genderquery;

$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$comp=$row['company1'];
			if($row['company2']!="")
				$comp=$row['company2'];
			if($row['company3']!="")
				$comp=$row['company3'];
			$companies[$i++]=$comp;
			
		}
}
$sql="SELECT count(*) as placed from placementdetails_me where status='PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<placedme>".$row['placed']."</placedme>";
		}
}
$sql="SELECT count(*) as notplaced from placementdetails_me where status='NOT PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<notplacedme>".$row['notplaced']."</notplacedme>";
		}
}	
$sql="SELECT count(*) as studies from placementdetails_me where status='HIGHER STUDIES'".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<studiesme>".$row['studies']."</studiesme>";
		}
}
$d=$i;
$i=0;
$analytics=0;
$consultancy=0;
$vlsi=0;
$finance=0;
$civilinfra=0;
$manufac=0;
$software=0;
$ece=0;
$core=0;
$teaching=0;
$other=0;
if($d>0)
{
while($d--)
{
	$sql="SELECT industry_sector from companies where company_name like '%".$companies[$i]."%'";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$a=$row['industry_sector'];
			if($a=="Analytics/KPO")
				$analytics++;
			if($a=="Consultancy")
				$consultancy++;
			if($a=="VLSI/Embedded Systems")
				$vlsi++;
			if($a=="Finance")
				$finance++;
			if($a=="Civil/Infrastructure")
				$civilinfra++;
			if($a=="Manufacturing/Automobile")
				$manufac++;
			if($a=="Software")
				$software++;
			if($a=="Electronics/Communication")
				$ece++;
			if($a=="Core (Technical)")
				$core++;
			if($a=="Teaching/Research")
				$teaching++;
			if($a=="Other")
				$other++;
		}
}
$i++;
}
}
$retxml=$retxml."<analytics>$analytics</analytics>
<consultancy>$consultancy</consultancy>
<vlsi>$vlsi</vlsi>
<finance>$finance</finance>
<civilinfra>$civilinfra</civilinfra>
<manufac>$manufac</manufac>
<software>$software</software>
<ece>$ece</ece>
<core>$core</core>
<teaching>$teaching</teaching>
<other>$other</other>";	
$retxml = $retxml."</numbers>";
$mysqli->close();
echo $retxml;
?>