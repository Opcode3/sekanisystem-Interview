<?php
    /**
     * Application Controller
     * Using the MVC Pattern
     */
    class TransactionContr extends Transaction{

        public function transactionsList($sortby="ASC"){ // Return all Trnasaction in our database
            return $this->out("Successful",$this->refineForOutput($this->readAllTransaction($sortby), ""));
        }



        public function getTransactionById($id, $sortby="ASC"){ // Get specific transaction by ID
            $outcome = $this->readTransaction($id, $sortby);
            if($outcome != false){
                return $this->out("Successful",$this->refineSingleDataForOutput($outcome));
            }
            return $this->out("Unsuccessful", "Transaction ID specified is not existing in the database.");
        }


        public function getTransactionByAccountNumber($accountNumber, $sortby="ASC"){ // Get specific transaction by Account Number
            $outcome = $this->readTransactionByAccountNumber($accountNumber, $sortby);
            if($outcome != false){
                return $this->out("Successful",$this->refineForOutput($outcome, ""));
            }
            return $this->out("Unsuccessful", "Customer with the Account Number does not exist in the database.");
        }


        public function getCummulativeBalance($accountNumber, $sortby="ASC"){ // Get All transaction pertaining to an account number with his cummulative balance
            $outcome = $this->readTransactionByAccountNumber($accountNumber,$sortby);
            if($outcome != false){
                $remainingBalance = $this->getBalance($outcome);
                return $this->out("Successful", $this->refineForOutput($outcome, $remainingBalance));
            }
            return $this->out("Unsuccessful", "Customer with the Account Number does not exist in the database.");
        }



        public function insertNewTransaction($transaction_data){ 
            //Check if transaction can be done for debit transaction type
            $accountNumber = $transaction_data[0];
            $amount = $transaction_data[1];
            $type = $transaction_data[2];
            $outcome = $this->readTransactionByAccountNumber($accountNumber, $sortby="ASC"); // Get all the past transaction details to know calculate the balance 
            if($outcome != false){ // checking  if any transaction exist
                $remainingBalance = $this->getBalance($outcome);
                if(strtolower($type) == "credit"){
                    $outcome = $this->writeTransaction($transaction_data);
                    return ($outcome)? $this->out("Successful","Transaction was successful!") : $this->out("Unsuccessful","Transaction was unsuccessful!");
                }else if($remainingBalance - $amount > 500){ // I'm assuming that 500 Naira should be the least amount in customer account 
                    $outcome = $this->writeTransaction($transaction_data);
                    return ($outcome)? $this->out("Successful","Transaction was successful!") : $this->out("Unsuccessful","Transaction was unsuccessful!");
                }
                return $this->out("Transaction Failed","Customer doesn't have enough amount to make a debit transaction");
            }
            return $this->out("Unsuccessful", "Customer with this Account Number does not exist in the database.");
        }



        private function getBalance($transaction_datas): int{ // Return the remaining balance from previous transaction
            $credit = 0;
            $debit = 0;
            foreach ($transaction_datas as $key => $value) {
                if( strtolower($value["transaction_type"]) == "credit"){
                    $credit +=  $value["amount"];
                }else{
                    $debit += $value["amount"];
                }
            }
            return $credit - $debit;
        }



        private function refineForOutput($output, $balance){ // Refine what will be return as stipulated in my ticket : For two or more transaction
            $result = array();
            foreach($output as $key => $value){
                $temp["Amount"] = $value["amount"];
                $temp["Date"] = $value["transaction_date"];
                $temp["Account_number"] = $value["user_account_no"];
                $temp["Transaction_Type"] = $value["transaction_type"];
                if(strlen(trim($balance)) > 1){ $temp["Balance"] = $balance; }
                array_push($result, $temp);
            }
            return $result;
        }


        private function refineSingleDataForOutput($output){ // Refine what will be return for a single transaction
            $temp["Amount"] = $output["amount"];
            $temp["Date"] = $output["transaction_date"];
            $temp["Account_number"] = $output["user_account_no"];
            $temp["Transaction_Type"] = $output["transaction_type"];
            return $temp;
        }

    
        //Response: prepare every response to be a json object
        private function out($message, $data){
            $list["message"] = $message;
            $list["data"] = $data;
            return json_encode($list);
        } 

    }