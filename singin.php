<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Singin</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
<div class="div5">
    <div class="div4">
        <h1>用户登录</h1>
    </div>

    <div>
        <form class="form1">
            用户名 ：<input type="text" id="username" value=""><br/>
            密码 ：<input type="password" id="password" value=""><br/>
        </form>


        <p style="text-align: center">
            <button class="button2"
                    onclick=singin()>
                登录
            </button>
            <button class="button2"
                    onclick="window.location.href = 'http://localhost:801/register.php'">
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
    function singin() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" && password === "") {
            alert("用户名和密码不能为空");
        }else if (username === "") {
            alert("用户名不能为空");
        } else if (password === "") {
            alert("密码不能为空");
        }  else {
            alert("登录成功");
            window.location.href = 'http://localhost:801/homepage.php'
        }
    }
</script>


</body>
</html>
