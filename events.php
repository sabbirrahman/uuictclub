<?php require_once "includes/config.php"	; ?>
<?php require_once "classes/Event.php"		; ?>
<?php require_once "classes/Member.php"		; ?>
<?php
	$page = (isset($_GET['page']))? pure_it($_GET['page']) : 1;
	$to = intval($page) * 4;
	$from = $to - 3;
	$first = 1;
	$last = ceil((PastEvent::count()/4));
?>
<?php
	function getWinner($UID){
		$ret = explode(', ', $UID);
		if(count($ret)>1){
			foreach ($ret as $value) {
				echo getWinner($value) . "<br>";
			}
		}
		if(preg_match("/^UIC-/", $UID)) {
			$Member = new Member($UID);
			if($Member->getFacebook()){
				return "<a href='" . $Member->getFacebook() . "' style='color:#3091BA'>" . $Member->getTotalFullName() . "</a>";
			} else {
				return $Member->getTotalFullName();
			}
		} elseif(count($ret)==1) {
			return $UID;
		}
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
	<title>Events</title>
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
		<?php
            UpcomingEvent::getUpcomingEvents();
            if(mysqli_fetch_assoc(UpcomingEvent::$UpcomingEvents)) {
        ?>
		<section class="events upcomingevent">
			<div class="container">
			<h2>Upcoming Events</h2>
			<h3>These are the upcoming events arranged by UU ICT CLUB</h3>
				<div class="row">
					<?php
            			UpcomingEvent::getUpcomingEvents();
			            while($Event = mysqli_fetch_assoc(UpcomingEvent::$UpcomingEvents)){
			                $UpcomingEvent = new UpcomingEvent($Event['Event_ID']);
			                extract($UpcomingEvent->EventInfo);
							$date = new DateTime($TimeNDate);
							$TimeNDate = $date->format('h:i A, dS F, Y');
					?>
					<div class="columns twelve">
						<div class="box">
							<div class="title"><?= $Title ?></div>
							<div class="img" style="background: url('<?= $Image ?>') no-repeat; background-size: 100% 100%"></div>
							<div class="info"><span class="bold">Time &amp Date: </span><br><?= $TimeNDate ?>	</div>
							<div class="info"><span class="bold">Venue: 		 </span><br><?= $Venue ?>	 	</div>
							<div class="info"><span class="bold">Description:	 </span><br><?= $Description ?>	</div>
							<?php if($Rules) { ?>
								<div class="evntrules"><span class="bold">Rules &amp Regulations:</span><br><?= $Rules ?></div>
							<?php } ?>
							<?php if($Link && $LinkName) { ?>
								<a href="<?= $Link ?>" target="_blank"><div class="evntlink button"><?= $LinkName ?></div></a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>
		<section id="recentevent" class="events recentevent">
			<div class="container">
				<h2>Recent Events</h2>
				<h3>These are the recent events arranged by UU ICT CLUB</h3>
				<div class="navbuttons">     
		            <?php if($page==$first) { ?>
		                <a href="events.php?page=<?=$last?>#recentevent"><div id="p" class="np icon32x32 i3"><p>Previous</p></div></a>
		            <?php } else { ?>
		                <a href="events.php?page=<?=$page-1?>#recentevent"><div id="p" class="np icon32x32 i3"><p>Previous</p></div></a>
		            <?php } ?>
		            <?php if($page==$last) { ?>
		                <a href="events.php?page=<?=$first?>#recentevent"><div id="n" class="np icon32x32 i4"><p>Next</p></div></a>
		            <?php } else { ?>
		                <a href="events.php?page=<?=$page+1?>#recentevent"><div id="n" class="np icon32x32 i4"><p>Next</p></div></a>
		            <?php } ?>
				</div>
				<div class="row">	
            		<?php
            			PastEvent::getPastEvents();
			            for($i=1; $Event = mysqli_fetch_assoc(PastEvent::$PastEvents); $i++){
							if($i>=$from && $i<=$to){
								$PastEvent = new PastEvent($Event['Event_ID']);
								extract($PastEvent->EventInfo);
								$date = new DateTime($TimeNDate);
								$TimeNDate = $date->format('h:i A, dS F, Y');
					?>
					<div class="columns twelve">
						<div id="evt<?= $Event_ID ?>" class="box">
							<div class="title"><?= $Title ?></div>
							<div class="img" style="background: url('<?= $Image ?>') no-repeat; background-size: 100% 100%"></div>
							<div class="info"><span class="bold">Time &amp Date: </span><br><?= $TimeNDate ?>	</div>
							<div class="info"><span class="bold">Venue: 		 </span><br><?= $Venue ?>		</div>
							<div class="info"><span class="bold">Description:	 </span><br><?= $Description ?>	</div>
							<?php if($Rules) { ?>
								<div class="info"><span class="bold">Rules &amp Regulations:</span><br><?= $Rules ?></div>
							<?php } ?>
							<?php if($FirstPlace || $SecondPlace || $ThirdPlace) { ?>
								<div class="info"><span class="bold">Winners:</span><br>
									<?php if($FirstPlace)  { ?><div><b>Champion:</b> 		 <?= getWinner($FirstPlace) ?> </div><?php } ?>
									<?php if($SecondPlace) { ?><div><b>First Runner-Up:</b>  <?= getWinner($SecondPlace) ?></div><?php } ?>
									<?php if($ThirdPlace)  { ?><div><b>Second Runner-Up:</b> <?= getWinner($ThirdPlace) ?> </div><?php } ?>
								</div>
							<?php } ?>
							<?php if($Link && $LinkName) { ?>
								<a href="<?= $Link ?>" target="_blank"><div class="evntlink button"><?= $LinkName ?></div></a>
							<?php } ?>
						</div>
					</div>
					<?php 	
							}
						} 
					?>
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