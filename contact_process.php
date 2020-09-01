<?php

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['email']) && !empty($_POST['email'])) {

    $nome = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['message']);

    $to = "eduardasantoss1997@gmail.com";
    $subject = "Contato - genius";
    $body = "Nome: " . $nome . "\r\n" .
        "Email: " . $email . "\r\n" .
        "Mensagem: " . $mensagem;
    $header = "From:myalliensanro@gmail.com" . "\r\n" .
        "Reply-To:" . $email . "\e\n" .
        "X=Mailer:PHP/" . phpversion();

    try {
        if (mail($to, $subject, $body, $header)) {
            echo 'E-mail enviado com sucesso!';
        } else {
            echo 'Ocorreu um erro desconhecido ao enviar e-mail.';
        }
    } catch (Exception $e) {
        echo json_encode(['result' => false, 'msg' => $e->getMessage()]);
    }

}
?>