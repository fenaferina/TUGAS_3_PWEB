<?php

require "config.php";

$get_id = $_GET['id'];
$data = "DELETE FROM buku WHERE id=:id";
$statement = $connection->prepare($data);

if ($statement->execute([":id" => $get_id])){
    header("Location: http://localhost/TUGASPR06/show.php");
}