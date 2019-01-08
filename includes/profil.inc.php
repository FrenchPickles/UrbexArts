<?php

session_start();

if (isset($_POST['modify-submit'])) {

	require "dbh.inc.php";

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$instagram = $_POST['instagram'];
	$description = $_POST['description'];

	if (empty($username) || empty($email)) {
		header("Location: ../profil.php?error=emptyfields&uid=".$username."&email=".$email."&name=".$name."&firstname=".$firstname."&instagram=".$instagram."&description=".$description);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../profil.php?error=invalidmailuid"."&name=".$name."&firstname=".$firstname."&instagram=".$instagram."&description=".$description);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../profil.php?error=invalidmail&uid=".$username."&name=".$name."&firstname=".$firstname."&instagram=".$instagram."&description=".$description);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../profil.php?error=invaliduid&mail=".$email."&name=".$name."&firstname=".$firstname."&instagram=".$instagram."&description=".$description);
		exit();
	}
	else {

		$sql = "UPDATE user SET pseudo = ?, email = ?, name = ?, firstname = ?, instagram = ?, description = ? WHERE id = '{$_SESSION['userId']}'";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../profil.php?error=sqlerror");
			exit();	
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../profil.php?error=usertaken&mail=".$email."&name=".$name."&firstname=".$firstname."&instagram=".$instagram."&description=".$description);
				exit();					
			}
			else {

				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../profil.php?error=sqlerror");
					exit();	
				}
				else {

					mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $name, $firstname, $instagram, $description);
					mysqli_stmt_execute($stmt);
					header("Location: ../profil.php?profil=success");
					$_SESSION['userUid'] = $username;

					exit();
				}
			}
		}

	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	header("Location: ../profil.php");
	exit();	
}