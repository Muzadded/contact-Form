<?php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $contactId = $_POST['contact_id'] ?? null;
    $first_name = $_POST['contact_first_name'] ?? null;
    $last_name = $_POST['contact_Last_name'] ?? null;
    $comment = $_POST['contact_comment'] ?? null;
    
    if ($contactId && $first_name && $last_name && $comment) {
        $sql = 'UPDATE contact_list SET first_name = ?, last_name = ?, comment = ? WHERE id = ?';

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssi', $first_name, $last_name, $comment, $contactId);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Product Update Successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to Update Product']);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the statement']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Data Provided']);
    }

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Inva']);
}
