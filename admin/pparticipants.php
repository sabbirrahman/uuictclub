<?php require_once "../includes/config.php"		; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
?>
<?php
    $archiveSuccess = false;
    if(isset($_POST['archive_pcp'])){
        $DB = new Database();
        $sql = "INSERT INTO programmingcontest_archive SELECT * FROM programmingcontest";
        $DB->query($sql);
        $sql = "DELETE FROM programmingcontest";
        $DB->query($sql);
        $archiveSuccess = true;
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
    <title>Programming Contest Participants</title>
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
    <?php if($archiveSuccess){ ?>
    <h3 class="success warnc">Successfully Archived!</h3>
    <?php } ?>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                        $db = new Database();
                        $sql = "SELECT * FROM programmingcontest ORDER BY RegistrationDate ASC";
                        $result = $db->query($sql);
                        while($row = $db->fetch($result)){
                    ?>
                    <div class="columns two">
                        <div class="person">
                            <p class="highlight"><?= $row['TeamName']; ?></p>
                            <p class="info italic"><?= $row['Name1']; ?></p>
                            <p class="info"><span class="bold">ID:</span> <?= $row['ID1']; ?></p>
                            <div class="icons">
                                <div class="icon32x32 n17" title="<?= $row['Phone1']; ?>"></div>
                                <a href="mailto:<?= $row['eMail1']; ?>">
                                <div class="icon32x32 n18" title="<?= $row['eMail1']; ?>"></div></a>
                            </div>
                            <p class="info italic"><?= $row['Name2']; ?></p>
                            <p class="info"><span class="bold">ID:</span> <?= $row['ID2']; ?></p>
                            <div class="icons">
                                <div class="icon32x32 n17" title="<?= $row['Phone2']; ?>"></div>
                                <a href="mailto:<?= $row['eMail2']; ?>">
                                <div class="icon32x32 n18" title="<?= $row['eMail2']; ?>"></div></a>
                            </div>
                            <p class="info italic"><?= $row['Name3']; ?></p>
                            <p class="info"><span class="bold">ID:</span> <?= $row['ID3']; ?></p>
                            <div class="icons">
                                <div class="icon32x32 n17" title="<?= $row['Phone3']; ?>"></div>
                                <a href="mailto:<?= $row['eMail3']; ?>">
                                <div class="icon32x32 n18" title="<?= $row['eMail3']; ?>"></div></a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    $db->close();
                ?>
                </div>
                <?php
                    $DB = new Database();
                    $sql = "SELECT * FROM programmingcontest";
                    $result = $DB->query($sql);
                    if($DB->fetch($result)) {
                ?>
                <div>
                    <form method="post" action="<?= pure_it($_SERVER['PHP_SELF']); ?>">
                        <input class="button" type="submit" value="Archive" name="archive_pcp" />
                    </form>
                </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>