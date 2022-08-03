<?php session_start();
if (!isset($_SESSION['nama'])) {
    header('location:index.php');
} ?>

Hi <b> <?php echo $_SESSION['nama']; ?></b> | <a href="logout.php"> Logout</a>

<hr>
<?php
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == 1) {
        echo "<h1>Ini adalah halaman admin</h1>";
    } else {
        echo "<h1>Ini adalah Halama Custumer</h1>";
    }
}
?>