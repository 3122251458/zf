<?php
// submit.php
header('Content-Type: text/html; charset=utf-8');

// 商户信息
$pid = '133267036'; // 商户ID
$key = 'UxWLuSKc0d0'; // 商户密钥

// 获取参数
$type = 'alipay'; // 支付方式
$out_trade_no = '20230403123456'; // 商户订单号
$notify_url = 'http://1.34.1008b.icu/支付系统/1/notify_url.php'; // 异步通知地址
$return_url = 'http://1.34.1008b.icu/支付系统/1/return_url.php'; // 页面跳转通知地址
$name = '商品名称'; // 商品名称
$money = '5'; // 商品金额
$sitename = '您的网站名称'; // 网站名称

// 参数排序并生成签名字符串
$params = array(
    "money" => $money,
    "name" => $name,
    "notify_url" => $notify_url,
    "out_trade_no" => $out_trade_no,
    "pid" => $pid,
    "return_url" => $return_url,
    "sitename" => $sitename,
    "type" => $type
);
ksort($params);
$signString = "";
foreach ($params as $k => $v) {
    $signString .= $k . "=" . $v . "&";
}
$signString = rtrim($signString, "&");
$signString .= $key; // 添加商户密钥
$sign = md5($signString); // 生成签名

// 构造支付URL
$paymentUrl = "https://m47tz.lanfucai.com/submit.php?pid={$pid}&type={$type}&out_trade_no={$out_trade_no}&notify_url={$notify_url}&return_url={$return_url}&name=" . urlencode($name) . "&money={$money}&sitename=" . urlencode($sitename) . "&sign={$sign}&sign_type=MD5";

// 重定向到支付页面
header("Location: $paymentUrl");
exit;
?>
