<?php

namespace app\Controller;

include "D:\Kerja\Kuliah\WW\SEM5\PemrogramanWeb\Praktikum\Week5\Preprak\app\Traits\ApiResponseFormatter.php";
include "D:\Kerja\Kuliah\WW\SEM5\PemrogramanWeb\Praktikum\Week5\Preprak\app\Models\Product.php";

use app\Traits\ApiResponseFormatter;
use app\Models\Product;

class ProductController{
    use ApiResponseFormatter;


    public function index(){
        // definisikan object model product yang sudah di buat
        $productModel = new Product();

        $response = $productModel->findAll();

        return $this->apiResponse(200, "success", $response);

    }

    public function getById($id){
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert(){
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if(json_last_error()){
            return $this->apiResponse(400,"error invalid input", null);
        }
        $productModel = new Product();

        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);



        return $this->apiResponse(200, 'success', $response);
    }

    public function update($id){
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if(json_last_error()){
            return $this->apiResponse(400, 'error invalid input', null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiResponse(200, 'success', $response);
    }

    public function delete($id){
        $productModel = new Product();
        $response = $productModel->destroy($id);

        return $this->apiResponse(200, 'success', $response);
    }

}