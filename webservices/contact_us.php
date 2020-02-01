<?php

include("dbconn.php");
if ($conn->connect_error) {
    die("Connection failed: ");
}
else{
    
    $dbconnObj = new connection();
    $conn = $dbconnObj->connect();
    
    $name ="";
    $email ="";
    $role = "";
    $message = "";

    if(isset($_POST['fname']))
        $name = $_POST['fname'];
    else
        req_error();
    
    if(isset($_POST['email']))
        $email = $_POST["email"];
    else
        req_error();
    
    if(isset($_POST['country']))
        $role = $_POST["country"];
    else
        req_error();

    if(isset($_POST['subject']))
        $message = $_POST["country"];
    else
        req_error();    

    $sql  = "INSERT INTO `contact_us` (`name`, `email`, `role`, `message`) VALUES (?, ?, ?, ?)";
                    
    if (!($stmt = $conn->prepare($sql))) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }

    if(!$stmt->bind_param("ssss", $name, $email, $role, $message)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else{
        echo "<h1 align=\"center\">Your data saved successfully</h1>";
        echo "<h1 align=\"center\">Thank you $name </h1>";
    }
}    

function req_error()
{
    echo "<h1>required filleds are not set</h1>";
    exit;
}
?>
