<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dapatkan data dari borang
    $nama = htmlspecialchars($_POST['nama']);
    $emel = htmlspecialchars($_POST['emel']);
    $mesej = htmlspecialchars($_POST['mesej']);

    // Tetapkan penerima emel
    $kepada = "amsari136ict@gmail.com"; // Ganti dengan emel anda
    $tajuk = "Mesej Baru dari $nama";

    // Bina badan emel
    $badan_emel = "Anda menerima mesej baru dari:\n\n";
    $badan_emel .= "Nama: $nama\n";
    $badan_emel .= "Emel: $emel\n";
    $badan_emel .= "Mesej:\n$mesej\n";

    // Hantar emel
    if (mail($kepada, $tajuk, $badan_emel)) {
        echo "<p>Mesej berjaya dihantar!</p>";
    } else {
        echo "<p>Mesej gagal dihantar. Sila cuba lagi.</p>";
    }
}
?>
