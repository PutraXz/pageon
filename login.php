
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
      $ip = $conn->query("SELECT COUNT(*) as count FROM computers");
      if($ip['count'] < 2){
        $get_ip = $_SERVER['REMOTE_ADDR'];
        $query = $conn->query("INSERT INTO computers set ip_address='$get_ip',user_id='$_SESSION[user_id]'");
      }else{
        echo "maaf anda sudah login di dua tempat yang berbeda";
      }
      $res = $conn->query("select * from computers where user_id='$_SESSION[user_id]'");
      while($result = $res->fetch_array()){
        $allowed_ips = array($result['ip_address']);
      }
      $current_ip = $_SERVER['REMOTE_ADDR']; //mendapatkan IP saat ini dari user
      if (in_array($current_ip, $allowed_ips)) { 
        echo $allowed_ips;
      //IP diizinkan, lanjutkan proses login
      // echo "
      //   <script>
      //   window.location.href='dashboard'
      //   </script>
      // ";
    } else {
      //IP tidak diizinkan, tampilkan pesan error
      echo "Maaf, Anda tidak diizinkan untuk login.";
      }
    }
  }
?>
<!--  -->