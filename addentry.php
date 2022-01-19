<?php 

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$amazon = $_POST['txt_amazonid'];
	$tablename = $wpdb->prefix."udmanage";

	if($name != '' && $amazon != '' && $email != ''){
		$check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE user_mail='".$email."' ");
	    if(count($check_data) == 0){
	        $insert_sql = "INSERT INTO ".$tablename."(user_name, user_mail, amazon_id, modify_date) values('".$name."','".$email."','".$amazon."','".date("Y-m-d h:i:sa")."') ";
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
			<td>Name</td>
			<td><input type='text' name='txt_name'></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='txt_email'></td>
		</tr>
		<tr>
			<td>Amazon_id</td>
			<td><input type='text' name='txt_amazonid'></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='but_submit' value='Submit'></td>
		</tr>
	</table>
</form>