<?php require_once "includes/config.php" ; ?>
<?php require_once "classes/Member.php"	 ; ?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>UU ICT CLUB</title>
	<meta charset="utf-8">
	<meta name="description" content="UU ICT CLUB is a Information and Communication Technology club of Uttara University. It is divided into three units. Unit of ICT, Unit of Culture and Unit of Games & Sports." />
	<meta name="keyword" content="UU ICT CLUB,uu ict club,UUICTCLUB,uuictclub,Uttara University,UU,uu,UUCSE,uucse" />
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css" />
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script>
	<![endif]-->
	<style>
		.section-join 	{ 	background: url("img/circuite_black.jpg"); 		}
		.unitimg 		{	background: url('img/uniticon.png') no-repeat; 	}
	</style>
</head>

<body>
	<?php require_once "header.php"	; ?>
	<main>
		<section class="section-join">
			<div class="join-background2">
				<div class="container">
					<h1>UU ICT CLUB</h1>
					<h3>Express your latent talent with us</h3>
					<div class="join-form">
						<form action="registration.php" method="get">
							<input type="text" name="StudentID" placeholder="enter your student id"autocomplete="off">
							<input type="submit" value="Join">
						</form>
					</div>
					<h3 style="margin-bottom: 180px">
					<?php if(isset($_GET['mailSent']) && $_GET['mailSent']) { ?>
                		Thank you for contacting us! We'll replay to you soon.
            		<?php } ?>
					<?php if(isset($_GET['passsend']) && $_GET['passsend']) { ?>
                		We've sent you a mail with your account password.
            		<?php } ?>
            		</h3>
				</div>
			</div>
		</section>
		<section class="aboutus">
			<div class="container">
				<h2>About US</h2>
				<div class="row">
					<div class="columns four">
						<p class="left">UU ICT Club is established under Department of Computer Science &amp Engineering to develop the skills of a student.</p>
					</div>
					<div class="columns four blank">&nbsp</div>
					<div class="columns four">
						<p class="right">The main purpose of this club is to give opportunity to the students to express their latent talent.</p>
					</div>
				</div>
				<div class="row">
					<div class="columns three">
						<div class="box">
							<div class="title">At A Glance</div>
							<div class="info">
								<ul>
									<li class="ataglance"><span class="bold">Founded by:</span><br/>Md. Emrul Hasan</li>
									<li class="ataglance"><span class="bold">Established in:</span><br/>3rd October, 2012</li>
									<li class="ataglance"><span class="bold">Number of Advisers:</span><br/>4</li>
									<li class="ataglance"><span class="bold">Controled by:</span><br/>10 Panel Members</li>
									<li class="ataglance" style="border:none"><span class="bold">Registered Members:</span><br/><?= Member::count(); ?></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="columns three">
						<div id="ouractivities" class="box">
							<div class="title">Our Activities</div>
							<div class="info">
								<ul>
								 	<li>Quiz Contest</li>
									<li>Programming Contest</li>
									<li>Cultural Contest</li>
									<li>Gaming Contest</li>
									<li>Sports</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="columns six">
						<div id="ourmission" class="box" >
							<div class="title">Our Mission</div>
							<div class="info">
								<ul>
									<li>Skill Development &amp Knowledge Sharing.</li>
									<li>Oputunity to Express Cultural Talents.</li>
									<li>Extra Curricular Activities Development.</li>
									<li>Inter University Programming Contests.</li>
									<li>Inter University Sports Competitions.</li>
									<li>Project Works.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="activities">
			<div class="container">
				<h2>Activities</h2>
				<h3>Our activities are divided into three small units</h3>
				<div class="row">
					<div class="columns four">
						<div class="box">
							<div class="title">Unit of ICT</div>
							<div class="img unitimg ict"></div>
							<p class="info">The Unit of ICT maintains all the ICT educational activities.</p>
							<a href="activities.php#unitofict">
								<div class="link">
									Learn More <span class="icon32x32 i5"></span>
								</div>
							</a>
						</div>
					</div>
					<div class="columns four">
						<div class="box">
							<div class="title">Unit of Culture</div>
							<div class="img unitimg culture"></div>
							<p class="info">The Unit of Culture maintains all the cultural activities.</p>
							<a href="activities.php#unitofculture">
								<div class="link">
									Learn More <span class="icon32x32 i5"></span>
								</div>
							</a>
						</div>
					</div>
					<div class="columns four">
						<div class="box">
							<div class="title">Unit of G 'n' S</div>
							<div class="img unitimg gns"></div>
							<p class="info">The Unit of Games &amp Sports maintains all the games &amp sports related activities.</p>
							<a href="activities.php#unitofgns">
								<div class="link">
									Learn More <span class="icon32x32 i5"></span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="recentevents">
			<div class="container">
				<h2>Upcoming/Recent Events</h2>
				<h3>These are the upcomming/most recents events arranged by UU ICT CLUB</h3>
				<div class="row">
					<?php
						$sql = "SELECT * from events ORDER BY TimeNDate DESC LIMIT 4";
						$db = new Database();
						$result = $db->query($sql);
						while($row = $db->fetch($result)) {
					?>
					<div class="columns three">
						<div class="box">
							<div class="img" style="background: url('<?= $row["Image"] ?>') no-repeat; background-size: 100% 100%;"></div>
							<div class="title"><?= $row['Title'] ?></div>
							<p class="info"><?= $row['Description'] ?></p>
							<a href="events.php#evt<?= $row["Event_ID"]; ?>">
								<div class="link">
									Read More <span class="icon32x32 i5"></span>
								</div>
							</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<section class="chairman">
			<div class="container">
				<div class="box">
					<h2>The Chairman</h2>
					<h3>About our honorable chairman &amp founder of UU ICT CLUB</h3>
					<div class="img" style="background: url('img/chairman.jpg') no-repeat; background-size: 100% 100%;"></div>
					<h2 class="info">Md. Emrul Hasan</h2>
					<p class="info">Chairman &amp Founder<br>
					UU ICT CLUB</p>
					<p class="info">Senior Lecturer<br>
					Deparmtent of Computer Science &amp Engineering<br>
					Uttara University</p>
				</div>
			</div>
		</section>
		<section class="adviser">
			<div class="container">
				<h2>Advisers</h2>
				<h3>About our honorables advisers of UU ICT CLUB</h3>
				<div class="row">
					<div class="columns three">
						<div class="person">
							<div class="img" style="background: url('img/adviser1.jpg') no-repeat; background-size: 100% 100%;"></div>
							<p class="info italic">Prof. Shahnewas Khan</p>
							<p class="highlight">Proffessor</p>
							<p class="info w60">Department of Computer Science &amp Engineering
							<br>Uttara University</p>
						</div>
					</div>
					<div class="columns three">
						<div class="person">
							<div class="img" style="background: url('img/adviser2.jpg') no-repeat; background-size: 100% 100%;"></div>
							<p class="info italic">Shafiul Alam Chowdhury</p>
							<p class="highlight">Chairman</p>
							<p class="info w60">Department of Computer Science &amp Engineering
							<br>Uttara University</p>
						</div>
					</div>
					<div class="columns three">
						<div class="person">
							<div class="img" style="background: url('img/adviser3.jpg') no-repeat; background-size: 100% 100%;"></div>
							<p class="info italic">Mohhamed Nasir Uddin</p>
							<p class="highlight">Assistant Proffessor</p>
							<p class="info w60">Department of Computer Science &amp Engineering
							<br>Uttara University</p>
						</div>
					</div>
					<div class="columns three">
						<div class="person">
							<div class="img" style="background: url('img/adviser4.jpg') no-repeat; background-size: 100% 100%;"></div>
								<p class="info italic">Md. Munirruzzaman</p>
								<p class="highlight">Coordinator</p>
								<p class="info w60">Department of Computer Science &amp Engineering
								<br>Uttara University</p>
							</div>
						</div>
					</div>
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