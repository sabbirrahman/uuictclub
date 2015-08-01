<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php require_once "../classes/PanelMember.php"	; ?>
<?php
	if(isset($_POST['archive_panel'])){
		$DB = new Database();
		$session_group = PanelMember::count()+1;
		foreach(PanelMember::$Designations as $key=>$value){
			$PanelMember = new PanelMember($key);
			if($PanelMember->isArchived()){
				header("Location: ../admin/panelmember.php?archiveError=1");
				exit;
			}
		}
		if(!$archiveError){
			foreach(PanelMember::$Designations as $key=>$value){
				$PanelMember = new PanelMember($key);
				$data = array();
				$data['UID'				]	= 	$PanelMember->getUserID();
				$data['Responsibility'	]	=	$PanelMember->getPosition();
				$data['session_from'	]	=	pure_it($_POST['session_from']);
				$data['session_to'		]	=	pure_it($_POST['session_to']);
				$data['session_group'	]	=	$session_group;
				$DB->insert('panelmembers', $data);
			}
			$DB->close();
			header("Location: ../admin/panelmember.php?archiveSuccess=1");
			exit;
		}
	}
?>