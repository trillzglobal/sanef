<?php
namespace TrillzGlobal\Sanef;

class Validate{

    /*
    Create New Agent
    */
    public function checkCreateAgent(array $data){
        $compulsory = [
            "RequestId"=>"Provide RequestId",
            "AgentCode"=> "Provide AgentCode maximum of 200 characters",
            "AgentType"=> "Date of Birth to be provided",
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
}