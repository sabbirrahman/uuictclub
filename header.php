<header>
    <div class="background2">
        <div class="container">
            <a href="/uuictclub">
                <div class="logo">
                    <ul>
                        <li></li>
                        <li>UU ICT CLUB</li>
                    </ul>
                </div>
            </a>
            <div class="join-login-and-menu">
                <ul>
                    <?php if($_SESSION['user_name']=="ICT") { ?>
                        <li><a href="admin/">Admin Panel</a></li>
                        <li>
                            <form class="form" method="post" action="actions/LogoutAction.php">
                                <input type="submit" name="lgot" value="Logout" />
                            </form>
                        </li>
                    <?php } elseif($_SESSION['user_name']!="uunotlogged") { ?>
                        <li><a href="member/"><?= $_SESSION['user_name']; ?></a></li>
                        <li>
                            <form class="form" method="post" action="actions/LogoutAction.php">
                                <input type="submit" name="lgot" value="Logout" />
                            </form>
                        </li>
                    <?php } elseif($_SESSION['user_name']=="uunotlogged") { ?>
                        <li><a href="registration.php" class="join">Join</a></li>
                        <li class="login-button"><a>Login</a></li>
                    <?php } ?>
                    <li class="nav-button button">&#9776</li>
                </ul>
            </div>
            <nav role="primary">
                <ul>
                    <li><a href="index.php">        Home        </a></li>
                    <li><a href="activities.php">   Activities  </a></li>
                    <li><a href="events.php">       Events      </a></li>
                    <li><a href="controlers.php">   Controlers  </a></li>
                    <li><a href="contactus.php">    Contact Us  </a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="login_form_box">
    <div class="container">
        <div class="login_form">
            <form name="login_form" method="post" action="actions/LoginAction.php">
                <div class="form-box">
                    <label class="icon32x32 uid i1"></label>
                    <input type="text" name="uid" id="uid" placeholder="username">
                </div>
                <div class="form-box">
                    <label class="icon32x32 pwd i2"></label>
                    <input type="password" name="pwd" id="pwd" placeholder="password">
                </div>
                <div>
                    <input type="checkbox" name="keepme" style="width:20px;">
                    <p>Keep me logged in</p>
                    <input type="submit" value="Login" name="ac">
                </div>
            </form>
        </div>
    </div>
</div>