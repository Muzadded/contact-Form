<?php
    include("connection.php");

    $requestType = $_SERVER['REQUEST_METHOD'];

    if ($requestType == 'POST') {
        $first_name = $_POST["fname"];
        $last_name = $_POST["lname"];
        $email = $_POST["email"];
        $comment = $_POST["comment"];

        $targetDir = "uploads/";
        $filename = basename($_FILES["user_file"]["name"]);
        $targetFilePath = $targetDir . $filename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $uploadSuccess = false;

        if (move_uploaded_file($_FILES["user_file"]["tmp_name"], $targetFilePath)) {
            $uploadSuccess = true;
        }
        else{
            echo "ERROR: File Upload Failed";
        }

        if ($uploadSuccess) {
            $stmt = $conn->prepare("INSERT INTO contact_list (first_name, last_name, email, user_file, comment, date_created) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $date_created = date('Y-m-d H:i:s');
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $filename, $comment, $date_created);

            if( $stmt->execute() === TRUE ){
                session_start();
                $_SESSION["success_message"] = "Data Inserted Successfully";
                $conn->close();
                header("Location: view_contact.php");
            }
            else{
                echo "ERROR: Could not insert Data";
            }
        }
    }
?>