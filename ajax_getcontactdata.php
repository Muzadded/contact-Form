<?php

include("connection.php");

if(isset($_GET['id'])){
    $contact_id = $_GET['id'];

    $sql = "SELECT * FROM contact_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        echo json_encode($row);
    }else{
        echo json_encode(array('error' => 'No Contact Found'));
    }
}
else{
    echo json_encode(array('error'=> 'No Contact Id Provided'));
}

?>