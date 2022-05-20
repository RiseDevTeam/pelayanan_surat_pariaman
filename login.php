<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style-login.css'>
</head>
<body>
  <div class="link">
  <a href="index.php"><i class='bx bxs-home bx-md'></i><span>Beranda</span></a>
  </div>
    <section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
    <div class="form"> 
      <h2>LOGIN</h2>
      <form method="post" action="login-db.php">
        <div class="inputBx">
          <input type="text" name="nomor_ktp" placeholder="Nomor KTP" required>
        </div>
        <div class="inputBx password">
          <input id="password-input" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="inputBx">
          <input type="submit" name="submit" value="Login"> 
        </div>
      </form>
      <div class="text">
        <h3>Aplikasi Pelayanan Surat © 2022</h3>
        <a href="daftar.php">Daftar Akun Baru</a>
      </div>
    </div>
  </div>
    
  </div>
</section>
</body>
</html>