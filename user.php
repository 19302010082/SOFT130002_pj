<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<div class="div1">
    <ul style="color: aliceblue">
        <p1 class="navigation">Art Store</p1>
        <button class="button1"
                onclick="javascrtpt:window.location.href='http://localhost:801/homepage.php'">
            首页
        </button>
        <button class="button1"
                onclick="javascrtpt:window.location.href='http://localhost:801/search.php'">
            搜索
        </button>
        <button class="button1"
                onclick="javascrtpt:window.location.href='http://localhost:801/singin.php'">
            登录
        </button>
        <button class="button1"
                onclick="javascrtpt:window.location.href='http://localhost:801/register.php'">
            注册
        </button>
        <li style="float: right">
            <p>已登录</p>
        </li>
    </ul>
</div>

<div class="usertable">
    <table class="usermessage">
        <tr>

            <?php
            $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
            $sql = "SELECT password,name,email FROM users";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();


            echo "<td>" .
                "<img src='user.jpg' width='100' height='100' alt=''>" .
                "</td>" .
                "<td style='text-align: left'>" .
                "用户名 ：" . $row["name"] . "<br/>" .
                "密码 ：" . $row["password"] . "<br/>" .
                "邮箱 ：" . $row["email"] . "<br/>" .
                "收藏书籍 ：⬇" .
                "</td>";

            $conn->close();
            ?>


        </tr>
    </table>


    <div class="usercollection">
        <table style="border-spacing: 20px" id="table">
            <?php
            $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
            $sql = "SELECT artworkID,title,artist,description FROM artworks";
            $result = $conn->query($sql);
            $sql0 = "SELECT book FROM collection";
            $result0 = $conn->query($sql0);

            $i = 1;
            while ($row0 = $result0->fetch_assoc()) {
                while ($row = $result->fetch_assoc()) {
                    if ($row0["book"] == $row["artworkID"]) {//找到此书
                        $bookid = $row0["book"];
                        echo
                            "<tr id=$i>" .
                            "<td>" . "书名：" . $row["title"] . "<td>" .
                            "<td>" . "作者：" . $row["artist"] . "<td>" .
                            "<td>" . "简介：" . $row["description"] . "<td>" .

                            "<button style='float: right' class='button2' onclick='remove($i,$bookid)'>" .
                            "删除" .
                            "</button>" .
                            "</tr>";
                        $i++;

                        $result = $conn->query($sql);
                        break;
                    }
                }
            }
            $conn->close();
            ?>
        </table>
    </div>


</div>


<script>
    function remove(id, bookid) {
        <?php
        $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
        $sql1 = "DELETE FROM collection WHERE book=$bookid";
        $result1 = $conn->query($sql1);

        $conn->close();
        ?>

        document.getElementById("table").deleteRow(document.getElementById(id).rowIndex);
    }
</script>

</body>
</html>
