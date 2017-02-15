<?php 
	if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))) :

		$myname = $_REQUEST['myname'];
		$mypassword = $_REQUEST['mypassword'];
		$mypasswordconf = $_REQUEST['mypasswordconf'];
		$errors = array();


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
		
	endif; //form submitted
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Form Sample</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<form id="myform" name="theform" class="group" action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="POST">
		<span id="formerror" class="error"></span>
		<ol>
			<li>
				<label for="myname">Name *</label>
				<input type="text" name="myname" id="myname" title="Please enter your name" autofocus placeholder="First name, Last name" />
			</li>
			<li>
				<label for="mypassword">Password</label>
				<input type="password" name="mypassword" id="mypassword" />
			</li>
			<li>
				<label for="mypasswordconf">Password (confirm)</label>
				<input type="password" name="mypasswordconf" id="mypasswordconf" />
			</li>
			<li>
				<div class="grouphead">Favorite Music</div>
				<ol>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="rock" id="rockitem" />
						<label for="rockitem">Rock</label>
					</li>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="classical" id="classicalitem" />
						<label for="classicalitem">Classical</label>
					</li>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="reggaeton" id="reggaetonitem" />
						<label for="reggaetonitem">Reggaeton</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="reference">How did you hear about us?</label>
				<select name="reference" id="reference">
					<option value="">Choose...</option>
					<option value="friend">A friend</option>
					<option value="facebook">Facebook</option>
					<option value="twitter">Twitter</option>
				</select>
			</li>
			<li>
				<div class="grouphead">Request Type</div>
				<ol>
					<li>
						<input type="radio" name="requesttype" value="question" id="questionitem" />
						<label for="questionitem">Question</label>
					</li>
					<li>
						<input type="radio" name="requesttype" value="comment" id="commentitem" />
						<label for="commentitem">Comment</label>
					</li>
					<li>
						<input type="radio" name="requesttype" value="suggestion" id="suggestionitem" />
						<label for="suggestiontem">Suggestion</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="mycomments">Comment</label>
				<textarea name="mycomments" id="mycomments"></textarea>
			</li>
		</ol>
		<button type="submit" name="action" value="submit">Send</button>

		<?php 
			if ( isset($errors) && !empty($errors)) :

				foreach ($errors as $error) {
					echo $error . "<br/>";
				}

			endif; 
		?>
</form>
</body>
</html>

