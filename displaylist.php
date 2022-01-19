<?php 

global $wpdb;
$tablename = $wpdb->prefix."udmanage";

// Delete record
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>User Data Table</h1>
<div>
	<table width='80%' border='1' style='border-collapse: collapse;'>
		<tr>
			<th>No</th>
			<th>UserId</th>
			<th>Username</th>
			<th>Email</th>
			<th>Created</th>
			<th>&nbsp;</th>
		</tr>
		<?php
		// Select records
		$entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by modify_date");
		if(count($entriesList) > 0){
			$count = 1;
			foreach($entriesList as $entry){
				$id = $entry->id;
				$name = $entry->user_name;
				$gmail = $entry->user_mail;
				$amazone_id = $entry->amazon_id;
				$datetime = $entry->modify_date;

				echo "<tr>
					<td>".$id."</td>
					<td>".$name."</td>
					<td>".$gmail."</td>
					<td>".$amazone_id."</td>
					<td>".$datetime."</td>
					<td><a href='?page=allusers&delid=".$id."'>Delete</a></td>
				</tr>
				";
				$count++;
			}
		}else{
			echo "<tr><td colspan='5'>No record found</td></tr>";
		}
		?>
	</table>
</div>