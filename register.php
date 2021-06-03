<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

<div class="div5">
    <div class="div4">
        <h1>用户注册</h1>
    </div>
    <div>
        <form class="form1">
            用户名 ：<input type="text" id="username" value=""><br/>
            输入密码 ：<input type="password" id="password1" value=""><br/>
            确认密码 ：<input type="password" id="password2" value=""><br/>
        </form>

        <p style="text-align: center">
            <button class="button2"
                    onclick="window.location.href='http://localhost:801/singin.php'">
                登录
            </button>
            <button  class="button2"
                     onclick=register()>
                注册
            </button>
        </p>
        <p style="text-align: center">
            <button class="button2"
                    onclick="window.location.href = 'http://localhost:801/homepage.php'">
                返回主页
            </button>
        </p>
    </div>
</div>

<script>
    function register() {
        var username = document.getElementById("username").value;
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;

        if (username === "" || password1 === ""|| password2 === "") {
            alert("用户名、输入密码、确认密码不能为空");
        }else if (password1 !== password2) {
            alert("密码不一致，请重新输入");
        } else if (inspectletter(password1) || inspectnumber(password1)) {
            alert("密码格式错误");
        }else {
            alert("注册成功");
            window.location.href='http://localhost:801/homepage.php'
        }
    }



    function inspectletter(password){
        letter = "abcdefghijklmnopqrstuvwxyz";

        for(i = 0 ; i < letter.length; i ++){
            aChar = letter.substring(i, i + 1);
            if(password.indexOf(aChar) !== -1){
                return false;
            }
        }
        return true;
    }
    function inspectnumber(password){
        number = "0123456789";

        for(i = 0 ; i < number.length; i ++){
            aChar = number.substring(i, i + 1);
            if(password.indexOf(aChar) !== -1){
                return false;
            }
        }
        return true;
    }
</script>

</body>
</html>
