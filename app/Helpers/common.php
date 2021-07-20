<?php

use function PHPUnit\Framework\isNull;

function getRandomCode($length = 7, $email = null)
{
    $randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result = substr(str_shuffle($randomChars), 0, $length);
    if ($email == null) {
        $mail_id = "GUEST";
    } else {
        $_mail = explode('@', $email);
        $mail_id = strtoupper($_mail[0]);
    }
    $mid = str_replace([' ', '.', '_', '&'], "", $mail_id);
    return $mid . "-" . $result;
}

function getRandomNumber($length = 5)
{
    $randomNum = '0123456789';
    $result = substr(str_shuffle($randomNum), 0, $length);
    return $result;
}

function eanCheckDigit($fcode)
{
    $number = getRandomNumber(5);
    $code = '62' . $fcode . str_pad($number, 5, '0');
    $weightflag = true;
    $sum = 0;
    // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit.
    // loop backwards to make the loop length-agnostic. The same basic functionality
    // will work for codes of different lengths.
    for ($i = strlen($code) - 1; $i >= 0; $i--) {
        $sum += (int)$code[$i] * ($weightflag ? 3 : 1);
        $weightflag = !$weightflag;
    }
    $code .= (10 - ($sum % 10)) % 10;
    return $code;
}

function responseApiFormatter($statusCode = 200, $data = [], $message = "")
{
    $status = "success";
    if (in_array($statusCode, [200, 201])) {
        $status = "success";
    } else {
        $status = "error";
    }

    return [
        "code" => $statusCode,
        "status" => $status,
        "data" => $data,
        "message" => $message
    ];
}
