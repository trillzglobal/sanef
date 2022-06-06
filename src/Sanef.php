<?php
namespace TrillzGlobal\Sanef;
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
    

    public function __construct( string $superAgentCode, string $gpgKey, string $gpgPassphrase="")
    {
        $this->superAgentCode = $superAgentCode;
        $this->gpgKey = $gpgKey;
        $this->gpgPassphrase = $gpgPassphrase;
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

    private function call(){
        
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
    
    public function createAgent(array $data){
        $data = $this->checkCreateAgent($data);
        if($data["status"] == "error"){
            return json_encode($data);
        }
        $this->payload = json_encode($data);
        $this->gpgPayload = json_encode(["data"=>$this->encrypt()]);

        return $this->call();
    }
}