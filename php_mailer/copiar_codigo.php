<?php

                
    // Inserir Arquivos do PHPMailer
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Usar as classes sem o namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Criação do Objeto da Classe PHPMailer
    $mail = new PHPMailer(true); 


    try {
        
        //Retire o comentário abaixo para soltar detalhes do envio 
        // $mail->SMTPDebug = 2;                                
        
        // Usar SMTP para o envio
        $mail->isSMTP();                                      

        // Detalhes do servidor (No nosso exemplo é o Google)
        $mail->Host = 'smtp.gmail.com';

        // Permitir autenticação SMTP
        $mail->SMTPAuth = true;                               

        // Nome do usuário
        $mail->Username = 'usuário do e-mail';        
        // Senha do E-mail         
        $mail->Password = 'senha do e-mail';                           
        // Tipo de protocolo de segurança
        $mail->SMTPSecure = 'tls';   

        // Porta de conexão com o servidor                        
        $mail->Port = 587;

        
        // Garantir a autenticação com o Google
        $mail->SMTPOptions = array(             
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Remetente
        $mail->setFrom('from@example.com', 'Mailer');
        
        // Destinatário
        $mail->addAddress('to@example.com', 'Joe User');

        // Conteúdo

        // Define conteúdo como HTML
        $mail->isHTML(true);                                  

        // Assunto
        $mail->Subject = 'Insira o assunto';
        $mail->Body    = 'Insira o texto do e-mail';
        $mail->AltBody = 'Formato alternativo em texto puro para emails que não aceitam HTML';

        // Enviar E-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso';
    } catch (Exception $e) {
        echo 'A mensagem não foi enviada pelo seguinte motivo: ', $mail->ErrorInfo;
    }
            

?>