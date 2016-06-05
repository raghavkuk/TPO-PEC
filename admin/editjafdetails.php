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
if (strpos($row['branches_be'],"Aerospace") !== false) {
        $aero="checked";
}
if (strpos($row['branches_be'],"Civil") !== false) {
        $civil="checked";
}
if (strpos($row['branches_be'],"Computer Science") !== false) {
        $cse="checked";
}
if (strpos($row['branches_be'],"Electronics and Communication") !== false) {
        $ece="checked";
}
if (strpos($row['branches_be'],"Electrical") !== false) {
        $ee="checked";
}
if (strpos($row['branches_be'],"Mechanical") !== false) {
        $mech="checked";
}
if (strpos($row['branches_be'],"Metallurgy") !== false) {
        $meta="checked";
}
if (strpos($row['branches_be'],"Production") !== false) {
        $prod="checked";
}
if (strpos($row['branches_me'],"Industrial Material Metallurgy") !== false) {
        $meind="checked";
}
if (strpos($row['branches_me'],"Civil (Water Resources)") !== false) {
        $mecivilwr="checked";
}
if (strpos($row['branches_me'],"Environmental Engineering") !== false) {
        $meenv="checked";
}
if (strpos($row['branches_me'],"Transportation Engineering") !== false) {
        $metran="checked";
}
if (strpos($row['branches_me'],"Electrical") !== false) {
        $meee="checked";
}
if (strpos($row['branches_me'],"Mechanical") !== false) {
        $memech="checked";
}
if (strpos($row['branches_me'],"Civil (Structure)") !== false) {
        $mecivilstru="checked";
}
if (strpos($row['branches_me'],"Production") !== false) {
        $meprod="checked";
}
if (strpos($row['branches_me'],"Electronics (VLSI)") !== false) {
        $meecevlsi="checked";
}
if (strpos($row['branches_me'],"Computer Science") !== false) {
        $mecse="checked";
}
if (strpos($row['branches_me'],"Industrial Design") !== false) {
        $meinddes="checked";
}
if (strpos($row['branches_me'],"Computer Science (Information Security)") !== false) {
        $meis="checked";
}
if (strpos($row['branches_me'],"Electronics") !== false) {
        $meece="checked";
}
if (strpos($row['branches_me'],"TQEM") !== false) {
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
	<input type="checkbox" value="Aerospace" id="aero" name="aero" '.$aero.'>Aerospace</input><br/><br/>
	<input type="checkbox" value="Civil" name="civil" id="civil" '.$civil.'>Civil</input><br/><br/>
	<input type="checkbox" value="Computer Science" name="cse" id="cse" '.$cse.'>Computer Science</input><br/><br/>
	<input type="checkbox" value="Electronics and Communication" name="ece" id="ece" '.$ece.'>Electronics and Communication</input><br/><br/>
	<input type="checkbox" value="Electrical" name="ee" id="ee" '.$ee.'>Electrical</input><br/><br/>
	<input type="checkbox" value="Mechanical" name="mech" id="mech" '.$mech.'>Mechanical</input><br/><br/>
	<input type="checkbox" value="Metallurgy" name="meta" id="meta" '.$meta.'>Metallurgy</input><br/><br/>
	<input type="checkbox" value="Production" name="prod" id="prod" '.$prod.'>Production</input><br/>
	</fieldset>
  </div>
  </div>
  <div id="col3"></div>
  <div id="col2">
  <br><br><br>
  <h4>Allowed Trades in M.E.</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Industrial Material Metallurgy" name="meind" id="meind" '. $meind.'>Industrial Material Metallurgy</input><br/><br/>
	<input type="checkbox" value="Civil (Water Resources)" name="mecivilwr" id="mecivilwr" '.$mecivilwr.'>Civil (Water Resources)</input><br/><br/>
	<input type="checkbox" value="Environmental Engineering" name="meenv" id="meenv" '.$meenv.'>Environmental Engineering</input><br/><br/>
	<input type="checkbox" value="Transportation Engineering" name="metran" id="metran" '.$metran.'>Transportation Engineering</input><br/><br/>
	<input type="checkbox" value="Production" name="meprod" id="meprod" '.$meprod.'>Production</input><br/><br/>
	<input type="checkbox" value="Electrical" name="meee" id="meee" '.$meee.'>Electrical</input><br/><br/>
	<input type="checkbox" value="Civil (Structure)" name="mecivilstru" id="mecivilstru" '.$mecivilstru.'>Civil (Structure)</input><br/><br/>
	<input type="checkbox" value="Electronics (VLSI)" name="meecevlsi" id="meecevlsi" '.$meecevlsi.'>Electronics (VLSI)</input><br/><br/>
	<input type="checkbox" value="Computer Science" name="mecse" id="mecse" '.$mecse.'>Computer Science</input><br/><br/>
	<input type="checkbox" value="Industrial Design" name="meinddes" id="meinddes" '.$meinddes.'>Industrial Design</input><br/><br/>
	<input type="checkbox" value="Mechanical" name="memech" id="memech" '.$memech.'>Mechanical</input><br/><br/>
	<input type="checkbox" value="Computer Science (Information Security)" name="meis" id="meis" '.$meis.'>Computer Science (Information Security)</input><br/><br/>
	<input type="checkbox" value="Electronics" name="meece" id="meece" '.$meece.'>Electronics</input><br/><br/>
	<input type="checkbox" value="TQEM" name="metqem" id="metqem" '.$metqem.'>TQEM</input><br/><br/>
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