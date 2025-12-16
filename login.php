<?php
require_once 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = ? OR email = ?"
    );
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI', Arial, sans-serif;
}
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#667eea,#764ba2);
}
.login-box{
    background:#fff;
    width:380px;
    padding:35px;
    border-radius:18px;
    box-shadow:0 20px 60px rgba(0,0,0,.25);
    animation:fadeUp .6s ease;
}
@keyframes fadeUp{
    from{opacity:0;transform:translateY(30px)}
    to{opacity:1;transform:translateY(0)}
}
.login-box h2{
    margin:0 0 10px;
    font-size:26px;
    color:#333;
}
.login-box p{
    margin:0 0 25px;
    color:#777;
    font-size:14px;
}
.input-group{
    margin-bottom:18px;
}
.input-group label{
    font-size:13px;
    color:#555;
    display:block;
    margin-bottom:6px;
}
.input-group .input-wrapper{
    position:relative;
}
.input-group i{
    position:absolute;
    top:50%;
    left:12px;
    transform:translateY(-50%);
    color:#999;
}
.input-group input{
    width:100%;
    padding:12px 14px 12px 38px;
    border-radius:10px;
    border:1.8px solid #e1e5ee;
    font-size:14px;
    transition:.3s;
}
.input-group input:focus{
    outline:none;
    border-color:#667eea;
    box-shadow:0 0 0 3px rgba(102,126,234,.15);
}
.btn{
    width:100%;
    padding:13px;
    border:none;
    border-radius:12px;
    background:#667eea;
    color:#fff;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}
.btn:hover{
    background:#5a6fdc;
    transform:translateY(-1px);
}
.error{
    background:#ffecec;
    color:#d63031;
    padding:10px;
    border-radius:10px;
    font-size:13px;
    text-align:center;
    margin-bottom:15px;
}
.demo{
    margin-top:20px;
    background:#f6f7fb;
    padding:12px;
    border-radius:10px;
    font-size:13px;
    color:#555;
}
.demo b{color:#333}
</style>
</head>
<body>

<div class="login-box">
    <h2>Welcome Back</h2>
    <p>Silakan login untuk melanjutkan</p>

    <?php if($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <label>Username / Email</label>
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
        </div>

        <div class="input-group">
            <label>Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
        </div>

        <button class="btn">Login</button>
    </form>

    <div class="demo">
        <b>Demo Account</b><br>
        Username: admin<br>
        Password: admin123
    </div>
</div>

</body>
</html>
