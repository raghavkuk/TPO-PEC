<?php
session_start();
if( isset( $_SESSION['cid'] ) ) {
      $_SESSION['cid']=0;
   }else {
      $_SESSION['cid'] = 0;
   }
   if( isset( $_SESSION['cid2'] ) ) {
      $_SESSION['cid2']=0;
   }else {
      $_SESSION['cid2'] = 0;
   }
   if( isset( $_SESSION['cname'] ) ) {
      $_SESSION['cname']="";
   }else {
      $_SESSION['cname'] ="";
   }
$cid=0;   
$cname="";
$cn=$_POST["cname"];
$cp=$_POST["cpass"];
$con=mysqli_connect("localhost","root","");
   mysqli_select_db($con,"tpo");
   $query="SELECT company_id, company_name from company_login where company_username='".$cn."' and company_password='".$cp."'";
   $result = $con->query($query);
   if($result->num_rows>0)
   {
	   echo 'good';
	while($row=$result->fetch_assoc())
	{
		$cid=$row["company_id"];
		echo $cid;
		$cname=$row["company_name"];
		$_SESSION['cname']=$cname;
	}
	echo $cid;
	$query2="SELECT * from companies where company_id='".$cid."'";
	$result2 = $con->query($query2);
	if($result2->num_rows>0)
	{
		echo 'good';
		$_SESSION['cid']=$cid;
		echo $_SESSION['cid'];
		$_SESSION['cname']=$cname;
	}
	$query3="SELECT * from company_contact where company_id='".$cid."'";
	$result3 = $con->query($query3);
	if($result3->num_rows>0)
	{
		$_SESSION['cid2']=$cid;
	}
	header('Location: aboutcompany.php');
   }
$con->close();
	?>