<?php require_once "../includes/config.php"		; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php
	if($_SESSION['user_id']!="UIC-000"){
		header("Location: ../");
		exit;
	}
    $page = (isset($_GET['page']))? pure_it($_GET['page']) : 1;
	$to = intval($page) * 6;
	$from = $to - 5;
	$to = makeID(--$to);
	$from = makeID(--$from);
	$first = 1;
	$last = ceil((Member::count()/6));
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
    <title>UU ICT Club Members</title>
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
        <section>
            <div class="container">
                <div class="row">
                    <?php
                        $db = new Database();
                        $sql = "SELECT UID FROM userids
                                WHERE userids.UID BETWEEN '$from' AND '$to'";
                        $result = $db->query($sql);
                        while($R= $db->fetch($result)){
                            if($R['UID']=="UIC-000") continue;
                            $Member = new Member($R['UID']);
                    ?>
                    <div class="columns two">
                        <div class="person">
                            <div class="img" style="background: url('<?= $Member->getImage(); ?>') no-repeat; background-size: 100% 100%;"></div>
                            <p class="info italic"><?= $Member->getFullName(); ?></p>
                            <p class="highlight"><?= $Member->getUserID(); ?></p>
                            <p class="info"><span class="bold">ID:</span> <?= $Member->getStudentID(); ?></p>
                            <p class="info"><span class="bold">Batch:</span> <?= format_position($Member->getBatch()); ?></p>
                            <p class="info"><span class="bold">Member Since:</span><br><?= formatDate($Member->getJoiningDate()); ?></p>
                            <div class="icons" <?php if($Member->getFacebook()) echo "style='width: 104px;'" ?>>
                                <div class="icon32x32 n17" title="<?= $Member->getContactNo(); ?>"></div>
                                <a href="mailto:<?= $Member->getEmail(); ?>">
                                <div class="icon32x32 n18" title="<?= $Member->getEmail(); ?>"></div></a>
                                <?php if($Member->getFacebook()) { ?>
                                <a href="<?= $Member->getFacebook(); ?>">
                                <div class="icon32x32 n19" title="<?= $Member->getFacebook(); ?>"></div></a>
                                <?php } ?>
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
        <div class="navbuttons">
            <?php if($page==$first) { ?>
                <a href="admin/memberlist.php?page=<?=$last?>"><div id="p" class="np icon32x32 n13"><p>Previous</p></div></a>
            <?php } else { ?>
                <a href="admin/memberlist.php?page=<?=$page-1?>"><div id="p" class="np icon32x32 n13"><p>Previous</p></div></a>
            <?php } ?>
            <?php if($page==$last) { ?>
                <a href="admin/memberlist.php?page=<?=$first?>"><div id="n" class="np icon32x32 n14"><p>Next</p></div></a>
            <?php } else { ?>
                <a href="admin/memberlist.php?page=<?=$page+1?>"><div id="n" class="np icon32x32 n14"><p>Next</p></div></a>
            <?php } ?>
        </div>
    </main>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>