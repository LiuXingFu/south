<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\php\Apache24\htdocs\South\public/../application/index\view\pay\pay.html";i:1561715538;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>码支付</title>
</head>
<body>
<form action="/south/public/codepay/codepay.php" method="post">
    <table align="center">
        <tr align="center">
            <td>
                <h1>码支付</h1>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                金额:
                <input type="radio" name="price" value="0.10" checked="checked" />0.10
                &nbsp;
                <input type="radio" name="price" value="1.00" />1.00
                &nbsp;
                <input type="radio" name="price" value="5.00" />5.00
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="user" value="admin" placeholder="充值用户名"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="type" value="1" checked="checked" />支付宝
                &nbsp;
                <input type="radio" name="type" value="2" />微信
                &nbsp;
                <input type="radio" name="type" value="3" />QQ钱包
            </td>
        </tr>
        <tr align="center">
            <td>
                <input type="submit" value="确定支付" />
                <hr />
            </td>
        </tr>
    </table>
</form>
</body>
</html>