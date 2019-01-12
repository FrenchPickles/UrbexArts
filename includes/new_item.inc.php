<?php

session_start();

if (isset($_POST['add-submit'])) {

	require "dbh.inc.php";

	$name = $_POST['item_name'];
	$short_desc = $_POST['short_desc'];
	$desc = $_POST['desc'];
	$date = date("Y-m-d");
	$author = $_SESSION['userId'];
	$type = $_POST['type'];
	$image = $_POST['item_image'];
	$imagetitle = $_POST['item_imagetitle'];
	$imagealt = $_POST['item_imagedesc'];

	// Requête SQL
	$sql = "SELECT id, title FROM type";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			if ($row['title'] == $type) {
				$type = $row['id'];
			}
		}
	}

	if (empty($name) || empty($short_desc) || empty($desc) || empty($image) || empty($imagetitle) || empty($imagealt)) {
		header("Location: ../profil.php?error=emptyfields&itemname=".$name."&itemshortdesc=".$short_desc."&itemdesc=".$desc."&itemimage=".$image."&itemimagetitle=".$imagetitle."&itemimagealt=".$imagealt);
		exit();
	} else {

		/*INSERT DANS Image_item*/
		$sql = "INSERT INTO image_item (title, alt, link) VALUES (?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../profil.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "sss", $image, $imagetitle, $imagealt);
			mysqli_stmt_execute($stmt);
		}

		$last_id = $conn->insert_id;

		/*INSERT DANS ITEM*/
		$sql = "INSERT INTO item (name, short_description, long_description, publish_date, author, type, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../profil.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ssssiii", $name, $short_desc, $desc, $date, $author, $type, $last_id);
			mysqli_stmt_execute($stmt);
			header("Location: ../profil.php?profil=success");

			exit();
		}

	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else {
	header("Location: ../profil.php");
	exit();	
}