<?php
    /**
     * Application Validation Class
     * Using the MVC Pattern
     */
    class Validation{

        public function accountNumber($account): bool{ // Account number validation
            if(is_numeric($account) && strlen(trim($account)) == 10){
                return true;
            }else{
                return false;
            }
        }

    }