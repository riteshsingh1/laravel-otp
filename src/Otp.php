<?php
/**
 * Author : Ritesh Singh
 * Email: hello@imritesh.com
 * For Any Issues Please raise an issue on github
 * https://github.com/imritesh/otp
 */
namespace imritesh\Otp;

use GuzzleHttp\Client;

/**
 * Class Otp
 */
class Otp
{
    /**
     * @var
     * Service Provider
     */
    protected $serviceProvider;
    /**
     * @var
     */
    protected $mobileNumber;

    protected $otp;

    protected $template;

    protected $otpType;

    public function __construct()
    {
        $this->serviceProvider = config('otp.serviceProvider');
    }
    /**
     * Send Otp With mobile number and OTP
     */
    public function sendOtp($mobileNumber, $otp = null)
    {
        $this->mobileNumber = $mobileNumber;
        $this->otp = $otp;
        switch ($this->serviceProvider) {
            case "2Factor":
                return $this->twoFactor();
                break;
            default:
                throw new \Exception("Service Provider " . $this->serviceProvider . " Not Found");
        }
    }

    public function twoFactor()
    {
        $this->otpType = strtolower(config('otp.otpType'));
        switch ($this->otpType) {
            case "sms":
                return config('otp.otpMethod') ===
                    'auto' ? $this->auto() : $this->manual();
            case "voice":
                return config('otp.otpMethod') ===
                    'auto' ? $this->auto() : $this->manual();
            default:
                throw new \Exception("Unsupported Otp Type" . $this->otpType);
        }
    }

    public function withTemplate($template)
    {
        $otpType = $this->otpType;
        if ($otpType != 'sms') {
            return $this->template = '';
        }
        return $this->template = '/' . $template;
    }

    public function auto()
    {
        $apiKey = config('otp.apiKey');
        $client = new Client();
        $response =  $client->request(
            'GET',
            "https://2factor.in/API/V1/" . $apiKey . "/" . strtoupper($this->otpType) . "/" .
                $this->mobileNumber . "/AUTOGEN" . $this->template
        );
        return $response->getBody()->getContents();
    }

    public function manual()
    {
        if ($this->otp === null) {
            throw new \Exception("Otp Can not be null");
        }
        $apiKey = config('otp.apiKey');
        $client = new Client();
        $response =  $client->request(
            'GET',
            "https://2factor.in/API/V1/" . $apiKey . "/" . strtoupper($this->otpType) . "/" .
                $this->mobileNumber . "/" . $this->otp . $this->template
        );
        return $response->getBody()->getContents();
    }

    public function verify($sessionId, $input)
    {
        $apiKey = config('otp.apiKey');
        $client = new Client();
        $response =  $client->request(
            'GET',
            "https://2factor.in/API/V1/" . $apiKey . "/" . strtoupper($this->otpType) . "/VERIFY/" .
                $sessionId . "/" . $input
        );
        return $response->getBody()->getContents();
    }
}
