<?php

session_start();

require "dbh.inc.php";

$author = $_SESSION['userId'];
$item = (int)$_GET['item'];
$date = "2019-03-26";

// Requête SQL
$sql = "SELECT * from like_system WHERE author = '{$author}' AND item = '{$item}';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM like_system WHERE author = '{$author}' AND item = '{$item}';";
    $result = $conn->query($sql);
    
    header("Location: ../article.php?id={$item}");
    exit();

} else {
    $sql = "INSERT INTO like_system (author, item, like_date) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $author, $item, $date);
    mysqli_stmt_execute($stmt);
    
    header("Location: ../article.php?id={$item}");
    exit();
}