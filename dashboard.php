<?php
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$cards = [
    ['icon' => 'fas fa-users',        'title' => 'Users',   'value' => '1,234'],
    ['icon' => 'fas fa-dollar-sign',  'title' => 'Revenue', 'value' => '$45,678'],
    ['icon' => 'fas fa-box',          'title' => 'Orders',  'value' => '567'],
    ['icon' => 'fas fa-chart-line',   'title' => 'Growth',  'value' => '+23%']
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f5f7fa;
}
nav{
    background:#fff;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    padding:30px;
}
.card{
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    transition:.3s;
}
.card:hover{
    transform:translateY(-5px);
}
.icon{
    font-size:32px;
    color:#667eea;
    margin-bottom:10px;
}
.value{
    font-size:26px;
    font-weight:bold;
}
</style>
</head>
<body>

<nav>
    <b>Modern Dashboard</b>
    <div>
        Halo, <?= htmlspecialchars($_SESSION['full_name']) ?> |
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="grid">
<?php foreach ($cards as $c): ?>
    <div class="card">
        <div class="icon">
            <i class="<?= $c['icon'] ?>"></i>
        </div>
        <div><?= $c['title'] ?></div>
        <div class="value"><?= $c['value'] ?></div>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
