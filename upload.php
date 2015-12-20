<?php
require_once './aliyun-oss-php-sdk-2.0.1.phar';
use OSS\Http\RequestCore;
use OSS\OssClient;
use OSS\Core\OssException;
const OSS_ACCESS_ID = '您从OSS获得的AccessKeyId';
const OSS_ACCESS_KEY = '您从OSS获得的AccessKeySecret';
const OSS_ENDPOINT = 'OSS的域名，如 oss-cn-hangzhou.aliyuncs.com';
$bucket= "您在OSS上的Bucket";
//绑定OSS的URL，前面要加http，比如 http://www.yoursite.com/
$urls = '您访问OSS的地址/';
//读取图片base64编码格式
$base64_image_content = file_get_contents("php://input");
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
$type = $result[2];
if ($type!="png"){
exit("0");
}
}
$base64_body = substr(strstr($base64_image_content,','),1);
$data= base64_decode($base64_body);
//将base64转为图片并保存到临时路劲
$files = time();
$new_file = "./tmp/".$files.".png";
if (!file_put_contents($new_file,$data)){
exit("0");
}
else {
//传到OSS
$object = "face/".$files.".png";
$save_path = realpath($new_file);
$content = $save_path;
$ossClient = new OssClient(
OSS_ACCESS_ID, OSS_ACCESS_KEY, OSS_ENDPOINT, false);
try {
$ossClient->uploadFile($bucket, $object, $content);
} catch (OssException $e) {
print $e->getMessage();
}
session_start();
$_SESSION['face'] = $urls."face/".$files.".png";
echo "1";
}
?>