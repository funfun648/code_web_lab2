<?php
setcookie('cookie_name', 'I am User');
if (isset($_COOKIE['cookie_name'])) {
  if ($_COOKIE['cookie_name'] === 'I am User') {
    $username = "User";
  } elseif (base64_decode($_COOKIE['cookie_name']) === 'adminxsstosql') {
    $username = "Manager";
    header('Location: manager.php');
    exit;
  } else {
    $username = "không tồn tại!!!";
  }
}
?>
<?php
function escape($s) {
  return '<script>document.write("HELLO : ' . strtoupper($s) . '")</script>';
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $escapedName = escape($name);

  // Thực hiện kiểm tra nếu người dùng đã thực hiện cuộc tấn công XSS thành công
  if (strpos($escapedName, '&#97&#108&#101&#114&#116(1)') !== false) {
        echo "<script>alert('adminxsstosql');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="reflected.css">
    <title>Input Page</title>
</head>
<body>
    <h1>Nhập tên và nhấn nút để hiển thị</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Nhập một cái gì đó">
        <button type="submit" name="submit">Hiển thị</button>
    </form>
    <div id="output">
        <?php if (isset($escapedName)) echo $escapedName; ?>
    </div>
</body>
</html>