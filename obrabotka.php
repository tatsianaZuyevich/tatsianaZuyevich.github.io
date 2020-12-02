<link rel="stylesheet" type="text/css" href="style/style_obr.css"/>

<?php
$servername = "127.0.0.1";
$database = "users_test";
$username = "root";
$password = "root";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (empty($_POST['attach'])) {
    $message = 'File exist';
}
else {
    $message = 'File empty';
}

if ($_FILES && $_FILES['attach']['error']== UPLOAD_ERR_OK) {
    $name = $_FILES['attach']['name'];
    $tmp_name = $_FILES['attach']['tmp_name'];
    $dir = dirname(__FILE__) .'/files/'.$_FILES['attach']['name'];
    move_uploaded_file($_FILES['attach']['tmp_name'], $dir);
    $message = '/files/'.$_FILES['attach']['name'];
    $messageNew = "<a href='$message'>$message</a>";
    echo '<br/>File Uploaded';
}
else {
    echo '<br/>No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
}

$sql = "INSERT INTO users (first_name, last_name, email, phone, attache_image) VALUES ('$firstName', '$lastName', '$email', '$phone', '$message')";
if (mysqli_query($conn, $sql)) {
    echo '<br/>New record created successfully';
} else {
    echo '<br/>Error: ' . $sql . '<br/>' . mysqli_error($conn);
}
echo '<p>';
echo 'First name: '.$firstName.'<br/>';
echo 'Last name: '.$lastName.'<br/>';
echo 'Email: '.$email.'<br/>';
echo 'Phone: '.$phone.'<br/>';
echo 'Attache image: '.$messageNew;
echo '</p>';

//Вывод значений из БД
$res = 'SELECT * FROM users';
$result = mysqli_query($conn, $res);

if($result) {
    $rows = mysqli_num_rows($result);   // количество полученных строк
    echo 'Number of records - '.$rows.'<br/>';
    echo '<table border="1">';
    echo '<tr><th>Id</th><th>First name</th><th>Last name</th><th>Email</th><th>Phone</th><th>Attache image</th></tr>';
    for ($i = 0 ; $i < $rows ; $i++)
    {
        $row = mysqli_fetch_row($result);
        echo '<tr>';
        for ($j = 0 ; $j < 6 ; $j++) {
            if ($j == 5) {
                echo "<td><img src='$row[$j]' style='max-width:100px;'></td>";
            }
            else {
                echo "<td>$row[$j]</td>";
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}
else {
    echo 'Error';
}

mysqli_close($conn);
