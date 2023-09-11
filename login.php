<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login user</title>
</head>
<body>
    <div class="login">
        <h2>User login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="username">User Name:</label><br> 
        <input type="text" name="username" placeholder="username"><br><br> 
        <label for="password">Password:</label><br>
        <input type="password" name="password" placeholder="password"><br><br> 
        <button type="submit" name="submit" class="btn">login</button>
        </form>
    </div>
    <div role="group" class="btn-group">
        <strong>Hints<br></strong>
        <button type="button" title="Hint 1" onclick='alert("Cố gắng đăng nhập bằng tài khoản user")'>1</button>
        <button type="button" title="Hint 2" onclick='alert("bypass đăng nhập nhé")'>2</button>
    </div>
    <?php
    if(isset($_POST['submit'])){  
        $usr = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $pas = hash('sha256', htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8')); 
        if($usr == "user" && $pas == "0"){ 
            $_SESSION['user'] = TRUE; 
            header("Location: reflected.php"); 
            exit; 
        }else{ 
            header("Location: login.php"); 
            exit; 
        } 
    } else {   
    }
    ?>
</body>
</html>
