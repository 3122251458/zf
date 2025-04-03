<?php
// notify_url.php
header('Content-Type: text/plain; charset=utf-8');

// 获取通知参数
$pid = $_GET['pid'] ?? '';
$trade_no = $_GET['trade_no'] ?? '';
$out_trade_no = $_GET['out_trade_no'] ?? '';
$type = $_GET['type'] ?? '';
$name = $_GET['name'] ?? '';
$money = $_GET['money'] ?? '';
$trade_status = $_GET['trade_status'] ?? '';
$sign = $_GET['sign'] ?? '';

// 商户密钥
$merchantKey = 'UxWLuSKc0d0'; // 替换为您的商户密钥

// 验证签名
$signString = $money . $name . $out_trade_no . $pid . $trade_no . $trade_status . $type . $merchantKey;
$calculatedSign = md5($signString);

if ($calculatedSign !== $sign) {
    die('签名验证失败');
}

// 根据文档，TRADE_SUCCESS 表示支付成功
if ($trade_status === 'TRADE_SUCCESS') {
    // 支付成功逻辑
    echo 'success';
} else {
    // 支付失败逻辑
    echo 'fail';
}
?>
