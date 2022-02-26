<?php

	$id = $_POST['id'];

	echo json_encode(
		array(
			"id" => $id
		)
	)

?>