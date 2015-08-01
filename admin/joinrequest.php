<?php require_once "../includes/config.php"		; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php require_once "../classes/Member.php"	    ; ?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->

<head>
    <title>Join Request</title>
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
                        $sql = "SELECT UID FROM userids_temp";
                        $result = $db->query($sql);
                        while($R= $db->fetch($result)){
                            if($R['UID']=="UIC-000") continue;
                            $Member = new TempMember($R['UID']);
                    ?>
                    <div class="columns two">
                        <div class="person">
                            <div class="img" style="background: url('<?= $Member->getImage(); ?>') no-repeat; background-size: 100% 100%;"></div>
                            <p class="info italic"><?= $Member->getFullName(); ?></p>
                            <p class="highlight"><?= $Member->getStudentID(); ?></p>
                            <p class="info"><span class="bold">Batch:</span> <?= format_position($Member->getBatch()); ?></p>
                            <div class="icons">
                                <div class="icon32x32 n17" title="<?= $Member->getContactNo(); ?>"></div>
                                <a href="mailto:<?= $Member->getEmail(); ?>">
                                <div class="icon32x32 n18" title="<?= $Member->getEmail(); ?>"></div></a>
                            </div>
                            <div class="icons">
                                <form class="accept" method="post" style="display:inline-block">
                                    <input class="hidden" type="text" value="<?= $Member->getUserID(); ?>" name="UID">
                                    <input class="icon32x32 n20" type="submit" value="" name="accept" title="Accept">
                                </form>
                                <form class="reject" method="post" style="display:inline-block">
                                    <input id="uid" class="hidden" type="text" value="<?= $Member->getUserID(); ?>" name="UID">
                                    <input class="icon32x32 n16" type="submit" value="" name="reject" title="Reject">
                                </form>
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
    <script type="text/javascript">
        var updateJoinRqstCount = function(){
            $(".rqstcount").text(function(){
                return parseInt($(".rqstcount").text()) - 1;
            });
            if(parseInt($(".rqstcount").text()) == 0){
                $(".rqstcount").remove();
            }
        }
        $(".accept").submit(function(event){
            $.ajax({
                type: "POST",
                url: "actions/AcceptMember.php",
                data: { UID : $(event.target).find(".hidden").val() }
            });
            $(event.target).parent().parent().remove();
            updateJoinRqstCount();
            event.preventDefault();
        });
        $(".reject").submit(function(event){
            $.ajax({
                type: "POST",
                url: "actions/RejectMember.php",
                data: { UID : $(event.target).find(".hidden").val() }
            });
            $(event.target).parent().parent().remove();
            updateJoinRqstCount();
            event.preventDefault();
        });
    </script>
</body>
</html>