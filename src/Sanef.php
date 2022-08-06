<?php

namespace Sanef;

use \GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\RequestException
};

class Sanef extends Validate
{
    public $superAgentCode;
    public $gpgPayload;
    public $gpgKey;
    public $payload;
    public $gpgPassphrase;
    public $base_url;
    public $encryptedPayload;
    public $checked_data;


    public function __construct(string $baseURL, string $superAgentCode, string $gpgKey, string $gpgPassphrase = "")
    {
        $this->superAgentCode = $superAgentCode;
        $this->gpgKey = $gpgKey;
        $this->gpgPassphrase = $gpgPassphrase;
        $this->base_url = $baseURL;
    }

    private function encrypt()
    {
        $gpg = new gnupg();
        $gpg->addencryptkey($this->gpgKey);
        return $gpg->encrypt($this->payload);
    }

    private function decrypt($gpgResponse)
    {
        $gpg = new gnupg();
        $gpg->adddecryptkey($this->gpgKey, $this->gpgPassphrase);
        $plain = $gpg->decrypt($gpgResponse);
        return $plain;
    }

    public function call()
    {

        $client = new Client();
        try {


            if (!empty($this->gpgPayload)) {

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->base_url . $this->endpoint);
                // curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ["ClientID: $this->superAgentCode", "Content-Type: application/json"]);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $this->gpgPayload);
//                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT", 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $data = curl_exec($ch);
                // $request =  $client->request('POST', $this->base_url . $this->endpoint, [
                //     'headers' => ["ClientID" => $this->superAgentCode, "Content-Type" => "application/json"],
                //     'body' => $this->gpgPayload,
                //     'debug' => true
                // ]);
                var_dump($data);
            } else {
                $request =  $client->request('GET', $this->base_url . $this->endpoint, [
                    'headers' => ["ClientID" => $this->superAgentCode, "Content-Type" => "application/json"]
                ]);
                $data = (string) $request->getBody(true);
            }
            $data = json_decode($data, true);
            // $data = json_decode($this->decrypt($data["data"]), true);
            $response = json_encode(["data" => $data["Data"], "status" => "success"]);
        } catch (RequestException $e) {

            if ($e->hasResponse())
                $data = (string) $e->getResponse()->getBody(true);
            $data = json_decode($data, true);
            if (!empty($data["data"])) {
                $data = json_decode($this->decrypt($data["data"]), true);
            }
            // var_dump($e);
            $response = json_encode(["data" => $data ? $data : $e, "status" => "failed"]);
        }

        return $response;
    }

    /*
    Create New Agent
    */
    private function report($data)
    {
        if ($data["status"] == "error") {
            return json_encode($data);
        }
        $this->payload = json_encode($data['details']);
        // $this->gpgPayload = json_encode(["data"=>$this->encrypt()]);

        // return $this->call();
    }

    public function createAgent(array $data)
    {
        $this->endpoint = "api/v1/agents/create";
        $data = $this->checkCreateAgent($data);
        return $this->report($data);
    }

    public function updateAgent(array $data)
    {
        $this->endpoint = "api/v1/agents/update";
        $data = $this->checkUpdateAgent($data);
        return $this->report($data);
    }

    public function agentDetails(array $data)
    {
        $this->endpoint = "api/v1/agents/agentDetails";
        $data = $this->checkAgentDetails($data);
        return $this->report($data);
    }

    public function createWallet(array $data)
    {
        $this->endpoint = "api/v1/accounts/createWallet";
        $data = $this->checkCreateWallet($data);
        return $this->report($data);
    }

    public function createAccount(array $data)
    {
        $this->endpoint = "api/v1/accounts/createAccount";
        $data = $this->checkCreateAccount($data);
        return $this->report($data);
    }

    public function validateCashCode(array $data)
    {
        $this->endpoint = "api/v1/thirdparty/validateCashCode";
        $data = $this->checkValidateCashCode($data);
        return $this->report($data);
    }

    public function approveCashCode(array $data)
    {
        $this->endpoint = "api/v1/thirdparty/approveCashCode";
        $data = $this->checkApproveCashCode($data);
        return $this->report($data);
    }

    public function requeryCashCodeStatus(array $data)
    {
        $this->endpoint = "api/v1/thirdparty/requeryCashCodeStatus";
        $data = $this->checkRequeryCashCodeStatus($data);
        return $this->report($data);
    }

    public function log(array $data)
    {
        $this->endpoint = "api/v1/disputes/log";
        $data = $this->checkLog($data);
        return $this->report($data);
    }

    public function history(array $data)
    {
        $this->endpoint = "api/v1/disputes/history";
        $data = $this->checkHistory($data);
        return $this->report($data);
    }

    public function cardRequestSendOtp(array $data)
    {
        $this->endpoint = "api/v1/accounts/cardRequest/sendOtp";
        $data = $this->checkCardRequestSendOtp($data);
        return $this->report($data);
    }

    public function cardRequestLinkCard(array $data)
    {
        $this->endpoint = "api/v1/accounts/cardRequest/linkCard";
        $data = $this->checkcardRequestLinkCard($data);
        return $this->report($data);
    }

    public function queryAccountOpeningStatus(array $data)
    {
        $this->endpoint = "api/v1/accounts/queryAccountOpeningStatus";
        $data = $this->checkQueryAccountOpeningStatus($data);
        return $this->report($data);
    }
}
