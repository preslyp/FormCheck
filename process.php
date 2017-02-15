<?php

$myname = $_REQUEST['myname'];
$mypassword = $_REQUEST['mypassword'];
$mypasswordconf = $_REQUEST['mypasswordconf'];
$errors = array();


if ($myname === ""):

	$errors[] = "<div>Sorry, your name is required field.</div>";

endif;//input empty field


if (strlen($mypassword) <= 6):

	$errors[] = "<div>Sorry, the password must be at least six characters.</div>";

endif; // password not long enough

if ($mypassword !== $mypasswordconf) :
	
	$errors[] = "<div>Sorry, password must match.</div>";

endif; // password don't match


if (!(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname))):

	$errors[] = "<div>Sorry, the name must be in the format: Last name, First name.</div>";

endif; //pattern doesn't match

if ( !empty($errors)) :

	foreach ($errors as $error) {
		echo $error . "<br/>";
	}

endif;


?>