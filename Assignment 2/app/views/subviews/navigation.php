<ul>
	<li><a href='/Main/index'>Home Page</a></li>

	<?php
		if (!isset($_SESSION['user_id'])) {
			echo "<li><a href='/User/login'>Log in</a></li>";
		}
		else {
			echo "<li><a href='/User/profile'>My Profile</a></li>";
			echo "<li><a href='/User/logout'>Log out</a></li>";
		}
	?>
</ul>
