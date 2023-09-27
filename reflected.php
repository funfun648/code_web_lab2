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
    <title>Input Page</title>
    <style>
      body{
        background-image: url("../codePHP_vncert/imgs/anh-web.jpg");
        background-repeat: no-repeat;
        background-origin: border-box;
        background-size: 1920px 1080px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        margin: 0;
      }
      input[type="text"] {
    border-radius: 10px;
    background-color: #fff;
    color: #000;
    padding: 10px 20px;
    border: 1px solid #ccc;
    font-size: 15px;
  }
  
  button {
    border-radius: 10px;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 15px;
  }
  button:hover {
    background-color: #adb300;
  }
  #output {
    margin-top: 10px; 
    font-size: 15px;
  }
  h1, form, #output {
    font-size: 20px;
  text-align: center;
}
    </style>
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
    <div role="group" class="btn-group">
    <strong>Hints<br></strong>
    <button type="button" title="Hint 1" onclick='alert("ALERT(1) để xuất hiện một thứ gì đó ")'>1</button>
    <button type="button" title="Hint 2" onclick='showHint2()'>2</button>
    <button type="button" title="Hint 3" onclick='showHint3()'>3</button>
</div>

<script>
    function showHint2() {
        document.getElementById('hint-text').innerHTML = "tìm cách truy cập vào tài khoản manager nhé";
    }
    function showHint3() {

        document.getElementById('hint-text').innerHTML = "mã hóa base64 để đăng nhập vào manager ";
    }
</script>
<div id="hint-text" style="text-align: center; color: red;"></div>
</body>
</html>