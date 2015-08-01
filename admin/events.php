<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Event.php"		; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
	if(isset($_POST['Event_ID'])){
		$Event = new Event($_POST['Event_ID']);
		$Event->deleteEvent();
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
    <title>Events</title>
    <meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin.css" />
    <!--[if lt IE 9]>
    <script src="scripts/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
	<?php require_once 'adminnav.php'; ?>
    <?php if(isset($_POST['Event_ID'])) { ?><div class="warning warnc" style="font-size:1.5em;
                                                                              padding-top: 10px;
                                                                              font-weight:bold;
                                                                              background: rgba(255, 255, 255, .75);"
                                                                >Event Deleted!</div><?php } ?>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <form method="post" action="<?= pure_it($_SERVER['PHP_SELF']);?>">
                        <?php
                            $DB = new Database();
                            $sql = "SELECT * FROM events ORDER BY TimeNDate DESC";
                            $result = $DB->query($sql);
                            while($Data = $DB->fetch($result)){
                                extract($Data);
                                $date = new DateTime($TimeNDate);
                                $TimeNDate = $date->format('h:i A, dS F, Y');
                        ?>
                        <div class="columns six">
                            <div class="box">
                                <div class="title"><?= $Title; ?></div>
                                <p class="info"><span class="bold">Time &amp Date:</span><br><?= $TimeNDate; ?></p>
                                <p class="info"><span class="bold">Venue:</span><br><?= $Venue; ?></p>
                                <div class="icons">
                                    <a href="admin/eventupdate.php?Event_ID=<?= $Event_ID; ?>">
                                    <div class="icon32x32 n15" title="Update Event"></div></a>
                                    <form method="post" style="display:inline-block">
                                        <input class="icon32x32 n16" src="img/transparent.png" title="Delete Event" type="image" value="<?= $Event_ID ?>" name="Event_ID">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                        $DB->close();
                    ?>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>