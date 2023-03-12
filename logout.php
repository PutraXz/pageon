<?
include 'koneksi.php';
session_start();
$req = $conn->query("delete from computers where user_id='$_SESSION[user_id]'");
session_destroy();
echo "
    <script>
        window.location.href='login';
    </script>
";