<?php 

global $wpdb;
$tablename = $wpdb->prefix."udmanage";

// Delete record
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
	return "res";
}
?>