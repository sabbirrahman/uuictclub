<?php require_once "../includes/config.php"		; ?>
<?php require_once "../includes/functions.php"  ; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
?>
<?php
    $GAME = array();
    $GAME['QUIZ']    =   "Online ICT Quiz";
    $GAME['NFSM']    =   "Need for Speed - Mostwanted";
    $GAME['COD4']    =   "Call of Duty - Modern Warfare";
    $GAME['FIFA']    =   "FIFA14";
    $GAME['CHESS']   =   "Chess";
    $GAME['CARROM']  =   "Carrom";
    $GAME['TTENNIS'] =   "Table Tennis";
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
    <title>Gaming Contest Participants Archive</title>
    <meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin.css" />
    <!--[if lt IE 9]>
    <script src="scripts/html5shiv.js"></script>
    <![endif]-->
    <style>
        .button {
            width: 100%;
            border: none;
        }
    </style>
</head>

<body>
	<?php require_once 'adminnav.php'; ?>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                        $db = new Database();
                        $sql = "SELECT * FROM gamingcontest_archive ORDER BY RegistrationDate DESC";
                        $result = $db->query($sql);
                        while($row = $db->fetch($result)){
                    ?>
                    <div class="columns two">
                        <div class="person">
                            <p class="italic"><?= $row['Name']; ?></p>
                            <p class="info"><span class="bold">ID:</span> <?= $row['StudentID']; ?></p>
                            <p class="info"><span class="bold">Batch:</span> <?= format_position($row['Batch']); ?></p>
                            <p class="info"><span class="bold">Department:</span><br><?= $row['Department']; ?></p>
                            <div class="icons" style="width: 106px">
                                <div class="icon32x32 n17" title="<?= $row['ContactNo']; ?>"></div>
                                <div class="game32x32 <?=$row['Game']?>"  title="<?= $GAME[$row['Game']]; ?>"></div>
                                <a href="mailto:<?= $row['eMail']; ?>">
                                <div class="icon32x32 n18" title="<?= $row['eMail']; ?>"></div></a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        $db->close();
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>