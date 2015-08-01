<?php require_once "../includes/config.php"	; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
	$subject = "";
	$message = "";
	extract($_GET);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
	<title>eMail All Members</title>
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
    <main>
        <section id="form-container" class="form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <h2>eMail Everyone</h2>
                            <form class="form" name="SendMail" method="post" action="actions/SendMailToAllAction.php" novalidate>
                                <?php if(isset($_GET['mailSent']) && $_GET['mailSent']) { ?>
                                	<div class="success warnc">eMail has been sent to all members.</div>
                                <?php } ?>
                                <?php if(isset($_GET['missing']) && $_GET['missing']) { ?>
                                	<div class="warning warnc">Please fill out all the fileds.</div>
                                <?php } ?>
                                
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" id="subject" placeholder="Enter your subject" value="<?= $subject; ?>" required /><br/>
                                
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" placeholder="Type your message here." required ><?= $message; ?></textarea><br/>
                                
                                <input type="submit" value="Submit" name="sendmail" />
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