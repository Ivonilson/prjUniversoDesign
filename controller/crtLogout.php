<?php 

	class crtLogout {

		public function Logout()
		{
			$_SESSION['user'] = NULL;
			include "view/login.php";
		}

	}

?>