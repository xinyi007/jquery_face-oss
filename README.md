# jquery_face-oss

PHP jquery基于阿里云OSS头像上传组件

其实原理很简单，利用jquery将图片剪切后保存为base64，

然后再将base64 通过 putobject 上传至OSS上去！

主要修改的upload.php文件：

const OSS_ACCESS_ID = '您从OSS获得的AccessKeyId';
const OSS_ACCESS_KEY = '您从OSS获得的AccessKeySecret';
const OSS_ENDPOINT = 'OSS的域名，如 oss-cn-hangzhou.aliyuncs.com';
$bucket= "您在OSS上的Bucket";
$urls = '您访问OSS的地址/';

至于样式表和其他功能的附加酌情修改！


欢迎一起交流PHP

团队博客：http://tech.ynho.com

腾讯微博：http://t.qq.com/xinyi007

新浪微博：http://weibo.com/ynho

微信/QQ添加：xinyi007/59471（请注明：PHP技术交流） 
