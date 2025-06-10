<?php
include 'koneksi.php';

$id_pengaduan = $_POST['id_pengaduan'];
$id_pengguna  = $_POST['id_pengguna'];
$pengirim     = $_POST['pengirim'];
$pesan        = htmlspecialchars($_POST['pesan']);

$stmt = $conn->prepare("INSERT INTO chat (id_pengaduan, id_pengguna, pengirim, pesan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiss", $id_pengaduan, $id_pengguna, $pengirim, $pesan);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: ../view/user/chat.php?id_pengaduan=$id_pengaduan");\
// Atau jika ingin kembali ke halaman admin
header("Location: ../view/admin/chat.php?id_pengaduan=$id_pengaduan");
exit();
?>