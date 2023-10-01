<?php
// Lấy từ khóa tìm kiếm từ form
$keyword = $_GET['keyword'];

// Kết nối cơ sở dữ liệu và thực hiện truy vấn tìm kiếm sản phẩm
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Kết quả tìm kiếm:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Không tìm thấy sản phẩm nào phù hợp";
}

$conn->close();
?>
