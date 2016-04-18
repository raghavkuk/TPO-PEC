<?php
session_start();
include '../db_connection.php';
$jafid=$_GET['jafid'];
$rethtml = "";
$pptalk="";
$sl="";
$gd="";
$sql="SELECT * from jaf_details where JAF_id='".$jafid."'";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml=$rethtml."<form id='jaf' method='post' action='savejaftpo.php' class='col-md-5'>";
	while($row=$result->fetch_assoc()) {
		if (strpos($row['selection_proc'],"Pre-Placement Talk") !== false) {
        $pptalk="checked";
}
if (strpos($row['selection_proc'],"Shortlist from Resumes") !== false) {
        $sl="checked";
}
if (strpos($row['selection_proc'],"Group Discussion") !== false) {
        $gd="checked";
}
	$rethtml=$rethtml.'<h2>Job Details</h2>
	<div id="jobdetails">
	<p>
	<div class="form-group">
        <label for="designation">Job Designation </label>
        <input type="text" class="form-control input-lg" name="designation" value="'.$row['job_designation'].'" required>
    </div>
	<div class="form-group">
        <label for="jobdesc">Job Description: </label>
       <textarea name="jobdesc" id="jobdesc" class="form-control input-lg" required>'.$row['job_description'].'</textarea>
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company </label>
        <input type="number" class="form-control input-lg" name="ctc" value="'.$row['ctc'].'" required>
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
	<h2>Selection Procedure</h2>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Pre-Placement Talk" name="pptalk" '.$pptalk.'>Pre-Placement Talk</input><br/><br/>
	<input type="checkbox" value="Shortlist from Resumes" name="shortlistfromresume" '.$sl.'>Shortlist from Resumes</input><br/><br/>
	<input type="checkbox" value="Group Discussion" name="gd" '.$gd.'>Group Discussion</input>
	</fieldset>
		
  </div>
  <div class="form-group">
        <label for="cgpa">CGPA Cut-Off (If any) </label>
        <input type="text" class="form-control input-lg" name="cgpa" value="'.$row['cgpa'].'" required>
    </div>
	<div class="form-group">
	    <label for="written">Written Test</label>
		<select name="written" id="written" class="form-control input-lg" value="'.$row['written'].'">
        <option value="Technical">Technical</option>
  <option value="Aptitude">Aptitude</option>
  <option value="Both">Both</option>
  </select>
  </div>
  <div class="form-group">
	    <label for="interview">Interviews</label>
		<select name="interview" id="interview" class="form-control input-lg" value="'.$row['interview'].'">
        <option value="In Person">In Person</option>
  <option value="Video Conferencing">Video Conferencing</option>
  </select>
  </div>
  <div class="form-group">
  <label for="other">Any other (Specify)</label>
  <input type="text" class="form-control input-lg" name="other" value="'.$row['other'].'" required>
  </div>
  <div class="form-group">
  <label for="deadline">Application Deadline</label>
  <input type="date" format="yyyy-mm-dd" class="form-control input-lg" name="deadline" value="'.$row['deadline'].'" required>
  </div>
  <input type="submit" value="EDIT">
  </form>';
	}
	
}
echo $rethtml;
$mysqli->close();
?>