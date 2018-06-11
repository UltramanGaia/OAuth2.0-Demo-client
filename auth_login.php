<?php
/**
 * Created by PhpStorm.
 * User: GaiaA
 * Date: 2018/6/11
 * Time: 14:46
 */
include "libs/global.php";
include "config/config.php";

session_start();

if(!isset($_GET['state'])||$_GET['state'] != $_SESSION['state']){
    $state = getRandStr(8);
    header("location: http://myauther.com/oauth2.0/authorize.php??response_type=code\
    &client_id=s6BhdRkqt3&state=$state&redirect_uri=http%3A%2f%2fmyclient.com%2fauth_login.php%3Fa%3Dc");
    exit();
}

// 获取到了authorization code了，接下来请求获取access code
$authorCode = $_GET['code'];
$url = "http://myauther.com/oauth2.0/getToken.php";
$queryString = "secret_code=adHexbgtxHGtcMoh13&grant_type=authorization_code&code=$authorCode";
$data = doCurlPostRequest($url,$queryString);


$json_data = json_decode($data);
//var_dump($json_data);
$accessToken = $json_data['access_token'];
$refresheToken = $json_data['refresh_token'];
$email = $json_data['email'];

// 已经能够实现登录，
$_SESSION['login'] = true;
$_SESSION['email'] = $email;
$sql = "insert into auth(email, accessToken, refreshToken) values(?,?,?)";
$mysqli_stmt = $mysqli->prepare($sql);
$mysqli_stmt->bind_param("sss",$email,$accessToken,$refresheToken);
$res = $mysqli_stmt->execute();
if(!$res){
    die("insert to mysql error");
}
$mysqli_stmt->close();

$mysqli->close();

//用accessToken去请求firstName, lastName
$url = "http://myauther.com/auth2.0/me.php";
$queryString = "secret_code=adHexbgtxHGtcMoh13&access_token=$accessToken";
$data = doCurlPostRequest($url, $queryString);
$json_data = json_decode($data);
$firstName = $json_data['firstname'];
$lastName = $json_data['lastname'];

echo "email = $email</br>";
echo "first name = $firstName</br>";
echo "last name = $lastName</br>";





