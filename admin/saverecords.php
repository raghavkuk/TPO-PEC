<?php

session_start();
if(!empty($_POST))
{
    include '../db_connection.php';
	foreach($_POST as $field_name => $val)
    {
        //clean post values
        $field_userid = strip_tags(trim($field_name));
        $val = strip_tags(trim($mysqli->real_escape_string($val)));
        //from the fieldname:user_id we need to get user_id
        $split_data = explode(':', $field_userid);
        $user_id = $split_data[1];
        $field_name = $split_data[0];
        if(!empty($user_id) && !empty($field_name) && !empty($val))
        {
            //update the values
			$sql="UPDATE placementdetails_be SET $field_name = '$val' WHERE sid = $user_id";
			if($mysqli->query($sql)==TRUE)
			{
				echo "Success";
			}
         
         else {
            echo "Invalid Requests";
        }
    
} else {
    echo "Invalid Requests";
}
	}
}
?>