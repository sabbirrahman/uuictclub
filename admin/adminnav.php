<?php
	$db = new Database();
	$rcount = $db->select_one("COUNT(UID)", "userids_temp");
	$rqstcount = "<div class='rqstcount'>$rcount</div>";
?>
<header>
	<nav role="adminnav">
	    <ul class="row">
	        <a href="index.php">				<li class="columns two"><div class="icon32x32 n1"></div><span class="navlabel">Home				</span></li></a>
	        <a href="admin/memberlist.php">		<li class="columns two"><div class="icon32x32 n2"></div><span class="navlabel">Member List		</span></li></a>
	        <a href="admin/joinrequest.php">	<li class="columns two"><div class="icon32x32 n3"></div><span class="navlabel">Join Request 	</span><?php if($rcount) echo $rqstcount?></li></a>
	    	<a href="admin/pparticipants.php">	<li class="columns two"><div class="icon32x32 n4"></div><span class="navlabel">PC Participants  </span></li></a>
	        <a href="admin/gparticipants.php">	<li class="columns two"><div class="icon32x32 n5"></div><span class="navlabel">GC Participants  </span></li></a>
	        <a href="admin/panelmember.php">	<li class="columns two"><div class="icon32x32 n6"></div><span class="navlabel">Panel Member 	</span></li></a>
	        <a href="admin/events.php">			<li class="columns two"><div class="icon32x32 n7"></div><span class="navlabel">Events			</span></li></a>
            <a href="admin/eventadd.php">   	<li class="columns two"><div class="icon32x32 n8"></div><span class="navlabel">Add Event    	</span></li></a>
            <a href="admin/sendmail.php"> 		<li class="columns two"><div class="icon32x32 n9"></div><span class="navlabel">Send eMail		</span></li></a>
            <a href="admin/pparticipantsar.php"><li class="columns two"><div class="icon32x32 n10"></div><span class="navlabel">PC Archive    	</span></li></a>
            <a href="admin/gparticipantsar.php"><li class="columns two"><div class="icon32x32 n11"></div><span class="navlabel">GC Archive    	</span></li></a>
            <a href="admin/index.php">   		<li class="columns two"><div class="icon32x32 n12"></div><span class="navlabel">Settings    	</span></li></a>
	    </ul>
	</nav>
</header>