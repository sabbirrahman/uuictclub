<?php require_once "includes/config.php"	 ; ?>
<?php require_once "includes/functions.php"	 ; ?>
<?php require_once "includes/pcontestreg.php"; ?>
<?php require_once "includes/gcontestreg.php"; ?>
<?php
    $contest_json    = file_get_contents("config/contest_config.json");
    $contest_config  = json_decode($contest_json, true);
    if(!$contest_config['PCONTEST'] && !$contest_config['GCONTEST']){
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
    <title>Register for Events</title>
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
	<?php require_once 'Header.php'; ?>
    <main>
        <?php if($contest_config['PCONTEST']){ ?>
        <section class="progform form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <div id="showpcontest" class="button">Programming Contest Form</div>
                            <form id="pcontestform" class="form" name="pcontestreg" method="post" class="regform" action="<?= pure_it($_SERVER['PHP_SELF']) ?>"
                                                                                <?php if($p_missing || $p_error || $p_success) echo 'style="display:block"'?>>
                                <?php if($p_success) { ?><div class="success warnc">You've been successfully registered!</div><?php } ?>
                                <?php if($p_missing) { ?><div class="warning warnc"><?= $p_missing ?></div><?php } ?>
                                <!-- Team Name -->
                                <label for="TeamName" class="center">Team Name</label>
                                <input type="text" name="TeamName" id="TeamName" value="<?= $TeamName; ?>" placeholder="pick a cool name for your team" required/>
                                <?php if($p_TeamName) { ?><div class="warning"><?= $p_TeamName_err ?></div><?php } ?>
                                
                                <div class="row">

                                    <div class="columns four">
                                        <!-- Member One Information -->
                                        <div class="info">Member One Info</div>
                                        <label for="Name1">Name:</label>
                                        <input type="text" name="Name1" id="Name1" value="<?=$Name1; ?>" placeholder="what's your name?" required/>
                                        <!-- Member One Student ID -->
                                        <label for="ID1">ID:</label>
                                        <input type="text" name="ID1" id="ID1" value="<?= $ID1; ?>" placeholder="your student id?" required/>
                                        <?php if($p_StudentID_Exist1) { ?><div class="warning"><?= $p_StudentID_err ?></div><?php } ?>
                                        <?php if($p_NonDept_err1) { ?><div class="warning"><?= $p_NonDept_err1; ?></div><?php } ?>
                                        <label for="Phone1">Contact No:</label>
                                        <input type="text" name="Phone1" id="Phone1" value="<?= $Phone1; ?>" placeholder="example: +8801*********" required/>
                                        <label for="eMail1">eMail:</label>
                                        <input type="text" name="eMail1" id="eMail1" value="<?= $eMail1; ?>" placeholder="example@example.com" required/>
                                        <?php if($p_Email_Exist1) { ?><div class="warning"><?= $p_email_err ?></div><?php } ?>
                                        <?php if($p_Invalid_Mail1) { ?><div class="warning"><?= $p_Invalid_Mail1 ?></div><?php } ?>
                                    </div>
                                    
                                    <div class="columns four">    
                                        <!-- Member Two Information -->
                                        <div class="info">Member Two Info</div>
                                        <label for="Name2">Name:</label>
                                        <input type="text" name="Name2" id="Name2" value="<?= $Name2; ?>" placeholder="what's your name?" required/>
                                        <!-- Member Two Student ID -->
                                        <label for="ID2">ID:</label>
                                        <input type="text" name="ID2" id="ID2" value="<?= $ID2; ?>" placeholder="your student id?" required/>
                                        <?php if($p_StudentID_Exist2) { ?><div class="warning"><?= $p_StudentID_err ?></div><?php } ?>
                                        <?php if($p_NonDept_err2) { ?><div class="warning"><?= $p_NonDept_err2; ?></div><?php } ?>
                                        <label for="Phone2">Contact No:</label>
                                        <input type="text" name="Phone2" id="Phone2" value="<?= $Phone2; ?>" placeholder="example: +8801*********" required/>
                                        <label for="eMail2">eMail:</label>
                                        <input type="text" name="eMail2" id="eMail2" value="<?= $eMail2; ?>" placeholder="example@example.com" required/>
                                        <?php if($p_Email_Exist2) { ?><div class="warning"><?= $p_email_err ?></div><?php } ?>
                                        <?php if($p_Invalid_Mail2) { ?><div class="warning"><?= $p_Invalid_Mail2 ?></div><?php } ?>
                                    </div>
                                    
                                    <div class="columns four">    
                                        <!-- Member Three Information -->
                                        <div class="info">Member Three Info</div>
                                        <label for="Name3">Name:</label>
                                        <input type="text" name="Name3" id="Name3" value="<?= $Name3; ?>" placeholder="what's your name?" required/>
                                        <!-- Member Three Student ID -->
                                        <label for="ID3">ID:</label>
                                        <input type="text" name="ID3" id="ID3" value="<?= $ID3; ?>" placeholder="your student id?" required/>
                                        <?php if($p_StudentID_Exist3) { ?><div class="warning"><?= $p_StudentID_err ?></div><?php } ?>
                                        <?php if($p_NonDept_err3) { ?><div class="warning"><?= $p_NonDept_err3; ?></div><?php } ?>
                                        <label for="Phone3">Contact No:</label>
                                        <input type="text" name="Phone3" id="Phone3" value="<?= $Phone3; ?>" placeholder="example: +8801*********" required/>
                                        <label for="eMail3">eMail:</label>
                                        <input type="text" name="eMail3" id="eMail3" value="<?= $eMail3; ?>" placeholder="example@example.com" required/>
                                        <?php if($p_Email_Exist3) { ?><div class="warning"><?= $p_email_err ?></div><?php } ?>
                                        <?php if($p_Invalid_Mail3) { ?><div class="warning"><?= $p_Invalid_Mail3 ?></div><?php } ?>
                                    </div>

                                </div>    
                                
                                <input type="submit" name="prog" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php if($contest_config['GCONTEST']){ ?>
        <section class="gameform form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <div id="showgcontest" class="button">Gaming Contest Form</div>
                            <form id="gcontestform" class="form" name="gcontestreg" method="post" class="regform" action="<?= pure_it($_SERVER['PHP_SELF']) ?>"
                                                                                <?php if($g_missing || $g_error || $g_success) echo 'style="display:block"'?>>
                                <?php if($g_success) { ?><div class="success warnc">You've been successfully registered!</div><?php } ?>
                                <?php if($g_missing) { ?><div class="warning warnc"><?= $g_missing ?></div><?php } ?>
                                
                                <label for="gamerName">Name:</label>
                                <input type="text" name="gamerName" id="gamerName" value="<?= $gamerName; ?>" placeholder="what's your name?" required/>
                                
                                <label for="gamerID">ID:</label>
                                <input type="text" name="gamerID" id="gamerID" value="<?= $gamerID; ?>" placeholder="your student id?" required/>
                                <?php if($g_StudentID_Exist) { ?><div class="warning"><?= $g_StudentID_Exist ?></div><?php } ?>
                                
                                <label for="gamerBatch">Batch:</label>
                                <input type="text" name="gamerBatch" id="gamerBatch" value="<?= $gamerBatch; ?>" placeholder="example: 25th, 26th, 27th etc" required/>
                                
                                <label for="gamerDept">Department:</label>
                                <input type="text" name="gamerDept" id="gamerDept" value="<?= $gamerDept; ?>" placeholder="example: CSE, EEE, BBA etc" required/>
                                
                                <label for="gamerPhone">Phone:</label>
                                <input type="tel" name="gamerPhone" id="gamerPhone" value="<?= $gamerPhone; ?>" placeholder="example: +8801*********" required/>

                                <label for="gamerMail">eMail:</label>
                                <input type="text" name="gamerMail" id="gamerMail" value="<?= $gamerMail; ?>" placeholder="example@example.com" required/>
                                <?php if($g_Invalid_Mail) { ?><div class="warning"><?= $g_Invalid_Mail ?></div><?php } ?>
                                <?php if($g_Email_Exist) { ?><div class="warning"><?= $g_Email_Exist ?></div><?php } ?>

                                <label for="gameList">Game:</label>
                                <select id="gameList" name="GAME" required>
                                    <option value="">Select the game you want to play:</option>
                                    <?php if($contest_config['QUIZ'] && $_SESSION['user_id']!=NULL && $_SESSION['user_id']!="UIC-000")    { ?>
                                        <option value="QUIZ"    <?php if($GAME=="QUIZ")    echo "selected"; ?>>Online ICT Quiz</option>
                                    <?php } ?>
                                    <?php if($contest_config['NFSM'])    { ?><option value="NFSM"    <?php if($GAME=="NFSM")    echo "selected"; ?> >Need for Speed - Mostwanted  </option><?php } ?>
                                    <?php if($contest_config['COD4'])    { ?><option value="FIFA"    <?php if($GAME=="FIFA")    echo "selected"; ?> >FIFA-14                      </option><?php } ?>
                                    <?php if($contest_config['FIFA'])    { ?><option value="COD4"    <?php if($GAME=="COD4")    echo "selected"; ?> >Call of Duty - Modern Warfare</option><?php } ?>
                                    <?php if($contest_config['CHESS'])   { ?><option value="CHESS"   <?php if($GAME=="CHESS")   echo "selected"; ?> >Chess                        </option><?php } ?>
                                    <?php if($contest_config['CARROM'])  { ?><option value="CARROM"  <?php if($GAME=="CARROM")  echo "selected"; ?> >Carrom                       </option><?php } ?>
                                    <?php if($contest_config['TTENNIS']) { ?><option value="TTENNIS" <?php if($GAME=="TTENNIS") echo "selected"; ?> >Table Tennis                 </option><?php } ?>
                                </select>
                                
                                <input type="submit" name="gaming" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
    </main>
	<?php require_once 'Footer.php'; ?>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>  
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>