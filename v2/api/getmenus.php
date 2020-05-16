
<?php

$conn = new mysqli('127.0.0.1', 'root', '1q2w3e4r', 'restaurant');
$sql = "select * from menu";
$rs = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
print json_encode($rs);