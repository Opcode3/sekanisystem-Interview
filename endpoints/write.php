<?php

/**
 * Application API Endpoint for all Post operation its like the route
 * Using the MVC Pattern
 * 
 */

    declare(strict_types = 1);
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET,POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once "classes-autoload.inc.php";

    
    $transaction = new transactionContr();
    $validate = new Validation();


    if(isset($_POST["amount"]) && isset($_POST["account_no"]) && isset($_POST["type"])){

        if($validate->accountNumber($_POST["account_no"])){ // validate customer account number
            $transaction_data = array($_POST["account_no"], $_POST["amount"], $_POST["type"]);
            print_r($transaction->insertNewTransaction($transaction_data));
        }else{
            response("Your account number is not correct!");
        }
        
    }else{
        response("Incomplete request parameter");
    }

    function response($message){ // Refining data
        $list["message"] = "failed";
        $list["data"] = $message;
        print_r(json_encode($list));
    }
    











    
?>