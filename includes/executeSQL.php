<?php
const servername = "localhost";
const username = "root";
const password = "";
const dbname = "btth01_cse485";

//thực thi: insert, delete, update
function execute($sql){
    $conn = mysqli_connect(servername, username, password, dbname);
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

//thực thi: select
function executeResult($sql){
    $conn = mysqli_connect(servername, username, password, dbname);
    $result = mysqli_query($conn, $sql);
    $list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
    mysqli_close($conn);
    return $list;
}

?>