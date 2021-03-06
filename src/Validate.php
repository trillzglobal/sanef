<?php
namespace Sanef;

class Validate{

    /*
    Create New Agent
    */
    public function checkCreateAgent(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "AgentType"=> "AgentType to be provided",
            "LastName"=> "Last name must be provided",
            "FirstName"=> "First Name must be provided",
            "BusinessName"=> "Business Name must be provided",
            "Gender"=> "Gender must be provided",
            "PhoneNumber1"=> "Phone Number 1 must be provided",
            "AgentAddress"=> "Agent Address must be provided",
            "BusinessAddress"=> "Business Address must be provided",
            "EmailAddress"=> "Email Address must be provided",
            "BankVerificationNumber"=> "Bank Verification Number must be provided",
            "AgentBusiness"=> "Agent Business must be provided",
            "DateOfBirth"=> "Date of Birth Must be provided",
            "LocalGovernmentCode"=> "Local Government Code must be provided",
            "Username"=> "Agent Username must be provided",
            "Password"=> "Agent Password must be provided",
            "TransactionPin"=> "Agent TransactionPin must be provided",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "AgentType" => $data["AgentType"],
            "LastName" => $data["LastName"],
            "FirstName" => $data["FirstName"],
            "MiddleName" => $data["MiddleName"],
            "BusinessName" => $data["BusinessName"],
            "Gender" => $data["Gender"],
            "PhoneNumber1" => $data["PhoneNumber1"],
            "PhoneNumber2" => $data["PhoneNumber2"],
            "AgentAddress" => $data["AgentAddress"],
            "BusinessAddress" => $data["BusinessAddress"],
            "ClosestLandmark" => $data["ClosestLandmark"],
            "EmailAddress" => $data["EmailAddress"],
            "BankVerificationNumber" => $data["BankVerificationNumber"],
            "TaxIdentificationNumber" => $data["TaxIdentificationNumber"],
            "AgentBusiness" => $data["AgentBusiness"],
            "DateOfBirth" => $data["DateOfBirth"],
            "LocalGovernmentCode" => $data["LocalGovernmentCode"],
            "Latitude" => $data["Latitude"],
            "Longitude" => $data["Longitude"],
            "Username" => $data["Username"],
            "Password" => $data["Password"],
            "TransactionPin" => $data["TransactionPin"]
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkUpdateAgent(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "AgentType"=> "AgentType to be provided",
            "LastName"=> "Last name must be provided",
            "FirstName"=> "First Name must be provided",
            "BusinessName"=> "Business Name must be provided",
            "Gender"=> "Gender must be provided",
            "PhoneNumber1"=> "Phone Number 1 must be provided",
            "AgentAddress"=> "Agent Address must be provided",
            "BusinessAddress"=> "Business Address must be provided",
            "EmailAddress"=> "Email Address must be provided",
            "BankVerificationNumber"=> "Bank Verification Number must be provided",
            "AgentBusiness"=> "Agent Business must be provided",
            "DateOfBirth"=> "Date of Birth Must be provided",
            "LocalGovernmentCode"=> "Local Government Code must be provided",
            "Username"=> "Agent Username must be provided",
            "Password"=> "Agent Password must be provided",
            "TransactionPin"=> "Agent TransactionPin must be provided",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "AgentType" => $data["AgentType"],
            "LastName" => $data["LastName"],
            "FirstName" => $data["FirstName"],
            "MiddleName" => $data["MiddleName"],
            "BusinessName" => $data["BusinessName"],
            "Gender" => $data["Gender"],
            "PhoneNumber1" => $data["PhoneNumber1"],
            "PhoneNumber2" => $data["PhoneNumber2"],
            "AgentAddress" => $data["AgentAddress"],
            "BusinessAddress" => $data["BusinessAddress"],
            "ClosestLandmark" => $data["ClosestLandmark"],
            "EmailAddress" => $data["EmailAddress"],
            "BankVerificationNumber" => $data["BankVerificationNumber"],
            "TaxIdentificationNumber" => $data["TaxIdentificationNumber"],
            "AgentBusiness" => $data["AgentBusiness"],
            "DateOfBirth" => $data["DateOfBirth"],
            "LocalGovernmentCode" => $data["LocalGovernmentCode"],
            "Latitude" => $data["Latitude"],
            "Longitude" => $data["Longitude"],
            "Username" => $data["Username"],
            "Password" => $data["Password"],
            "TransactionPin" => $data["TransactionPin"]
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkAgentDetails(array $data){
        $compulsory = [
            "Data"=>"Provide username, code or phone number",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "Data" => $data["Data"],
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkCreateWallet(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "SuperAgentCode"=> "Provide SuperAgentCode maximum of 200 characters",
            "BankCode"=> "BankCode must be provided",
            "LastName"=> "Last name must be provided",
            "FirstName"=> "First Name must be provided",
            "Gender"=> "Gender must be provided",
            "City"=> "City must be provided",
            "StreetName"=> "StreetName must be provided",
            "PhoneNumber"=> "Phone Number 1 must be provided",
            "AccountOpeningBalance" => "AccountOpeningBalance must be provided",
            "DateOfBirth"=> "Date of Birth Must be provided",
            "CustomerImage "=> "CustomerImage  must be provided",
            "CustomerSignature"=> "CustomerSignature must be provided",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "SuperAgentCode" => $data["SuperAgentCode"],
            "BankCode" => $data["BankCode"],
            "AccountOpeningBalance" => $data["AccountOpeningBalance"],
            "AgentCode" => $data["AgentCode"],
            "CustomerImage" => $data["CustomerImage"],
            "CustomerSignature" => $data["CustomerSignature"],
            "AgentType" => $data["AgentType"],
            "LastName" => $data["LastName"],
            "FirstName" => $data["FirstName"],
            "MiddleName" => $data["MiddleName"],
            "HouseNumber" => $data["HouseNumber"],
            "Gender" => $data["Gender"],
            "PhoneNumber" => $data["PhoneNumber"],
            "StreetName" => $data["StreetName"],
            "City" => $data["City"],
            "EmailAddress" => $data["EmailAddress"],
            "DateOfBirth" => $data["DateOfBirth"],
            "LocalGovernmentCode" => $data["LocalGovernmentCode"],
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkCreateAccount(array $data){
        $compulsory = [
            "BankVerificationNumber"=>"Provide BankVerificationNumber",
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "SuperAgentCode"=> "Provide SuperAgentCode maximum of 200 characters",
            "BankCode"=> "BankCode must be provided",
            "LastName"=> "Last name must be provided",
            "FirstName"=> "First Name must be provided",
            "Gender"=> "Gender must be provided",
            "City"=> "City must be provided",
            "StreetName"=> "StreetName must be provided",
            "PhoneNumber"=> "Phone Number 1 must be provided",
            "AccountOpeningBalance" => "AccountOpeningBalance must be provided",
            "DateOfBirth"=> "Date of Birth Must be provided",
            "CustomerImage "=> "CustomerImage  must be provided",
            "CustomerSignature"=> "CustomerSignature must be provided",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "BankVerificationNumber" => $data["BankVerificationNumber"],
            "SuperAgentCode" => $data["SuperAgentCode"],
            "BankCode" => $data["BankCode"],
            "AccountOpeningBalance" => $data["AccountOpeningBalance"],
            "AgentCode" => $data["AgentCode"],
            "CustomerImage" => $data["CustomerImage"],
            "CustomerSignature" => $data["CustomerSignature"],
            "LastName" => $data["LastName"],
            "FirstName" => $data["FirstName"],
            "MiddleName" => $data["MiddleName"],
            "HouseNumber" => $data["HouseNumber"],
            "Gender" => $data["Gender"],
            "PhoneNumber" => $data["PhoneNumber"],
            "StreetName" => $data["StreetName"],
            "City" => $data["City"],
            "EmailAddress" => $data["EmailAddress"],
            "DateOfBirth" => $data["DateOfBirth"],
            "LocalGovernmentCode" => $data["LocalGovernmentCode"],
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkValidateCashCode(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "ThirdPartyID"=> "Provide ThirdPartyID",
            "AccountNumber"=>"Provide AccountNumber",
            "CashCode"=>"Provide CashCode",

        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "ThirdPartyID" => $data["ThirdPartyID"],
            "CashCode" => $data["CashCode"],
            "AccountNumber" => $data["AccountNumber"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "],

            
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkApproveCashCode(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "AccountNumber"=>"Provide AccountNumber",
            "ThirdPartyID"=> "Provide ThirdPartyID",
            "CashCode"=>"Provide CashCode",
            "Amount"=>"Provide Amount",

        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "CashCode" => $data["CashCode"],
            "ThirdPartyID" => $data["ThirdPartyID"],
            "AccountNumber" => $data["AccountNumber"],
            "Amount" => $data["Amount"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "],

            
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkRequeryCashCodeStatus(array $data){
        $compulsory = [
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "AccountNumber"=>"Provide AccountNumber",
            "ThirdPartyID"=> "Provide ThirdPartyID",
            "CashCode"=>"Provide CashCode",

        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "AgentCode" => $data["AgentCode"],
            "CashCode" => $data["CashCode"],
            "ThirdPartyID" => $data["ThirdPartyID"],
            "AccountNumber" => $data["AccountNumber"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "],

            
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }
    

    public function checkLog(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "BankCode"=>"Provide BankCode",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "CustomerName"=>"CustomerName must be Provided",
            "CustomerAccountNumber"=>"CustomerAccountNumber must be Provided",
            "DisputeTransactionType"=>"Provide DisputeTransactionType",
            "TransactionReference"=> "Provide TransactionReference",
            "TransactionDate "=>"Provide TransactionDate",
            "Amount"=>"Provide Amount",
            "LogBookImage"=>"Provide LogBookImage",

            

        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "BankCode" => $data["BankCode"],
            "CustomerName" => $data["CustomerName"],
            "CustomerAccountNumber" => $data["CustomerAccountNumber"],
            "DisputeTransactionType" => $data["DisputeTransactionType"],
            "TransactionReference" => $data["TransactionReference"],
            "Amount" => $data["Amount"],
            "TransactionDate " => $data["TransactionDate"],
            "LogBookImage" => $data["LogBookImage"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "],

            
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkHistory(array $data){
        $compulsory = [
            "StartDate"=>"Provide StartDate",
            "EndDate"=>"Provide EndDate",
            "PageIndex"=> "PageIndex",
            "PageSize"=>"Provide PageSize"
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "AgentCode" => $data["AgentCode"],
            "StartDate" => $data["StartDate"],
            "EndDate" => $data["EndDate"],
            "PageIndex" => $data["PageIndex"],
            "PageSize" => $data["PageSize"],
            "TransactionReference" => $data["TransactionReference"],
            "DisputeStatus" => $data["DisputeStatus"],
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkCardRequestSendOtp(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "BankCode"=>"Provide BankCode",
            "AccountNumber"=> "Provide AccountNumber",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "BankCode" => $data["BankCode"],
            "AccountNumber" => $data["AccountNumber"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "] 
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkcardRequestLinkCard(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "BankCode"=>"Provide BankCode",
            "AccountNumber"=> "Provide AccountNumber",
            "CardSerialNumber"=> "Provide CardSerialNumber",
            "Otp"=> "Provide Otp",
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "RequestId" => $data["RequestId"],
            "AgentCode" => $data["AgentCode"],
            "BankCode" => $data["BankCode"],
            "AccountNumber" => $data["AccountNumber"],
            "CardSerialNumber" => $data["CardSerialNumber"],
            "Otp" => $data["Otp"],
            "Latitude" => $data["Latitude"],
            "Longitude " => $data["Longitude "] 
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

    public function checkQueryAccountOpeningStatus(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "BankCode"=>"Provide Bank Code"
        ];

        $diff = array_diff_key($compulsory, $data);
        if(!empty($diff))
        {
            return ["status"=>"error", "details"=>$diff];;
        }
       $payload =  [
            "RequestId" => $data["RequestId"],
            "BankCode" => $data["BankCode"]
        ];
        $response = ["status"=>"success", "details"=>$payload];
        return $response;
    }

}