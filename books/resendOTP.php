<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16/10/2018
 * Time: 1:27 CH
 */session_start();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/IBanking/rest/services/sendingConfirm/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); // In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)

$data = array('username' => $_SESSION["username"], 'receiver_name' => $_SESSION["receiver_name"], 'transfering_money' => $_SESSION["transfering_money"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
header("Location: OTP.php");


?>