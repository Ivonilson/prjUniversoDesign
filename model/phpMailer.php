<?php
require "../phpMailer/src/PHPMailer.php";
require"../phpMailer/src/SMTP.php";

      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $assunto = $_POST['assunto'];
      $mensagem = $nome . '<br>' . $email . '<br>' . 'Telefone: ' . $telefone . '<br><br>' .$_POST['mensagem'];
      
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "br474.hostgator.com.br";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "";
      $mail->Password = "";
      $mail->SetFrom("universodesign@universodesigncv.com.br", "Universo Design - Site");
      $mail->Subject = utf8_decode($assunto);
      $mail->Body = utf8_decode($mensagem);
      $mail->AddAddress("universodesign@universodesigncv.com.br");
      if(!$mail->Send()) {
         //echo "<script>alert($mail->ErrorInfo </script>";
       } else {
         echo "<script>alert('Registrado com sucesso!')</script>";
          //echo "<script>window.location.href = '/?pagina=site'</script>";
          //echo "Mensagem enviada com sucesso";
       }

?>