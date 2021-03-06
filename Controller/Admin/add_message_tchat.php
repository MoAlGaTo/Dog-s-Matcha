<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Dog-s-Matcha/Model/admins.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($_SESSION['id_user']) || empty($data['id_sended']) || empty($data['id_check']) || empty($data['message'])) {
        echo json_encode(array(
            'success' => false
        ));
        die();
    } else if ($data['id_check'] != $data['id_sended']) {
        echo json_encode(array(
            'success' => false
        ));
        die();
    }


    if (!is_matched($_SESSION['id_user'], $data['id_sended'])) {
        echo json_encode(array(
            'success' => false
        ));
        die();
    }
    
    $id_sender = $_SESSION['id_user'];
    $id_sended = htmlspecialchars($data['id_sended']);
    $message = htmlspecialchars($data['message']);

    if (strlen($message) > 255 || strlen($message) < 1)  {
        echo json_encode(array(
            'failure' => true
        ));
    } else {
        $response = insert_message($id_sender, $id_sended, $message, 0, $id_sender);
        if ($response) {
            $response = insert_message($id_sender, $id_sended, $message, 0, $id_sended);
        }

        echo json_encode(array(
            'success' => $response,
        ));
    }
}

?>