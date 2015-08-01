<?php require_once "includes/config.php"	; ?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>Activities</title>
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
	<main class="activitiespage">
		<section class="units">
			<div class="container">
				<div class="row">
					<div class="columns six">
						<div class="activitieshead">
							<div class="img" style="background: url('img/UUICTCLUB.png') no-repeat; 
													background-size: 100% 100%;"></div>
						</div>
					</div>
					<div class="columns six">
						<div class="activitieshead">
							<p>All the activities of UU ICT CLUB is divided into three small units and they are:</p>
							<ul style="list-style:lower-roman">
								<a href="activities.php#unitofict"><li class="button">Unit of ICT</li></a>
								<a href="activities.php#unitofculture"><li class="button">Unit of Culture</li></a>
								<a href="activities.php#unitofgns"><li class="button">Unit of Games &amp Sports</li></a>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="unitofict" class="unitofict">
			<div class="container">
				<div class="row">
					<div class="columns twelve">
						<div class="box">
							<h2 class="title">Unit of ICT</h2>
							<h3>The Unit of ICT maintains all the ICT educational activities.</h3>
							<div class="img" style="background: url('img/UnitOfICT.jpg') no-repeat; background-size: 100% 100%;"></div>
							<div class="info"><span class="bold">Our Mission:</span></div>
							<p class="info">The main purpose of Unit of ICT is to train and prepare students for Inter University Programming Contests such as the prestigious ACM Intercollegiate Programming Contest.</p>
							<p class="info">Another objective of this Unit is to arrage Mock Programming Contest to give them the flavor of the real contest.</p>
							<div class="info"><span class="bold">Activities:</span><br>
								<ul>
					            	<li>Programming Training</li>
					            	<li>Programming Contest</li>
					            </ul>
					        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="unitofculture" class="unitofculture">
			<div class="container">
				<div class="row">
					<div class="columns twelve">
						<div class="box">
							<h2 class="title">Unit of Culture</h2>
							<h3>The Unit of Culture maintains all the cultural activities.</h3>
							<div class="img" style="background: url('img/UnitOfCulture.jpg') no-repeat; background-size: 100% 100%;"></div>
							<div class="info"><span class="bold">Our Mission:</span></div>
							<p class="info">The main purpose of Unit of Culture is to find the hidden tallent of a students. There are students who's voice is sweet or some may write poems and stories well or some can draw beutifull pictures. But due to the enviroment and the presure of study they may don't know the talent within them. Our objective is to show them what they are capable of.</p>
							<div class="info"><span class="bold">Activities:</span><br>
					            <ul>
					            	<li><span class="bold">Wall Magazine</span><br> Wall Magazine is publish for the student who can write. We published our first wall magazine in 12<sup>th</sup> October, 2012 with some nice stories, poems, jokes, rymes, quotes and painting.</li>
					                <li><span class="bold">Cultural Function</span><br> Unit of Culture of UU ICT Club is arranging cultural functions in orientation of new students along with the Department of Electrical & Electronic Engineering.</li>
					            </ul>
					        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="unitofgns" class="unitofgns">
			<div class="container">
				<div class="row">
					<div class="columns twelve">
						<div class="box">
							<h2 class="title">Unit of Games &amp Sports</h2>
							<h3>The Unit of Games &amp Sports maintains all the games &amp sports related activities.</h3>
							<div class="img" style="background: url('img/UnitOfGNS.jpg') no-repeat; background-size: 100% 100%;"></div>
							<div class="info"><span class="bold">Our Mission:</span></div>
							<p class="info">Physical and Mental both types of games and sports can be very helful for the physical and mental improvement of a student and that's why the Unit of Games & Sport arranges different types of indoor and outdoor games and sports.</p>
							<div class="info"><span class="bold">Activities:</span><br>
					            <h4 class="italic">Outdoor Games</h4>
					            <ul>
					            	<li>Cricket</li>
					            	<li>Football</li>
					            </ul>
					            <h4 class="italic">Indoor Games</h4>
					            <ul>
					            	<li>Computer Games</li>
					            	<li>Table Tennis</li>
					            	<li>Chess</li>
					            	<li>Carom</li>
					            	<li>Quiz Competition</li>
					            </ul>
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