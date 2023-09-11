<?php
include 'con_dbs.php';

$search = ''; // Khởi tạo biến $search mặc định

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT id, hoten, sdt, email, role FROM users WHERE hoten = '$search'";
    $result = $conn->query($sql);

    if ($result === false) {
        echo  $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm người dùng</title>
</head>
<body>
    <h1>Tìm kiếm người dùng</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Tìm kiếm theo họ tên" value="<?php echo $search; ?>">
        <input type="submit" value="Tìm kiếm">
    </form>

    <?php
    if (isset($result) && $result->num_rows > 0) {
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
    ?>

</body>
</html>
