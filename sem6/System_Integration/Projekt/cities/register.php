<?php
include_once '../config/Database.php';
require '../vendor/autoload.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$login = '';
$password = '';

$databaseService = new Database();
$conn = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));

$login = isset($data->login) ? $data->login : "";
$password = isset($data->password) ? $data->password : "";

$table_name = 'users';
$check_query = "SELECT id FROM " . $table_name . " WHERE login = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("s", $login);
$check_stmt->execute();
$check_stmt->store_result();
$num_rows = $check_stmt->num_rows;

if ($num_rows > 0) {
    http_response_code(400);
    echo json_encode(array("message" => "Taki login już istnieje."));
} else {

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO " . $table_name . "
                SET login = ?,
                password = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $login, $password_hash);

    if ($stmt->execute()) {

        http_response_code(200);
        echo json_encode(array("message" => "Użytkownik został pomyślnie stworzony. Teraz możesz się zalogować"));
    } else {
        http_response_code(400);

        echo json_encode(array("message" => "Nie można stworzyć użytkownia. Sprawdź czy istnieje baza danych, lub skontaktuj się z administratorem."));
    }
}
