<?php

return [
    /**
     * Service Provider Of OTP
     */
    'serviceProvider' => env('OTP_PROVIDER', '2Factor'),

    /**
     * Sender EndPoint
     */
    'senderEndPoint' => env('SENDER_ENDPOINT', '2Factor'),

    /**
     * Verification End Point
     */
    'verificationEndPoint' => env('RECEIVER_ENDPOINT', '2Factor'),

    /**
     * Otp Type
     * Accepted Values are sms and voice
     */
    'otpType' => env('OTP_TYPE', 'sms'),
    /**
     * OTP Method
     * Accepted Values are manual,auto
     */
    'otpMethod' => env('OTP_METHOD', 'manual'),
    /**
     * Api Key
     */
    'apiKey' => env('API_KEY', '398994a5-c4ec-11e5-9a14-00163ef91450'),

];
