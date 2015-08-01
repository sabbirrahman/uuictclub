<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
	$file = "../config/contest_config.json";
    $contest_json    = file_get_contents($file);
    $contest_config  = json_decode($contest_json, true);
    extract($contest_config);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin.css" />
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script>
	<![endif]-->
</head>

<body style="height:100%">
	<?php require_once 'adminnav.php'; ?>
	<?php if(isset($_GET['success']) && $_GET['success']) { ?>
		<div class="floatingPanel success" style="display:block">
	    	<div class="success warnc">Settings Updated</div>
	    </div>
    <?php } ?>
	<main>
		<section id="form-container" class="form-container">
			<div class="container">
				<div class="row">
                    <div class="columns twelve">
                        <div class="box">
                        	<h2>Settings</h2>
							<form class="form" method="post" action="actions/SaveSettingsAction.php">
								<label>Contest Status:</label><br>
								<label><input class="pconteststatus" type="checkbox" name="PCONTEST" <?php if($PCONTEST) echo "checked" ?>>Programming Contest </label><br>
								<label><input class="gconteststatus" type="checkbox" name="GCONTEST" <?php if($GCONTEST) echo "checked" ?>>Gaming Contest	   </label><br>
								<div class="gamelist" <?php if(!$GCONTEST) echo "style='display:none'"?>>
									<label>Games:</label><br>
									<label><input type="checkbox" name="QUIZ"    <?php if($QUIZ) echo "checked" ?>>Online ICT Quiz					</label><br>
									<label><input type="checkbox" name="NFSM"    <?php if($NFSM) echo "checked" ?>>Need for Speed - Mostwanted		</label><br>
									<label><input type="checkbox" name="FIFA"    <?php if($FIFA) echo "checked" ?>>FIFA 14							</label><br>
									<label><input type="checkbox" name="COD4"    <?php if($COD4) echo "checked" ?>>Call of Duty - Modern Warefare	</label><br>
									<label><input type="checkbox" name="CHESS"   <?php if($CHESS) echo "checked" ?>>Chess							</label><br>
									<label><input type="checkbox" name="CARROM"  <?php if($CARROM) echo "checked" ?>>Carrom 						</label><br>
									<label><input type="checkbox" name="TTENNIS" <?php if($TTENNIS) echo "checked" ?>>Table Tennis 					</label><br>
								</div>
			                    <label for="OLD_PWD">Old Password</label>
			                    <input type="password" id="OLD_PWD" name="OLD_PWD" placeholder="enter your old password" />
			                    <?php if(isset($_GET['Invalid_Pass'])) { ?><div class="warning"><?= pure_it($_GET['Invalid_Pass']); ?></div><?php } ?>
			                    
			                    <label for="NEW_PWD">New Password</label>
			                    <input type="password" id="NEW_PWD" name="NEW_PWD" placeholder="enter new password" />
			                    
			                    <label for="RE_PWD">Re-Type New Password</label>
			                    <input type="password" id="RE_PWD" name="RE_PWD" placeholder="re-type new password" />
			                    <?php if(isset($_GET['Miss_Match'])) { ?><div class="warning"><?= pure_it($_GET['Miss_Match']); ?></div><?php } ?>
			                                
			                    <input type="submit" name="Save_Settings" value="Save Settings" />
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