<?php
/**
 * Created by PhpStorm.
 * User: GaiaA
 * Date: 2018/6/8
 * Time: 15:49
 */
function getRandStr($length) {
    $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randString = '';
    $len = strlen($str)-1;
    for($i = 0;$i < $length;$i ++){
        $num = mt_rand(0, $len);
        $randString .= $str[$num];
    }
    return $randString ;
}

function echoMessageAndRefresh($message, $page = "javascript:window.history.back(-1);", $waitTime = 3){
    echo "<!DOCTYPE html>
<html>
    <head>
    <title></title>
    <script language=\"javascript\" type=\"text/javascript\">
        var time = $waitTime;
    function tiaozhuan()
    {
        if(time==0)
            window.location=\"$page\";
        time--;
    }
    setInterval(\"tiaozhuan()\",1000);
    </script>
    </head>
    <body>
        <p>$message</p>
    </body>
</html>";
}

/**
 ** @desc 封装 curl 的调用接口，post的请求方式
 **/
function doCurlPostRequest($url,$requestString,$timeout = 5){
    if($url == '' || $requestString == '' || $timeout <=0){
        return false;
    }
    $con = curl_init((string)$url);
    curl_setopt($con, CURLOPT_HEADER, false);
    curl_setopt($con, CURLOPT_POSTFIELDS, $requestString);
    curl_setopt($con, CURLOPT_POST,true);
    curl_setopt($con, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($con, CURLOPT_TIMEOUT,(int)$timeout);
    return curl_exec($con);
}

/**
 *@desc 封闭curl的调用接口，get的请求方式。
 */
function doCurlGetRequest($url,$data,$timeout = 5){
    if($url == "" || $timeout <= 0){
        return false;
    }
    $url = $url.'?'.http_bulid_query($data);
    $con = curl_init((string)$url);
    curl_setopt($con, CURLOPT_HEADER, false);
    curl_setopt($con, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($con, CURLOPT_TIMEOUT, (int)$timeout);

    return curl_exec($con);
}
