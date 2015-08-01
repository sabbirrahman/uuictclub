<?php
	require_once "../includes/config.php";
	require_once "../classes/Member.php";
	$TM = new TempMember($_POST["UID"]);
    $TM->Reject();
?>