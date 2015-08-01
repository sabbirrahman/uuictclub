<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php require_once "../classes/PanelMember.php"	; ?>
<?php
	if(isset($_POST['update_panel'])) {
		foreach(PanelMember::$Designations as $key => $value){
			$Member = new Member($_POST[$key]);
			if($Member->isPanelMember() && $Member->getPosition() != $key){
				header("Location: ../admin/panelmember.php?updateError=1");
				exit;
			}
		}
		foreach(PanelMember::$Designations as $key => $value){
			$Panel = new PanelMember($key);
			$memberid = pure_it($_POST[$key]);
			$Panel->updateResponsibility($key, $memberid);
		}
		header("Location: ../admin/panelmember.php?updateSuccess=1");
		exit;
	}
?>