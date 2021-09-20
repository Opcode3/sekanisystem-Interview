<?php

    /**
     * Aplication Model
     * Using the MVC Pattern
     */
    class Transaction extends Dbh{

        protected function readTransaction($id, $sortby){ //Read specific transaction
            $sql = "SELECT * FROM transactions_tb WHERE id=? ORDER BY transaction_date $sortby";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            if($stmt->rowCount() == 1){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            return false;
        }

        protected function readTransactionByAccountNumber($accountNumber,$sortby){
            $sql = "SELECT * FROM transactions_tb WHERE user_account_no=? ORDER BY transaction_date $sortby";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountNumber]);
            if($stmt->rowCount() > 0){
                $result = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($result, $row);
                }
                return $result;
            }
            return false;
        }

        protected function readAllTransaction($sortby): array{
            $sql = "SELECT * FROM transactions_tb ORDER BY transaction_date $sortby";
            $stmt = $this->connect()->query($sql);
            $result = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($result, $row);
            }
            return $result;
        }

        protected function writeTransaction($transaction_data_array): bool{ //Format: account_no, amount, transaction_type.
            $sql = "INSERT INTO transactions_tb(user_account_no,amount, transaction_type) VALUES(?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            
            return $stmt->execute($transaction_data_array) ? true : false;
        }

    }