<?php
include 'con_dbs.php';

$search = ''; // Khởi tạo biến $search mặc định

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT id, hoten, sdt, email, role FROM users WHERE hoten = '$search'";
    try {
        $result = $conn->query($sql);
        if ($result === false) {
            throw new Exception($conn->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm người dùng</title>
    <style>
        body {
            background-image: url('./imgs/aaa.jpg'); 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            text-align: center; 
            background-size: 1950px 850px;
        }

        h1 {
            color: black;
        }
        p 
        {
            margin-top: 60px;
            font-size: 20pt
        }

        form {
            margin: 20px auto; 
            width: 50%;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 20px; 
            padding: 10px; 
        }

        input[type="text"] {
            width: 80%;
            padding: 10px; 
            border-radius: 10px;
        }

        input[type="submit"] {
            background-color: #0077FF; 
            color: white; 
            border: none;
            border-radius: 10px;
            padding: 10px 20px; 
            cursor: pointer; 
        }

        input[type="submit"]:hover {
            background-color: yellow; 
        }

        table {
            margin: 20px auto;
            width: 80%; 
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 20px; 
            padding: 10px; 
        }

        table th, table td {
            padding: 10px; 
            border: 1px solid #ddd; 
        }
    </style>
</head>
<body class="centered">
    <h1>Tìm kiếm người dùng</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Tìm kiếm theo họ tên" value="<?php echo htmlentities($search); ?>">
        <input type="submit" value="Tìm kiếm">
    </form>

    <?php
    if (isset($result) && is_object($result)&& $result->num_rows > 0) {
        echo "<h2>Kết quả tìm kiếm:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Họ Tên</th><th>Số Điện Thoại</th><th>Email</th><th>Vai Trò</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['hoten'] . "</td>";
            echo "<td>" . $row['sdt'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<p>không tìm thấy !!!</p>";
    }
    ?>
<p>Hãy tìm cách để chiếm quyền điều khiển máy chủ ^^</p>
</body>
</html>
