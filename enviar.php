<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $assunto = strip_tags(trim($_POST["assunto"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Preencha todos os campos obrigatórios.";
        exit;
    }

    $destinatario = "lvfr3112@gmail.com";

    $conteudo = "Nome: $nome\n";
    $conteudo .= "E-mail: $email\n";
    $conteudo .= "Assunto: $assunto\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    $headers = "From: $nome <$email>";

    if (mail($destinatario, "Mensagem do site - $assunto", $conteudo, $headers)) {
        echo "<p style='text-align:center; color:green;'>Mensagem enviada com sucesso! Entraremos em contato em breve.</p>";
    } else {
        echo "<p style='text-align:center; color:red;'>Erro ao enviar mensagem. Tente novamente mais tarde.</p>";
    }
}
?>