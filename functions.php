<?php include "db.php";

function showAllData() {
    global $connection;
    $query = "select * from users";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error());
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        echo "<option value='$id'>$id</option>";
    }
}

function readRows() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }
        
    while($row = mysqli_fetch_assoc($result)) {
        
        print_r($row);
    }  
}

function updateTable() {
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "update users set ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "where id = $id";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    }
}

function deleteRows() {
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "delete from users ";
    $query .= "where id = $id";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        echo "Record deleted";
    }
}

function createRows() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    global $connection;

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $hashFormat = "2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);

    if ($username && $password) {
        echo $username;
        echo $password;
    } else {
        echo "noo";
    }

    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');

    if ($connection) {
        echo "We are connected";
    } else {
        die("Database connection failed");
    }

    $query = "insert into users(username, password)";
    $query .= " values ('$username', '$password')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Record created";
    }
    else if (!$result) {
        die("Query failed" . mysqli_error());
    }
}
?>