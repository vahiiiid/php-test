<?php

if (!function_exists('api_response')) {
    function api_response
    (
        $status = 200,
        $message = '',
        $data = '',
        array $headers = array(),
        $options = 0
    ) {
        $msg = [
            'data' => $data,
            'message' => __($message)
        ];
        return response()->json($msg, $status, $headers, $options);
    }
}

if (!function_exists('api_error')) {
    function api_error
    (
        $status = 400,
        $message = '',
        $errors = '',
        array $headers = array(),
        $options = 0
    ) {
        $msg = [
            'message' => __($message),
            'errors' => [$errors]
        ];
        return response()->json($msg, $status, $headers, $options);
    }
}

if (!function_exists('create_password')) {
    function create_password()
    {
        $alphabet    = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $pass        = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n      = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
