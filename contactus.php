<?php require_once "includes/config.php"        ; ?>
<?php require_once "includes/mail_process.php"  ; ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
    <title>Contact Us</title>
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
    <?php require_once "header.php" ; ?>
    <main>
        <section class="contactus form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <form class="form" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <?php if($m_missing) { ?><div class="warning warnc"><?= $m_missing ?></div><?php } ?>
                                <label for="email">eMail:</label>
                                <input type="email" name="email" id="email" placeholder="example@example.com    "value="<?= $email; ?>" required /><br/>
                                <?php if($mail_error) { ?><div class="warning"><?= $mail_error ?></div><?php } ?>
                                
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" id="subject" placeholder="Enter your subject" value="<?= $subject; ?>" required /><br/>
                                
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" placeholder="Type your message here." required ><?= $message; ?></textarea><br/>
                                
                                <input type="submit" value="Submit" name="contactus" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once "footer.php" ; ?>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>  
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>