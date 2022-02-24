<ul>
	<li><a href='/Main/index'>Home Page</a></li>

	<?php
		if (!isset($_SESSION['user_id'])) {
			echo "<li><a href='/User/login'>Log in</a></li>";
		}
		else { //only do this if profile has been created, check it after profile has been fixed
			//getting profile id from current user
			$myUser = new \app\models\User();
			$myUser = $myUser->getById($_SESSION['user_id']);
			$profile = $myUser->getUserProfile($myUser->user_id);
			echo "<li><a href='/User/profile'>My Profile</a></li>";
			echo "<li><a href='/Publication/create/$profile->profile_id'>Create Publication</a></li>";
			echo "<li><a href='/User/logout'>Log out</a></li>";
		}
	?>
</ul>
