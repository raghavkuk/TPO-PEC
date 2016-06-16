<?php
session_start();
include '../db_connection.php';
$jafid=$_GET['jafid'];
$rethtml = "";
$pptalk="";
$sl="";
$gd="";
$aero="";
$cse="";
$civil="";
$ece="";
$ee="";
$mech="";
$meta="";
$prod="";
$meind="";
$mecivilwr="";
$meenv="";
$metran="";
$meprod="";
$meee="";
$mecivilstru="";
$meecevlsi="";
$mecivilhigh="";
$mecse="";
$meinddes="";
$memech="";
$meis="";
$meece="";
$metqem="";
$sql="SELECT * from jaf_details where JAF_id='".$jafid."'";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml=$rethtml."<form id='jaf' method='post' action='savejaftpo.php?jafid=$jafid'>";
	while($row=$result->fetch_assoc()) {
		if($row['jobtype']=="Placement")
		$ctc=$row['ctc']*100000;
	    else
			$ctc=$row['ctc']*1000;
		$ctcme=$row['ctcme']*100000;
		$fulltime="";
		$internship="";
		$beonly="";
		$meonly="";
		$both="";
		$tech="";
		$apti="";
		$teap="";
		$inper="";
		$vc="";
		if($row['jobtype']=="Placement")
			$fulltime="selected";
		else
			$internship="selected";
		if($row['programme']=="BE")
			$beonly="selected";
		else if($row['programme']=="ME")
			$meonly="selected";
		else
			$both="selected";
		if($row['written']=="Technical")
			$tech="selected";
		else if($row['written']=="Aptitude")
			$apti="selected";
		else
			$teap="selected";
		if($row['interview']=="In Person")
			$inper="selected";
		else
			$vc="selected";
		if (strpos($row['selection_proc'],"Pre-Placement Talk") !== false) {
        $pptalk="checked";
}
if (strpos($row['selection_proc'],"Shortlist from Resumes") !== false) {
        $sl="checked";
}
if (strpos($row['selection_proc'],"Group Discussion") !== false) {
        $gd="checked";
}
if (strpos($row['branches_be'],"Aerospace Engineering") !== false) {
        $aero="checked";
}
if (strpos($row['branches_be'],"Civil Engineering") !== false) {
        $civil="checked";
}
if (strpos($row['branches_be'],"Computer Science and Engineering") !== false) {
        $cse="checked";
}
if (strpos($row['branches_be'],"Electronics and Communication Engineering") !== false) {
        $ece="checked";
}
if (strpos($row['branches_be'],"Electrical Engineering") !== false) {
        $ee="checked";
}
if (strpos($row['branches_be'],"Mechanical Engineering") !== false) {
        $mech="checked";
}
if (strpos($row['branches_be'],"Materials and Metallurgical Engineering") !== false) {
        $meta="checked";
}
if (strpos($row['branches_be'],"Production and Industrial Engineering") !== false) {
        $prod="checked";
}
if (strpos($row['branches_me'],"Industrial Materials and Metallurgy") !== false) {
        $meind="checked";
}
if (strpos($row['branches_me'],"Civil Engineering (Irrigation and Hydraulics)") !== false) {
        $mecivilwr="checked";
}
if (strpos($row['branches_me'],"Environmental Engineering") !== false) {
        $meenv="checked";
}
if (strpos($row['branches_me'],"Transportation Engineering") !== false) {
        $metran="checked";
}
if (strpos($row['branches_me'],"Electrical Engineering") !== false) {
        $meee="checked";
}
if (strpos($row['branches_me'],"Mechanical Engineering") !== false) {
        $memech="checked";
}
if (strpos($row['branches_me'],"Civil Engineering (Structures)") !== false) {
        $mecivilstru="checked";
}
if (strpos($row['branches_me'],"Production and Industrial Engineering") !== false) {
        $meprod="checked";
}
if (strpos($row['branches_me'],"Electronics (VLSI) Engineering") !== false) {
        $meecevlsi="checked";
}
if (strpos($row['branches_me'],"Computer Science and Engineering") !== false) {
        $mecse="checked";
}
if (strpos($row['branches_me'],"Industrial Design Engineering") !== false) {
        $meinddes="checked";
}
if (strpos($row['branches_me'],"Computer Science and Engineering (Information Security)") !== false) {
        $meis="checked";
}
if (strpos($row['branches_me'],"Electronics Engineering") !== false) {
        $meece="checked";
}
if (strpos($row['branches_me'],"Total Quality Engineering and Management") !== false) {
        $metqem="checked";
}

	$rethtml=$rethtml.'<div id="col1"><h2>Job Details</h2>
	<div id="jobdetails">
	<p>
	<div class="form-group">
	    <label for="type">Job Type</label>
		<select name="type" id="type" class="form-control input-lg">
        <option value="Placement" '.$fulltime.'>Full-Time</option>
  <option value="Internship" '.$internship.'>Internship</option>
  </select>
  </div>
	<div class="form-group">
        <label for="designation">Job Designation </label>
        <input type="text" class="form-control input-lg" name="designation" value="'.$row['job_designation'].'" required>
    </div>
	<div class="form-group">
        <label for="jobdesc">Job Description: </label>
       <textarea name="jobdesc" id="jobdesc" class="form-control input-lg" required>'.$row['job_description'].'</textarea>
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company/ Stipend </label>
        <input type="number" class="form-control input-lg" name="ctc" value="'.$ctc.'">
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company (if different for ME) </label>
        <input type="number" step="any" class="form-control input-lg" name="ctcme" value="'.$ctcme.'">
    </div>
	<div class="form-group">
        <label for="gross">Gross (Take home before Tax and other deuctions) </label>
        <input type="text" class="form-control input-lg" name="gross" value="'.$row['gross'].'">
    </div>
	<div class="form-group">
        <label for="perks">Bonus/Perks/Incentives (if any) </label>
        <input type="text" class="form-control input-lg" name="perks" value="'.$row['perks'].'">
    </div>
	<div class="form-group">
        <label for="bond">Bond or Service Contract (If yes, give details) </label>
        <input type="text" class="form-control input-lg" name="bond" value="'.$row['bond'].'" required>
    </div>
	</p>
	</div>
	<div class="form-group">
	    <label for="prog">Allowed programme(s)</label>
		<select name="prog" id="prog" class="form-control input-lg">
        <option value="BE" '.$beonly.'>BE only</option>
  <option value="ME" '.$meonly.'>ME only</option>
  <option value="BE/ME" '.$both.'>Both BE and ME</option>
  </select>
  </div>
  <h4>Allowed Trades in B.E.</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Aerospace Engineering" id="aero" name="aero" '.$aero.'>Aerospace Engineering</input><br/><br/>
	<input type="checkbox" value="Civil Engineering" name="civil" id="civil" '.$civil.'>Civil Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering" name="cse" id="cse" '.$cse.'>Computer Science and Engineering</input><br/><br/>
	<input type="checkbox" value="Electronics and Communication Engineering" name="ece" id="ece" '.$ece.'>Electronics and Communication Engineering</input><br/><br/>
	<input type="checkbox" value="Electrical Engineering" name="ee" id="ee" '.$ee.'>Electrical Engineering</input><br/><br/>
	<input type="checkbox" value="Mechanical Engineering" name="mech" id="mech" '.$mech.'>Mechanical Engineering</input><br/><br/>
	<input type="checkbox" value="Materials and Metallurgical Engineering" name="meta" id="meta" '.$meta.'>Materials and Metallurgical Engineering</input><br/><br/>
	<input type="checkbox" value=" and Industrial Engineering" name="prod" id="prod" '.$prod.'>Production and Industrial Engineering</input><br/>
	</fieldset>
  </div>
  </div>
  <div id="col3"></div>
  <div id="col2">
  <br><br><br>
  <h4>Allowed Trades in M.E.</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Industrial Materials and Metallurgy" name="meind" id="meind" '. $meind.'>Industrial Materials and Metallurgy</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Irrigation and Hydraulics)" name="mecivilwr" id="mecivilwr" '.$mecivilwr.'>Civil Engineering (Irrigation and Hydraulics)</input><br/><br/>
	<input type="checkbox" value="Environmental Engineering" name="meenv" id="meenv" '.$meenv.'>Environmental Engineering</input><br/><br/>
	<input type="checkbox" value="Transportation Engineering" name="metran" id="metran" '.$metran.'>Transportation Engineering</input><br/><br/>
	<input type="checkbox" value="Production and Industrial Engineering" name="meprod" id="meprod" '.$meprod.'>Production and Industrial Engineering</input><br/><br/>
	<input type="checkbox" value="Electrical Engineering" name="meee" id="meee" '.$meee.'>Electrical Engineering</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Structures)" name="mecivilstru" id="mecivilstru" '.$mecivilstru.'>Civil Engineering (Structures)</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Highways)" name="mecivilhigh" id="mecivilhigh" '.$mecivilhigh.'>Civil Engineering (Highways)</input><br/><br/>
	<input type="checkbox" value="Electronics (VLSI) Engineering" name="meecevlsi" id="meecevlsi" '.$meecevlsi.'>Electronics (VLSI) Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering" name="mecse" id="mecse" '.$mecse.'>Computer Science and Engineering</input><br/><br/>
	<input type="checkbox" value="Industrial Design Engineering" name="meinddes" id="meinddes" '.$meinddes.'>Industrial Design Engineering</input><br/><br/>
	<input type="checkbox" value="Mechanical Engineering" name="memech" id="memech" '.$memech.'>Mechanical Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering (Information Security)" name="meis" id="meis" '.$meis.'>Computer Science and Engineering (Information Security)</input><br/><br/>
	<input type="checkbox" value="Electronics Engineering" name="meece" id="meece" '.$meece.'>Electronics Engineering</input><br/><br/>
	<input type="checkbox" value="Tota; Quality Engineering and Management" name="metqem" id="metqem" '.$metqem.'>Tota; Quality Engineering and Management</input><br/><br/>
	</fieldset>
  </div>
  
	<h2>Selection Procedure</h2>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Pre-Placement Talk" name="pptalk" id="pptalk" '.$pptalk.'>Pre-Placement Talk</input><br/><br/>
	<input type="checkbox" value="Shortlist from Resumes" name="shortlistfromresume" id="shortlistfromresume" '.$sl.'>Shortlist from Resumes</input><br/><br/>
	<input type="checkbox" value="Group Discussion" name="gd" id="gd" '.$gd.'>Group Discussion</input>
	</fieldset>
		
  </div>
  <div class="form-group">
        <label for="cgpa">CGPA Cut-Off (If any) </label>
        <input type="text" class="form-control input-lg" name="cgpa" value="'.$row['cgpa'].'" required>
    </div>
	<div class="form-group">
	    <label for="written">Written Test</label>
		<select name="written" id="written" class="form-control input-lg">
        <option value="Technical" '.$tech.'>Technical</option>
  <option value="Aptitude" '.$apti.'>Aptitude</option>
  <option value="Both" '.$teap.'>Both</option>
  </select>
  </div>
  <div class="form-group">
	    <label for="interview">Interviews</label>
		<select name="interview" id="interview" class="form-control input-lg">
        <option value="In Person" '.$inper.'>In Person</option>
  <option value="Video Conferencing" '.$vc.'>Video Conferencing</option>
  </select>
  </div>
  <div class="form-group">
  <label for="other">Any other (Specify)</label>
  <input type="text" class="form-control input-lg" name="other" value="'.$row['other'].'" required>
  </div>
  <div class="form-group">
  <label for="dateofvisit">Date of Visit</label>
  <input type="date" class="form-control input-lg" value="'.$row['dateofvisit'].'" name="dateofvisit">
  </div>
  <div class="form-group">
  <label for="deadline">Application Deadline</label>
  <input type="date" format="yyyy-mm-dd" class="form-control input-lg" name="deadline" value="'.$row['deadline'].'" required>
  </div>
  </div>
  <button id="editbtn" class="btn btn-primary btn-lg btn-block">Preview</button>
  </form>';
	}
	
}
echo $rethtml;
$mysqli->close();
?>