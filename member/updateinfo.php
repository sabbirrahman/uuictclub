<?php require_once "../includes/config.php"		; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php require_once "../classes/Member.php"		; ?>
<?php require_once "../includes/updateinfo.php"	; ?>
<?php
    if($_SESSION['user_id']==NULL || $_SESSION['user_id']=="UIC-000"){
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
    <title>Update Info</title>
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
	<?php require_once '../header.php'; ?>
    <main>
        <section class="updateuserinfo form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <h2>Update Info</h2>
                            <?php $Member = new Member($_SESSION['user_id']); ?>
                            <?php if($u_missing) { ?><div class="warning warnc"><?= $u_missing; ?></div><?php } ?>
                            <form class="form" enctype="multipart/form-data" name="UpdateInfo" method="post"
                                                            action="<?= pure_it($_SERVER['PHP_SELF']); ?>">
                                <label for="NamePrefix">Name Prefix</label>
                                <input type="text" id="NamePrefix" name="NamePrefix" placeholder="example: Md., Mr., Mohammed etc"
                                value="<?=($NamePrefix)?$NamePrefix:$Member->getNamePrefix();?>"/>
                                
                                <label for="FirstName">*First Name</label>
                                <input type="text" id="FirstName" name="FirstName" placeholder="First Name"
                                value="<?=($FirstName)?$FirstName:$Member->getFirstName();?>" required />
                                
                                <label for="LastName">*Last Name</label>
                                <input type="text" id="LastName"name="LastName" placeholder="Last Name"
                                value="<?=($LastName)?$LastName:$Member->getLastName(); ?>" required />
                                
                                <label for="NickName">Nick Name</label>
                                <input type="text" id="NickName" name="NickName" placeholder="Nick Name"
                                value="<?=($NickName)?$NickName:$Member->getNickName(); ?>" />
                                
                                <label for="DateOfBirth">*Date of Birth</label>
                                <input type="date" id="DateOfBirth" name="DateOfBirth" placeholder="yyyy/mm/dd"
                                value="<?=($DateOfBirth)?$DateOfBirth:$Member->getDateOfBirth(); ?>" required />
                                
                                <label for="Phone">*Phone</label>
                                <input type="tel" id="Phone" name="Phone" placeholder="example: +8801*********"
                                value="<?=($Phone)?$Phone:$Member->getContactNo(); ?>" required />
                                
                                <label for="Facebook">Facebook</label>
                                <input type="text" id="Facebook" name="Facebook" placeholder="ex: https://www.facebook.com/your_username"
                                value="<?=($Facebook)?$Facebook:$Member->getFacebook(); ?>" />
                                
                                <label for="Mail">*Email</label>
                                <input type="email" id="Mail" name="Mail" placeholder="example@example.com"
                                value="<?=($Mail)?$Mail:$Member->getEmail(); ?>" required/>
                                <?php if($Invalid_Mail) { ?><div class="warning"><?= $Invalid_Mail; ?></div><?php } ?>
                                <?php if($Email_Exist) { ?><div class="warning"><?= $Email_Exist; ?></div><?php } ?>
                                
                                <label for="Image">Image</label>
                                <input type="file" id="Image" name="Image" />
                                <span style="float:right;">Maximum Image Size: 256 KB</span>
                                <?php if($ImageSize_err) { ?><div class="warning"><?= $ImageSize_err; ?></div><?php } ?>
                                <?php if($ImageType_err) { ?><div class="warning"><?= $ImageType_err; ?></div><?php } ?>
                                
                                <label for="OLD_PWD">Old Password</label>
                                <input type="password" id="OLD_PWD" name="OLD_PWD" placeholder="enter your old password" />
                                <?php if($Invalid_Pass) { ?><div class="warning"><?= $Invalid_Pass; ?></div><?php } ?>
                                
                                <label for="NEW_PWD">New Password</label>
                                <input type="password" id="NEW_PWD" name="NEW_PWD" placeholder="enter new password" />
                                
                                <label for="RE_PWD">Re-Type New Password</label>
                                <input type="password" id="RE_PWD" name="RE_PWD" placeholder="re-type new password" />
                                <?php if($Miss_Match) { ?><div class="warning"><?= $Miss_Match; ?></div><?php } ?>
                                
                                <input type="submit" name="Update_Info" value="Update" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
	<?php require_once '../footer.php'; ?>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>  
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>