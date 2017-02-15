<?php 
	if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))) :

		if (isset($_POST['myname'])) { $myname = $_POST['myname']; }
		if (isset($_POST['mypassword'])) { $mypassword = $_POST['mypassword']; }
		if (isset($_POST['mypasswordconf'])) { $mypasswordconf = $_POST['mypasswordconf']; }
		if (isset($_POST['mycomments'])) { 

		$mycomments = filter_var($_POST['mycomments'], FILTER_SANITIZE_STRING); 

		}
		if (isset($_POST['reference'])) { $reference = $_POST['reference']; }
		if (isset($_POST['favoritemusic'])) { $favoritemusic = $_POST['favoritemusic']; }
		if (isset($_POST['requesttype'])) { $requesttype = $_POST['requesttype']; }
		$errors = array();

		$formerrors = false;

		if ($myname === ""):
			$errors[] = '<div class="error">Sorry, your name is required field.</div>';
		endif;//input empty field

		if (strlen($mypassword) <= 6):
			$errors[] = '<div class="error">Sorry, the password must be at least six characters.</div>';
		endif; // password not long enough

		if ($mypassword !== $mypasswordconf) :
			$errors[] = '<div class="error">Sorry, password must match.</div>';
		endif; // password don't match

		if (!(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname))):
			$errors[] = '<div class="error">Sorry, the name must be in the format: Last name, First name.</div>';
		endif; //pattern doesn't match

		if (!($formerrors)) :
			
			$to			= "pancho.angarev@gmail.com";
			$subject 	= "From $myname -- Signup Page";
			$massage	= "$myname filled out the form";
			$replyto	= "From: email@mail.com \r\n";
						   "Reply - To: donotreply$mail.com";

			if (mail($to, $subject, $massage)) :
				
				$msg = "Thank you for filling out out form";

			else :

				$msg = "Ploblem sending massage";

			endif; //mail form data

		endif; // check for errors
		
	endif; //form submitted
?>