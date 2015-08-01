<?php require_once "includes/config.php"	; ?>
<?php require_once "classes/Member.php"		; ?>
<?php
	$logininfo = array('uid' => "", 'uid_missing' => "", 'pwd_missing' => "", 'uid_err' => "", 'pwd_err' => "");
	extract($logininfo);
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
	<title>Login</title>
	<meta charset="utf-8">
    <base href="<?= BASE_URL; ?>">
    <link rel="shortcut icon" href="img/titleicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css" />
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script>
	<![endif]-->
	<style>
		.frgtpass:hover {
			cursor: pointer;
		}
	</style>
</head>

<body>							
	<div style="width:180px; margin: 10px auto"><img width="180px" src="img/UUICTCLUB.png"></div>
	<main>
        <section class="login form-container">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                        <?php if(!isset($_GET['fp']) || !pure_it($_GET['fp'])){ ?>
                        	<form class="form" name="login_form" method="post" action="actions/LoginAction.php">
				                <label>Username:</label>
				                <input type="text" name="uid" id="uid" placeholder="username" value="<?= $uid ?>">
				                <?php if($uid_missing) { ?><span class="warning"><?=$uid_missing;?></span><br/><?php } ?>
				                <?php if($uid_err) { ?><span class="warning"><?= $uid_err; ?></span><br/><?php } ?>
				                
				                <label>Password:</label>
				                <input type="password" name="pwd" id="pwd" placeholder="password">
				                <?php if($pwd_missing) { ?><span class="warning"><?= $pwd_missing; ?></span><br/><?php } ?>
				                <?php if($pwd_err) { ?><span class="warning"><?= $pwd_err; ?></span><br/><?php } ?>
				                
				                <label><input type="checkbox" name="keepme" style="width:20px;"> Keep me logged in</label>
				                <label class="frgtpass">Forget Password?</label>
				                <input type="submit" value="Login" name="ac">
				            </form>
				        <?php } ?>
                        	<form class="form fpfrom" name="pass_ret" method="post" action="actions/PasswordRetrieveAction.php" <?php if(!isset($_GET['fp']) || !pure_it($_GET['fp'])) echo "style='display:none'"; ?>>
				                <label>Username:</label>
				                <input type="text" name="uid" id="uid" placeholder="username" value="<?= $uid ?>">
				                <?php if($uid_missing) { ?><span class="warning"><?=$uid_missing;?></span><br/><?php } ?>
				                <?php if($uid_err) { ?><span class="warning"><?= $uid_err; ?></span><br/><?php } ?>
				                <input type="submit" value="Send Me My Password" name="passret">
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
	<script type="text/javascript">
		$(".frgtpass").click(function(){
			$(".form").slideUp();
			$(".fpfrom").slideDown();
		});
	</script>
</body>

</html>