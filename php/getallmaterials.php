<?php
	require_once("fetch-app.php");
	$offset = $_GET['offset'];
    $limit = $_GET['limit'];
	FetchApp::getAllMaterials($offset, $limit, $_POST);
?>