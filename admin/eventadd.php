<?php require_once "../includes/config.php"		; ?>
<?php require_once "../classes/Event.php"		; ?>
<?php require_once "../includes/functions.php" ; ?>
<?php require_once "../includes/addevent.php"	; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
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
    <title>Add Events</title>
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
    <main>
        <section id="form-container" class="form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <h2>Add Event</h2>
                            <form class="form" enctype="multipart/form-data" name="AddEvent" method="post"
                                                    action="<?= pure_it($_SERVER['PHP_SELF']); ?>">
                                <?php if($e_missing) {?><div class="warning warnc"><?= $e_missing; ?></div><?php } ?>
                                <label for="Title">*Title</label>
                                <input type="text" id="Title" name="Title" placeholder="Title" value="<?= $Title; ?>" required />
                                
                                <label for="Time">*Time</label>
                                <input type="text" id="Time" name="Time" placeholder="example: 12:00 PM" value="<?= $Time; ?>" required />
                                
                                <label for="Date">*Date</label>
                                <input type="date" id="Date" name="Date" placeholder="example: YYYY-MM-DD" value="<?= $Date; ?>" required />
                                
                                <label for="Venue">*Venue</label>
                                <input type="text" id="Venue" name="Venue" placeholder="Venue" value="<?= $Venue; ?>" required />
                                
                                <label for="Rules">Rules &amp Regulations</label>
                                <textarea id="Rules" name="Rules" placeholder="Rules &amp Regulations"><?= $Rules; ?></textarea>
                                
                                <label for="LinkName">Link</label>
                                <input type="text" id="LinkName" name="LinkName" placeholder="Link Name" value="<?= $LinkName; ?>" />
                                <input type="text" id="Link" name="Link" placeholder="Link" value="<?= $Link; ?>" />
                                
                                <label for="Description">*Description</label>
                                <textarea id="Description" name="Description" placeholder="Description" required><?= $Description; ?></textarea>
                                
                                <label for="Image">*Event Banner:</label>
                                <input type="file" name="Image" id="Image" title="Maximum Image Size: 256 KB" required />
                                <?php if($ImageSize_err) { ?><div class="warning"><?= $ImageSize_err; ?></div><?php } ?>
                                <?php if($ImageType_err) { ?><div class="warning"><?= $ImageType_err; ?></div><?php } ?>
                                
                                <input type="submit" value="Add Event" name="Add_Event" />
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