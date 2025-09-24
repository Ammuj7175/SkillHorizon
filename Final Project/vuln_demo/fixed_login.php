<?php
require_once 'db_config.php';
$conn = get_db_conn();

$message=''; $message_type='';
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username']??''; $password=$_POST['password']??'';
    $stmt=$conn->prepare("SELECT id FROM users WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param("ss",$username,$password); $stmt->execute(); $stmt->store_result();
    if($stmt->num_rows===1){ $message="Login successful! Welcome $username"; $message_type='success'; }
    else{ $message="Login failed"; $message_type='error'; }
    $stmt->close();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fixed Login</title>
<style>
body{font-family:Arial,sans-serif;background:#eef2f7;margin:0;display:flex;justify-content:center;align-items:center;height:100vh;}
.container{background:white;padding:30px 40px;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.1);width:320px;text-align:center;}
input,button{width:100%;padding:12px;margin:10px 0;border-radius:6px;border:1px solid #ccc;box-sizing:border-box;font-size:16px;}
button{border:none;background:#3498db;color:white;font-weight:bold;cursor:pointer;}
button:hover{background:#2980b9;}
.message{padding:10px;margin-bottom:15px;border-radius:6px;font-weight:bold;display:none;}
.message.success{background:#d4edda;color:#155724;display:block;}
.message.error{background:#f8d7da;color:#721c24;display:block;}
</style>
</head>
<body>
<div class="container">
<h2>Fixed Login</h2>
<?php if($message): ?><div class="message <?= $message_type ?>"><?= $message ?></div><?php endif; ?>
<form method="post">
<input name="username" type="text" placeholder="Username" required />
<input name="password" type="text" placeholder="Password" required />
<button type="submit">Login</button>
</form>
<p style="font-size:12px;margin-top:10px;">Prepared statements prevent SQLi.</p>
</div>
</body>
</html>
