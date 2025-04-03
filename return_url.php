<?php
// return_url.php
header('Content-Type: text/html; charset=utf-8');

// 获取跳转参数
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

// 显示支付结果
if ($trade_status === 'TRADE_SUCCESS') {
    echo "<h2>支付成功！</h2>";
    echo "<p>订单号：{$out_trade_no}</p>";
    echo "<p>支付平台订单号：{$trade_no}</p>";
} else {
    echo "<h2>支付失败或未支付。</h2>";
}
?>
