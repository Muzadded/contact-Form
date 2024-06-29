<?php

include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $contactId = $_POST['contact_id'] ?? null;

    if($contactId){
        $sql = "DELETE FROM contact_list WHERE id = ?";

        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $contactId);

            if($stmt->execute()) {
                echo json_encode(['status'=> 'success','message'=> 'Contact Deleted Successfully']);
            }else{
                echo json_encode(['status'=> 'error','message'=> 'Failed to Delete Contact']);
            }
            $stmt->close();

        }else{
            echo json_encode(['status'=> 'error','message'=>'Failed to prepare the Statement']);
        }

    }else{
        echo json_encode(['status'=> 'error','message'=>'Invalid Contact ID']);
    }

    $conn->close();
}else{
    echo json_encode(['status'=> 'error','message'=>'Invalid Request MEthod']);
}
?>