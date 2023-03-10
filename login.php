
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
  if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $q = $conn->query("select * from users where username='$u' and password='$p'");
    $data = $q->fetch_array();
    if($data['username'] == $u and $data['password'] == $p){
      session_start();
      $_SESSION['name_user'] = $data['name_user'];
      $_SESSION['status'] = $data['status'];
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['level'] = $data['level'];
        echo "
          <script>
          window.location.href='dashboard'
          </script>
        ";
    }else{
      echo "
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Username Or Password Invalid!!',
          })
        </script>
      ";
    }
  }
?>