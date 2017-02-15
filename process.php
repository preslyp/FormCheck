<?php

$myname = $_REQUEST['myname'];

$nameArr[$i] = $myname;

if ($_REQUEST['myname']) {
	# code...
}

$mypassword = $_REQUEST['mypassword'];

$mypasswordconf = $_REQUEST['mypasswordconf'];

if ($myname === ""):

	echo "<div>Sorry, your name is required field.</div>";

endif;

if (strlen($mypassword) <= 6):

	echo "<div>Sorry, the password must be at least six characters.</div>";

endif;

if (!(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname))):

	echo "<div>Бъркаш формата.</div>";

endif;



?>