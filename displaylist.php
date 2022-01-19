<?php 

global $wpdb;
$tablename = $wpdb->prefix."udmanage";

// Delete record
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
<link rel="stylesheet" href="<?php echo plugins_url('/udmanage/css/main.css'); ?>" />


<h1>User Data Table </h1>
<div class="udmanage">
	<table id = "usertable" class="table table-bordered table-striped table-hover table-sm">
		<thead class="table-info">
			<tr class="title">
				<th>No</th>
				<th>Full name</th>
				<th>Email address</th>
				<th>Amazon order id</th>
				<th>Use in 7days</th>
				<th>Star rate</th>
				<th>Created in</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
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
				$usein = $entry->usein_7day;
				$starrate = $entry->star_rate;
				$datetime = $entry->modify_date;

				$usein = $usein >= 1 ? "<i class='fas fa-shopping-cart'></i>" : " ";
				echo "<tr>
					<td>".$count."</td>
					<td>".$name."</td>
					<td>".$gmail."</td>
					<td>".$amazone_id."</td>
					<td class='text-primary'>".$usein."</td>
					<td class='starrate'>";
					for ( $i = 0; $i < 5; $i++)
					{
						if ($starrate <= $i)
							echo '<i class="far fa-star"></i>';
						else
							echo '<i class="fas fa-star"></i>';
					}
				echo "</td>
					<td>".$datetime."</td>
					<td><a href='' num='".$id."' class='delete hover-white' alt='Click here to delete record.'><i class='fas fa-times' ></i></a></td>
				</tr>
				";
				$count++;
			}
		}else{
			echo "<tr><td colspan='5'>No record found</td></tr>";
		}
		?>
		</tbody>
	</table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo plugins_url('/udmanage/plugins/jquery-3.6.0.min.js'); ?>"></script>
<script src="<?php echo plugins_url('/udmanage/plugins/fancyTable.min.js'); ?>"></script>
<script src="<?php echo plugins_url('/udmanage/js/template.js'); ?>"></script>