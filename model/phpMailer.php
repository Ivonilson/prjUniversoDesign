<?php
require "../phpMailer/src/PHPMailer.php";
require"../phpMailer/src/SMTP.php";

      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      $nome = $dados['name'];
      $email = $dados['email'];
      $assunto = $dados['assunto'];
      $mensagem = $nome . '<br>' . $email . '<br><br>' . $dados['mensagem'];

      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = ";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "";
      $mail->Password = "";
      $mail->SetFrom("r", "Universo Design - Site");
      $mail->Subject = utf8_decode($assunto);
      $mail->Body = utf8_decode($mensagem);
      $mail->AddAddress("");
      if(!$mail->Send()) {
         //echo "Mailer Error: " . $mail->ErrorInfo;
       } else {
         echo "<script>alert('Registrado com sucesso!!!')</script>";
          echo "<script>window.location.href = '/?pagina=site'</script>";
          //echo "Mensagem enviada com sucesso";
       }

?>