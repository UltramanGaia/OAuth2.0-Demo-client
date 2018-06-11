<?php
/**
 * Created by PhpStorm.
 * User: GaiaA
 * Date: 2018/6/11
 * Time: 15:32
 */
//phpinfo();
$accessToken = "accesstoken";
$refreshToken = "refreshtoken";
$email = "eeee@qq.com";
$data = "{
       \"access_token\":\"$accessToken\",
       \"token_type\":\"example\",
       \"expires_in\":3600,
       \"refresh_token\":\"$refreshToken\",
       \"email\":\"$email\"
     }
";
$json_data = json_decode($data);
var_dump($json_data);
