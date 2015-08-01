<?php require_once "../includes/config.php"		; ?>
<?php require_once "../includes/functions.php"	; ?>
<?php require_once "../classes/Member.php"		; ?>
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
    <title><?php echo $_SESSION['user_name']?></title>
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
        <section class="userprofile">
            <div class="container">
                <div class="row">
                    <div class="columns twelve">
                        <div class="box">
                            <?php $Member = new Member($_SESSION['user_id']); ?>
                            <div class="img" style="background: url('<?= $Member->getImage();?>') no-repeat; background-size: 100% 100%"></div>
                            <div class="info">
                                <div class="row"><div class="columns six left">Name:           </div>   <div class="columns six right"><?=$Member->getTotalFullName();?>           </div></div>
                                <div class="row"><div class="columns six left">Gender:         </div>   <div class="columns six right"><?=$Member->getGender();?>                  </div></div>
                                <div class="row"><div class="columns six left">Date of Birth:  </div>   <div class="columns six right"><?=formatDate($Member->getDateOfBirth());?> </div></div>
                                <div class="row"><div class="columns six left">Contact No:     </div>   <div class="columns six right"><?=$Member->getContactNo();?>               </div></div>
                                <div class="row"><div class="columns six left">Email:          </div>   <div class="columns six right"><?=$Member->getEmail();?>                   </div></div>
                                <div class="row"><div class="columns six left">Student ID:     </div>   <div class="columns six right"><?=$Member->getStudentID();?>               </div></div>
                                <div class="row"><div class="columns six left">Department:     </div>   <div class="columns six right"><?=$Member->getDepartment();?>              </div></div>
                                <div class="row"><div class="columns six left">Batch:          </div>   <div class="columns six right"><?=format_position($Member->getBatch());?>  </div></div>
                                <div class="row"><div class="columns six left">Admission:      </div>   <div class="columns six right"><?=$Member->admission();?>                  </div></div>
                                <div class="row"><div class="columns six left">Club User ID:   </div>   <div class="columns six right"><?=$Member->getUserID();?>                  </div></div>
                                <div class="row"><div class="columns six left">Joining Date:   </div>   <div class="columns six right"><?=formatDate($Member->getJoiningDate())?>  </div></div>
                            </div>
                            <div class="foot">
                                <a href="member/updateinfo.php"><div class="button">Edit Profile</div></a>
                            </div>
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