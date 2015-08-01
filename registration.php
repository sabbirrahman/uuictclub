<?php require_once "includes/config.php"	; ?>
<?php require_once "includes/functions.php" ; ?>
<?php require_once "includes/register.php"	; ?>
<?php
	if($_SESSION['user_name']!="uunotlogged"){
		header("Location: index.php");
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
    <title>Registration</title>
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
        <section class="registration form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <h2>Register</h2>
                            <form class="form" enctype="multipart/form-data" name="RegistrationForm" method="post" action="<?= pure_it($_SERVER['PHP_SELF']); ?>">
                                <?php if($r_success) { ?>
                                    <div class="success">Your request hase been accepted successfully<br />
                                    You'll be notified via email once you are approved to be a member</div>
                                <?php } ?>
                                <?php if($r_missing) { ?><div class="warning warnc"><?= $r_missing; ?></div><?php } ?>
                                
                                <label for="FirstName">First Name:</label>
                                <input type="text" id="FirstName" name="FirstName" value="<?= $FirstName ?>" placeholder="First Name" required />
                                
                                <label for="LastName">Last Name:</label>
                                <input type="text" id="LastName" name="LastName" value="<?= $LastName ?>" placeholder="Last Name" required />
                                
                                <label for="DOB">Date of Birth:</label>
                                <select id="DOB" name="DOB" required>
                                    <option value="">Date</option>
                                    <?php for($i=1; $i<=31; $i++) { echo "<option value=\"$i\""; if($DOB == $i) echo 'selected'; echo ">" . $i ."</option>"; } ?>
                                </select>
                                
                                <select id="MOB" name="MOB" required>
                                    <option value="">Month</option>
                                    <?php for($i=1; $i<=12; $i++) { echo "<option value=\"$i\""; if($MOB == $i) echo 'selected'; echo ">" . $i ."</option>"; } ?>
                                </select>
                                
                                <select id="MOB" name="YOB" required>
                                    <option value="">Year</option>
                                    <?php for($i=2000; $i>=1980; $i--) { echo "<option value=\"$i\""; if($YOB == $i) echo 'selected'; echo ">" . $i ."</option>"; } ?>
                                </select>
                                
                                <label for="StudentID">Student ID:</label>
                                <input type="text" id="StudentID" name="StudentID" value="<?php if(isset($_GET["StudentID"])) echo pure_it($_GET["StudentID"]); else echo $StudentID; ?>" placeholder="Student ID" required />
                                <?php if($NonDept_err) { ?><div class="warning"><?= $NonDept_err; ?></div><?php } ?>
                                <?php if($StudentID_Exist) { ?><div class="warning"><?= $StudentID_Exist; ?></div><?php } ?>
                                
                                <label for="Phone">Contact No:</label>
                                <input type="text" id="Phone" name="Phone" value="<?= $Phone ?>" placeholder="+8801*********" required />
                                
                                <label for="Mail">eMail:</label>
                                <input type="email" id="Mail" name="Mail" value="<?= $Mail ?>" placeholder="example@example.com" required />
                                <?php if($Invalid_Mail) { ?><div class="warning"><?= $Invalid_Mail; ?></div><?php } ?>
                                <?php if($Email_Exist) { ?><div class="warning"><?= $Email_Exist; ?></div><?php } ?>
                                
                                <label for="Image">Image:</label>
                                <input type="file" name="Image" id="Image" title="Maximum Image Size: 256 KB" required />
                                <?php if($ImageSize_err) { ?><div class="warning"><?= $ImageSize_err; ?></div><?php } ?>
                                <?php if($ImageType_err) { ?><div class="warning"><?= $ImageType_err; ?></div><?php } ?>
                                
                                <input type="submit" value="Register" name="join" />
                                
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