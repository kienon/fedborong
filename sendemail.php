<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $emel = htmlspecialchars($_POST['emel']);
    $mesej = htmlspecialchars($_POST['mesej']);

    $mail = new PHPMailer(true);

    try {
        // Tetapan SMTP Bravo
        $mail->isSMTP();
        $mail->Host       = 'smtp.bravomail.com'; // Tukar kepada host Bravo
        $mail->SMTPAuth   = true;
        $mail->Username   = '854d40001@smtp-brevo.com'; // Tukar kepada emel Bravo anda
        $mail->Password   = '65Zrg9PYIDahGdTJ'; // Tukar kepada App Password jika perlu
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Guna SSL jika Bravo memerlukan
        $mail->Port       = 587; // Semak dengan Bravo jika perlu port lain

        // Tetapan e-mel
        $mail->setFrom('854d40001@smtp-brevo.com', 'Nama Anda'); // Dari akaun SMTP
        $mail->addAddress('amsari136ict@gmail.com'); // Tukar kepada emel penerima
        $mail->addReplyTo($emel, $nama); // Reply-To berdasarkan input pengguna

        // Kandungan e-mel
        $mail->isHTML(false);
        $mail->Subject = "Mesej Baru dari $nama";
        $mail->Body    = "Anda menerima mesej baru:\n\nNama: $nama\nEmel: $emel\nMesej:\n$mesej";

        $mail->send();
        echo "<p>Mesej berjaya dihantar!</p>";
    } catch (Exception $e) {
        echo "<p>Mesej gagal dihantar. Ralat: {$mail->ErrorInfo}</p>";
    }
}
?>
