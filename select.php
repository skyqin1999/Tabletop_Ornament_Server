<?php

function getItemFromDev() {
    include "connect.php";
    $output = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT devname FROM `iot`.`table_developer`";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<option value="' . $row["devname"] . '">' . $row["devname"] . '</option>';
            $i++;
        }
    }
    $conn->close();
    return $output;
}

function getItemFromIot() {
    include "connect.php";
    $output = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT iotid FROM `iot`.`table_iot`";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<option value="' . $row["iotid"] . '">' . $row["iotid"] . '</option>';
            $i++;
        }
    }
    $conn->close();
    return $output;
}

function getItemFromVersion() {
    include "connect.php";
    $output = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT versionname FROM `iot`.`table_version`";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<option value="' . $row["versionname"] . '">' . $row["versionname"] . '</option>';
            $i++;
        }
    }
    $conn->close();
    return $output;
}
?>