<?php
if(isset($_POST['btn_enviar'])){
    $newline = '
';
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $assunto = $_POST['assunto'];
    $to      = 'reker@reker.com.br';
    if(empty($nome) || empty($email) || empty($assunto) || empty($telefone) || empty($mensagem)){
        header("Location: ../contato?get=emptyfields");
        exit();
    }
    else{
        $message = 'Nome: '.$nome.$newline;
        $message = $message.'Telefone: '.$telefone.$newline;
        $message = $message.'Email: '.$email.$newline;
        $message = $message.$mensagem;
        $headers = "Mime-Version: 1.0\n";
        $headers .= "Content-Type: text/plain;charset=UTF-8\n";
        $headers .= 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/'.phpversion();
        mail($to, $assunto, $message, $headers);
        header("Location: ../contato?get=success");
        exit();
    }    
}
else{
    echo 'burro';
}
?> 