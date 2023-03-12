
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form method="post">
    <div class="row">
      <label for="username">Username</label>
      <input type="text" name="username" autocomplete="off" placeholder="Masukkan Username">
    </div>
    <div class="row">
      <label for="password">Password</label>
      <input type="password" name="password">
    </div>
    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>
<?php
  include 'koneksi.php';
  session_start();
  if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $q = $conn->query("select * from users where username='$u' and password='$p'");
    $data = $q->fetch_array();
    if($data['username'] == $u and $data['password'] == $p){
      $_SESSION['name_user'] = $data['name_user'];
      $_SESSION['status'] = $data['status'];
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['level'] = $data['level'];

      // Jika user belum login sebelumnya, simpan IP ke database
      $res = $conn->query("SELECT * FROM computers WHERE user_id='$_SESSION[user_id]'")->fetch_array();
      if($res == 0){
        $ip = $_SERVER["REMOTE_ADDR"];
        $conn->query("INSERT INTO computers SET ip_address='$ip', user_id='$_SESSION[user_id]'");
      }else{
        // Cek apakah IP saat ini sama dengan IP saat login sebelumnya
        if($_SESSION['ip_address'] != $res['ip_address']){
          echo "Maaf, Anda tidak diizinkan login dari IP yang berbeda.";
          exit;
        }else{
          echo "
          <script>
            window.location.href='dashboard';
            </script>
          ";
        }
      }

      // Set IP address dari user yang baru saja login
      $_SESSION["ip_address"] = $_SERVER["REMOTE_ADDR"];
    } else {
      echo "Maaf, username atau password salah.";
    }
  }
?>


