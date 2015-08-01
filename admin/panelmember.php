<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php require_once "../classes/PanelMember.php"	; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>Panel Members</title>
	<meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin.css" />
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script>
	<![endif]-->
    <style>
		.person input[type=text] {
			height:30px;
			border:0px;
			width:100%;
			background:none;
			text-align:center;
		}
		.button {
			width: 100%;
			border: none;
		}
		.floatingPanel .button {
			width: 49%;
			margin: 10px auto;
			border: none;
			display: inline-block;
		}
	</style>
</head>

<body>
	<?php require_once 'adminnav.php'; ?>
	<?php if(isset($_GET['updateSuccess']) && $_GET['updateSuccess']){ ?>
	<h3 class="success warnc">Panel Member Successfully Updated!</h3>
	<?php } ?>
	<?php if(isset($_GET['updateError']) && $_GET['updateError']){ ?>
	<h3 class="warning warnc">Sorry! Updating can not be completed. One or some members are already a Panel Member.</h3>
	<?php } ?>
	<?php if(isset($_GET['archiveSuccess']) && $_GET['archiveSuccess']){ ?>
	<h3 class="success warnc">Successfully Archived!</h3>
	<?php } ?>
	<?php if(isset($_GET['archiveError']) && $_GET['archiveError']){ ?>
	<h3 class="warning warnc">Sorry! Archiving can not be completed. One or some members are already in the archive.</h3>
	<?php } ?>
    <main class="panelmemberview">
        <section class="panel">
            <div class="container">
				<form method="post" action="actions/PanelUpdateAction.php">
	                <div class="row">
	                    <?php
			                foreach(PanelMember::$Designations as $key => $value){
			                    $PanelMember = new PanelMember($key);
	                    ?>
	                    <div class="columns two">
	                        <div class="person">
	                            <div class="img" style="background: url('<?= $PanelMember->getImage(); ?>') no-repeat; background-size: 100% 100%;"></div>
	                            <p class="info italic"><?= $PanelMember->getFullName(); ?></p>
	                            <p class="highlight"><?= $value; ?></p>
	                            <p class="info"><span class="bold">ID:</span> <?= $PanelMember->getStudentID(); ?></p>
	                            <p class="info"><span class="bold">Batch:</span> <?= format_position($PanelMember->getBatch()); ?></p><td class='P_ID'>
	                            <input type="text" name="<?= $key ?>" value="<?= $PanelMember->getUserID() ?>"/>
	                            <div class="icons">
	                                <div class="icon32x32 n17" title="<?= $PanelMember->getContactNo(); ?>"></div>
	                                <a href="mailto:<?= $PanelMember->getEmail(); ?>"><div class="icon32x32 n18" title="<?= $PanelMember->getEmail(); ?>"></div></a>
	                            </div>
	                        </div>
	                    </div>
	                	<?php } ?>
	                	<div class="columns two">
	                		<div class="person">
	        					<input class="button" type="submit" value="Update" name="update_panel" />
	                		</div>
	                	</div>
	                	<div class="columns two">
	                		<div class="person">
	       						<div class="button archiveButton">Archive</div>
	                		</div>
	                	</div>
	                </div>
		        </form>
            </div>
        </section>
    </main>
    <main class="floatingPanel">
        <section id="form-container" class="form-container archivepanelform">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
	                        <h2>Archive Panel Members</h2>
                            <form class="form" name="ArchivePanel" method="post" action="actions/PanelArchiveAction.php">
	                            <label>Please Enter Sesion Details</label><br>
	                            <label>From:</label>
	                            <input type="text" name="session_from"/>
	                            <label>To:</label>
	                            <input type="text" name="session_to"/>
			        			<input class="button" type="submit" value="Archive" name="archive_panel" style="width:49%" />
		       					<div class="button cancelButton">Cancel</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
	<!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>