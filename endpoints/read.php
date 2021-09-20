<?php

/**
 * Application Endpoint for all Get operation. its like the route
 * Using the MVC Pattern
 * 
 */
    declare(strict_types = 1);
    header('Content-Type: application/json'); // Return a Json Data
    include_once "classes-autoload.inc.php"; // Auto load all class in the project

    //Initializing transaction and validation controller
    $transaction = new transactionContr();
    $validate = new Validation();

    $sortBy = (isset($_GET["sort"])  && $_GET["sort"] == 1)?"DESC": "ASC";


    if(isset($_GET["transaction_id"])){
        $id = $_GET["transaction_id"];
        print_r($transaction->getTransactionById($id, $sortBy));
        exit;
    }

    
    if(isset($_GET["transaction_id"])){
        $id = $_GET["transaction_id"];
        print_r($transaction->getTransactionById($id, $sortBy));
        exit;
    }


    if(isset($_GET["cummulative_account_no"])){
        
        if($validate->accountNumber($_GET["cummulative_account_no"])){ // validate customer account number
            $account_no = $_GET["cummulative_account_no"];
            print_r($transaction->getCummulativeBalance($account_no, $sortBy));
        }else{
            response("Your account number is not correct!");
        }
        exit;
    }


    if(isset($_GET["account_no"])){
        
        if($validate->accountNumber($_GET["account_no"])){ // validate customer account number
            $account_no = $_GET["account_no"];
            print_r($transaction->getTransactionByAccountNumber($account_no, $sortBy));
        }else{
            response("Your account number is not correct!");
        }
        exit;
    }

    // echo "Run when we no request parameter is specified";
    if(isset($_GET)){
        print_r($transaction->transactionsList($sortBy));
    }


    // Response format
    function response($message){
        $list["message"] = "failed";
        $list["data"] = $message;
        print_r(json_encode($list));
    }

    










?>