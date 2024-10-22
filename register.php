<?php
include 'db.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set role, jika tidak ada pilihan role, default ke 'user'
    $role = isset($_POST['role']) ? $_POST['role'] : 'user';

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password', '$role')";

    // Jalankan query dan cek apakah berhasil
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form action="register.php" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="role"> <!-- Optional jika ingin memberikan pilihan role -->
        <option value="user">User</option>
        <option value="admin">Admin</option> <!-- Ini opsional -->
    </select><br>
    <input type="submit" value="Register">
</form>
