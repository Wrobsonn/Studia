<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/Database.php';
include_once '../class/Cities.php';

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(400);
    echo json_encode(array("message" => "Metoda powinna byc typu GET"));
    exit;
}

$data = json_decode(file_get_contents("php://input"));
$database = new Database();
$db = $database->getConnection();
$cities = new Cities($db);
$citya = $_GET["miasto"];
$combinedResult = $cities->read($citya);

if ($combinedResult) {
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($combinedResult);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Nie znaleziono danych."));
}
