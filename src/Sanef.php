<?php
namespace Sanef;
use \GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\RequestException
};

class Sanef extends Validate {
    public $superAgentCode;
    public $gpgPayload;
    public $gpgKey;
    public $payload;
    public $gpgPassphrase;
    public $base_url;
    public $encryptedPayload;
    public $checked_data;
    

    public function __construct( string $baseURL, string $superAgentCode, string $gpgKey, string $gpgPassphrase="")
    {
        $this->superAgentCode = $superAgentCode;
        $this->gpgKey = $gpgKey;
        $this->gpgPassphrase = $gpgPassphrase;
        $this->base_url = $baseURL;
    }

    private function encrypt(){
        $gpg = new gnupg();
        $gpg -> addencryptkey($this->gpgKey);
        return $gpg -> encrypt($this->payload);
    }

    private function decrypt($gpgResponse){
        $gpg = new gnupg();
        $gpg->adddecryptkey($this->gpgKey, $this->gpgPassphrase);
        $plain =$gpg->decrypt($gpgResponse);
        return $plain;
    }

    public function call(){
        
        $client = new Client();
        try{

            if(!empty($this->gpgPayload)){

                $data =  $client->request('POST',$this->base_url.$this->endpoint,[
                    'headers'=>["superAgentCode"=>$this->superAgentCode, "Content-Type"=>"application/json"],
                    'json'=>$this->gpgPayload
                ]);
            }
            else{
                $data =  $client->request('GET',$this->base_url.$this->endpoint,[
                    'headers'=>["ClientID"=>$this->superAgentCode, "Content-Type"=>"application/json"]
                ]);
            }
            //Body of response
            $data =(string) $data->getBody(true);
            $data = json_decode($data, true);
            $data = json_decode($this->decrypt($data["data"]), true);
            $response = json_encode(["data"=>$data, "status"=>"success"]);
        }catch(RequestException $e){

            if($e->hasResponse())
            $data =(string) $e->getResponse()->getBody(true);
            $data = json_decode($data, true);
            if(!empty($data["data"])){
                $data = json_decode($this->decrypt($data["data"]), true);
            }
            $response =json_encode(["data"=>$data, "status"=>"failed"]);
        }

        return $response;
    }

    /*
    Create New Agent
    */
    private function report($data){
        if($data["status"] == "error"){
            return json_encode($data);
        }
        $this->payload = json_encode($data);
        // $this->gpgPayload = json_encode(["data"=>$this->encrypt()]);

       // return $this->call();
    }

    public function createAgent(array $data){
        $this->endpoint = "api/v1/agents/create";
        $checked_data = $this->checkCreateAgent($data);
      return $this->report($data);
    }

    public function updateAgent(array $data){
        $data = $this->checkUpdateAgent($data);
        return $this->report($data);
    }

    public function agentDetails(array $data){
        $data = $this->checkAgentDetails($data);
        return $this->report($data);
    }

    public function createWallet(array $data){
        $data = $this->checkCreateWallet($data);
        return $this->report($data);
    }

    public function createAccount(array $data){
        $data = $this->checkCreateAccount($data);
        return $this->report($data);
    }
    
    public function validateCashCode(array $data){
        $data = $this->checkValidateCashCode($data);
        return $this->report($data);
    }

    public function approveCashCode(array $data){
        $data = $this->checkApproveCashCode($data);
        return $this->report($data);
    }

    public function requeryCashCodeStatus(array $data){
        $data = $this->checkRequeryCashCodeStatus($data);
        return $this->report($data);
    }

    public function log(array $data){
        $data = $this->checkLog($data);
        return $this->report($data);
    }

    public function history(array $data){
        $data = $this->checkHistory($data);
        return $this->report($data);
    }

    public function cardRequestSendOtp (array $data){
        $data = $this->checkCardRequestSendOtp($data);
        return $this->report($data);
    }

    public function cardRequestLinkCard(array $data){
        $data = $this->checkcardRequestLinkCard($data);
        return $this->report($data);
    }

    public function queryAccountOpeningStatus(array $data){
        $data = $this->checkQueryAccountOpeningStatus($data);
        return $this->report($data);
    }
}