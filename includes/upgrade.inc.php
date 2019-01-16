<?php

session_start();

require "dbh.inc.php";

$user = $_GET['iduser'];

if (isset($user)) {

	// Requête SQL
	$sql = "SELECT user.id, user.rank, rank.title FROM user, rank WHERE user.rank = rank.id AND user.id = '{$user}'";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	if ($row['title'] == "Administrateur") {

		header("Location: ../profil.php?error=cant_upgrade_admin");
		exit();

	} elseif ($row['title'] == "Rédacteur") {

		header("Location: ../profil.php?error=cant_upgrade_writer");
		exit();

	} else {

		$sql = "UPDATE user SET rank = 2 WHERE id = '{$user}'";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {

			header("Location: ../profil.php?error=sqlerror");
			exit();
		} else {

			mysqli_stmt_execute($stmt);

			header("Location: ../profil.php?profil=upgradesuccessfully");
			exit();
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
