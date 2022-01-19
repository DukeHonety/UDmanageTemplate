<?php 

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$amazon = $_POST['txt_amazonid'];
	$usein = $_POST['txt_usein'];
	$starrate = $_POST['txt_starrate'];
	$tablename = $wpdb->prefix."udmanage";

	if($name != '' && $amazon != '' && $email != ''){
		$check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE user_mail='".$email."' ");
	    if(count($check_data) == 0){
	        $insert_sql = "INSERT INTO ".$tablename."(user_name, user_mail, amazon_id, usein_7day, star_rate, modify_date) values('".$name."','".$email."','".$amazon."','".$usein."','".$starrate."','".date("Y-m-d h:i:sa")."') ";
	        $wpdb->query($insert_sql);
	        echo "Save sucessfully.";
	    }
	}
}
?>
<h1>Add New User Data</h1>
<form method='post' action=''>
	<table>
		<tr>
			<td>Full Name</td>
			<td><input type='text' name='txt_name'></td>
		</tr>
		<tr>
			<td>Email address</td>
			<td><input type='text' name='txt_email'></td>
		</tr>
		<tr>
			<td>Amazon order id</td>
			<td><input type='number' name='txt_amazonid'></td>
		</tr>
		<tr>
			<td>Use in 7 days</td>
			<td><input type='checkbox' name='txt_usein' value="1"> Have you used our product for at least 7 days?</td>
		</tr>
		<tr>
			<td>STAR RATING</td>
			<td><input type='number' name='txt_starrate' max="5"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='but_submit' value='Submit'></td>
		</tr>
	</table>
</form>