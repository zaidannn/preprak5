<?php

header("Content-Type: application/json; charset=UTF-8");

include "D:\Kerja\Kuliah\WW\SEM5\PemrogramanWeb\Praktikum\Week5\Preprak\app\Routes\ProductRoutes.php";

use app\Routes\ProductRoutes;

$method = $_SERVER['REQUEST_METHOD'];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$productRoutes = new ProductRoutes();

$productRoutes->handle($method, $path);