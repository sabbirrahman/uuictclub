<?php require_once "includes/config.php"		; ?>
<?php require_once "includes/functions.php"		; ?>
<?php require_once "classes/Member.php"			; ?>
<?php require_once "classes/PanelMember.php"	; ?>
<?php
	$group;
	$first = 1;
	$last = PanelMember::count();
	if(isset($_GET['group'])){
		$group = pure_it($_GET['group']);
	} elseif(PanelMember::isCurrentPanelMembersArchived()) {
		$group = PanelMember::count();
	} else {
		$group = PanelMember::count() + 1;
		$last  = PanelMember::count() + 1;
	}
	PanelMember::getFromTo($group);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>Controlers</title>
	<meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css" />
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
	<?php require_once "header.php"	; ?>
	<main>
		<section class="controlers">
			<div class="container">	
				<h2>Control Panel Members</h2>
				<h3>These are the volunteered &amp dedicated students of Department of CSE</h3>
				<?php if(PanelMember::$from && PanelMember::$to){ ?>
				<h3>Session: <?= PanelMember::$from ?> to <?= (PanelMember::$to)?PanelMember::$to:"Present" ?></h3>
				<?php } ?>
				<?php if(PanelMember::count()>0) { ?>
				<div class="navbuttons">
		            <?php if($group!=$first) { ?>
						<?php PanelMember::getFromTo($group-1) ?>
		                <a href="controlers.php?from=<?=PanelMember::$from?>&to=<?=PanelMember::$to?>&group=<?=$group-1?>">	<div id="p" class="np icon32x32 i6"><p>Previous</p></div></a>
		            <?php } ?>
		            <?php if($group!=$last) { ?>
						<?php PanelMember::getFromTo($group+1) ?>
		                <a href="controlers.php?from=<?=PanelMember::$from?>&to=<?=PanelMember::$to?>&group=<?=$group+1?>">	<div id="n" class="np icon32x32 i7"><p>Next</p></div></a>
		            <?php } ?>
				</div>
				<?php } ?>
				<div class="row">
					<?php
						$DB = new Database();
						foreach(PanelMember::$Designations as $key=>$value){
							if(isset($_GET['from']) && isset($_GET['to'])){
								$sql = "SELECT UID FROM panelmembers WHERE Responsibility = '" . $key . "' AND session_from = '" . pure_it($_GET['from']) . "' AND session_to = '" . pure_it($_GET['to']) . "'";
								$result = $DB->query($sql);
								$row = $DB->fetch($result);
								$PanelMember = new Member($row['UID']);
							} elseif(isset($_GET['group'])){
								$sql = "SELECT UID FROM panelmembers WHERE Responsibility = '" . $key . "' AND session_group = '" . pure_it($_GET['group']) . "'";
								$result = $DB->query($sql);
								$row = $DB->fetch($result);
								$PanelMember = new Member($row['UID']);
							} else {
								$PanelMember = new PanelMember($key);
							}
					?>
					<div class="columns three">
						<div class="person">
							<div class="img" style="background: url('<?= $PanelMember->getImage() ?>') no-repeat; background-size: 100% 100%;"></div>
							<p class="info italic"><?= $PanelMember->getTotalFullName() ?></p>
							<p class="highlight"><?= $value ?></p>
							<p class="info"><span class="bold">ID: </span><?=$PanelMember->getStudentID() ?></p>
							<p class="info"><span class="bold">Batch: </span><?= format_position($PanelMember->getBatch()) ?></p>
							<p class="info w60">Department of Computer Science &amp Engineering
							<br>Uttara University</p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</main>
	<?php require_once "footer.php"	; ?>
	<!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>