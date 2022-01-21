<?php 

global $wpdb;
$tablename = $wpdb->prefix."udmanage";
define( 'DMANGE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Delete record
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
<link rel="stylesheet" href="<?php echo esc_url( plugins_url( '/css/main.css', __FILE__ ) ) ?>" crossorigin="anonymous" >


<h1>Clients contact table </h1>
<div class="udmanage">
	<?php
		// $entriesList = $wpdb->get_results("SELECT * FROM npg_wpforms_entries");
		// if(count($entriesList) > 0){
		// 	foreach($entriesList as $entry){
		// 		print_r($entry->fields);
		// 		echo '<br>';
		// 	}
		// }
		// exit;

		// $entriesList = $wpdb->get_results("SELECT * FROM npg_wpforms_entry_fields LIMIT 100 WHERE form_id = 197");
		// if(count($entriesList) > 0){
		// 	foreach($entriesList as $entry){
		// 		echo $entry->id.", ".$entry->entry_id.", ".$entry->form_id.", ".$entry->field_id.", ".$entry->value.'<br>';
		// 	}
		// }
		// exit;
	?>
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
			</tr>
		</thead>
		<tbody>
		<?php
		// Select records
		$entriesList = $wpdb->get_results("SELECT * FROM npg_wpforms_entry_fields");
		if(count($entriesList) > 0){
			$count = 1;
			$startVal = 0;
			$userArray = array();
			$record = array();
			$testFlag = 0;
			foreach($entriesList as $entry){
				$field_id = $entry->field_id;
				if ($testFlag == 0)
					$field_id = $testFlag;
				if ($testFlag == $field_id && $startVal!= 0 ){
					for ($i = $startVal; $i <=5; $i++)
					{
						array_push($userArray, "");
						$startVal++;
					}
				}
				if ($startVal > 5)
				{
					$startVal = 0;
					array_push($userArray, $record);
					$record = array();
				}
				array_push($record,$entry->value);
				$startVal++;
			}
			foreach($userArray as $entry){
				//$id = $entry->id;
				$name = $entry[0];
				$gmail = $entry[1];
				$amazone_id = $entry[2];
				$usein = $entry[3];
				$starrate = $entry[4];
				$datetime = $entry[5];

				$usein = $usein == "YES" ? "<i class='fas fa-shopping-cart'></i>" : " ";
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
					
				</tr>
				";
				//<td class='delete'><a num='".$id."' class='delete hover-white' alt='Click here to delete record.'><i class='fas fa-times' ></i></a></td>
				$count++;
			}
		}else{
			echo "<tr><td colspan='5'>No record found</td></tr>";
		}
		?>
		</tbody>
	</table>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo esc_url( plugins_url( '/plugins/jquery-3.6.0.min.js', __FILE__ ) ) ?>" crossorigin="anonymous"></script>
<script src="<?php echo esc_url( plugins_url( '/plugins/fancyTable.js', __FILE__ ) ); ?>"></script>
<script src="<?php echo esc_url( plugins_url( '/js/template.js', __FILE__ ) ); ?>"></script>