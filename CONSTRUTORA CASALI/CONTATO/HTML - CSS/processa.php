<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = _post('nome');
        $celular_email = _post('celular_email');
        $assunto = _post('assunto');
        $mensagem = _post('mensagem');
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "cesar@celke.ga");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "celkeadm@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Ilza, <br><br>Nova mensagem de contato<br><br>$nome<br>$celular_email<br>$assunto<br>$mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        echo $response->headers();
        echo $response->body();
        ?>
    </body>
</html>