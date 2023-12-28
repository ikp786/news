<?php
namespace App\Traits;
trait ApiResponse
{
    function sendSuccessWithToken($message, $result = null,$token)
    {
        $response = [
            'ResponseCode'  => 200,
            'Status'    => true,
            'message' => $message,
            'Data' => $result,
            'Token'=>$token
        ];
        return response()->json($response, 200);
    }
    function sendFailed($errorMessage = [], $code = 200)
    {
        $response = [
            'ResponseCode'  => $code,
            'Status'    => false,
        ];
        if (!empty($errorMessage)) {
            $response['message'] = $errorMessage;
        }
        return response()->json($response, $code);
    }
    function sendSuccess($message, $result = null)
    {
        $response = [
            'ResponseCode'  => 200,
            'Status'    => true,
            'message' => $message
        ];
        if ($result) {
           $response['Data'] = $result;
        }
        return response()->json($response, 200);
    }
   
   
}