<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\php\Apache24\htdocs\South\public/../application/index\view\index\register.html";i:1561684013;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <style type="text/css">
        tr {
            text-align: left;
        }
        span {
            color: red;
        }
    </style>
    <script type="text/javascript" src="./static/js/jquery-2.2.0.js"></script>
    <script type="text/javascript">
        /*************短信验证码*****************/
        var countdown = 60;
        function settime(val) {
            if (countdown == 0) {
                val.removeAttribute("disabled");
                val.value = "免费获取验证码";
                countdown = 60;
                return;
            } else {
                if (countdown == 60){
                    var yzmtel = document.getElementById("yzmtel").value;
                    //判断手机号是不是为空
                    if(yzmtel != ''){
                        //号码不为空，发送请求
                        xmlHttp = new XMLHttpRequest();
                        xmlHttp.open("GET", "index.php/index/index/ucpaastest?yzmtel="+yzmtel, true);
                        xmlHttp.send(null);
                    }else {
                        //手机号为空
                        $("#yzmtel_prompt").text("请输入手机号码");
                        return;
                    }
                }
                val.setAttribute("disabled", true);
                val.value = "重新发送(" + countdown + ")";
                countdown--;
            }
            setTimeout(function () {
                settime(val)
            }, 1000)
        }
    </script>
</head>
<body>
<form action="index.php/index/index/login" method="post">
    <table align="center">
        <tr>
            <td align="center">
                <h1>
                    注册<br/><hr/>
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="username" placeholder="昵称" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="password" name="userpass" placeholder="账号密码" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" id="yzmtel" name="yzmtel" placeholder="常用手机号" />
                <span id="yzmtel_prompt"></span>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="yzm" placeholder="验证码" />
                <input type="button" id="btn" value="点击获取" onclick="settime(this)"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="text" name="code" placeholder="图中验证码"/>
                <?php echo captcha_img(); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="注册" />
                <hr/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
