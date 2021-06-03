<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <script type="text/javascript">
        window.onload = function () {
            var wrap = document.getElementById('wrap'),
                pic = document.getElementById('pic').getElementsByTagName("li"),
                list = document.getElementById('list').getElementsByTagName('li'),
                index = 0,
                timer = null;

            // 定义并调用自动播放函数
            timer = setInterval(autoPlay, 2000);

            // 鼠标划过整个容器时停止自动播放
            wrap.onmouseover = function () {
                clearInterval(timer);
            }

            // 鼠标离开整个容器时继续播放至下一张
            wrap.onmouseout = function () {
                timer = setInterval(autoPlay, 2000);
            }
            // 遍历所有数字导航实现划过切换至对应的图片
            for (var i = 0; i < list.length; i++) {
                list[i].onmouseover = function () {
                    clearInterval(timer);
                    index = this.innerText - 1;
                    changePic(index);
                };
            }
            ;

            function autoPlay() {
                if (++index >= pic.length) index = 0;
                changePic(index);
            }

            // 定义图片切换函数
            function changePic(curIndex) {
                for (var i = 0; i < pic.length; ++i) {
                    pic[i].style.display = "none";
                    list[i].className = "";
                }
                pic[curIndex].style.display = "block";
                list[curIndex].className = "on";
            }
        };
    </script>
</head>
<body>

<div class="div1">
    <ul>
        <p1 class="navigation">Art Store</p1>
        <sub>Where you find GENIUS and EXTROORDINARY</sub>
        <li style="float: right">
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
        </li>
    </ul>
</div>

<div class="div2">
    <div class="wrap" id='wrap'>
        <ul class="ul1" id="pic">
            <?php
            $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
            $sql = "SELECT artworkID, imageFileName,title,description FROM artworks";
            $result = $conn->query($sql);

            $i = 1;
            while ($i < 6) {
                $row = $result->fetch_assoc();
                $picture = "img/" . $row["imageFileName"];//获取图片相对路径
                $id = $row["artworkID"];
                echo
                    "<li>" .

                    "<div style='float: left'>" .
                    $row["title"] . "<br>" .

                    "<p class='searchp' style='width: 700px ;height: 32px'>" . $row["description"] . "</p>" .
                    "</p>".
                    "</div>".

                    "<a href='http://localhost:801/show.php?id=$id'>" .
                    "<img src=$picture width='800' height='400'>" .
                    "</a>" .

                    "</li>";

                $i++;
            }

            $conn->close();
            ?>
        </ul>
        <ul class="ul2" id="list">
            <?php
            $i = 1;
            $on = '';

            while ($i < 6) {//从1开始轮播
                if ($i == 1) {
                    $on = 'on';
                } else {
                    $on = '';
                }

                echo
                    "<li class=$on>" .
                    $i .
                    "</li>";
                $i++;
            }
            ?>
        </ul>
    </div>
</div>

<div class="exhibition">
    <table class="table1">
        <tr>
            <?php
            $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
            $sql = "SELECT artworkID, artist,imageFileName,title,description FROM artworks";
            $result = $conn->query($sql);

            $i = 1;
            while ($i < 4) {
                $row = $result->fetch_assoc();
                $picture = "img/" . $row["imageFileName"];//获取图片相对路径
                $id = $row["artworkID"];

                echo
                     "<td class='table2'>".
                "<a href='http://localhost:801/show.php?id=$id'>".
                    "<img src=$picture width='150' height='200'/>".
                "</a>".
                "<p>". $row["title"] . "</p>".
                "<p>". $row["artist"] ."</p>".
                "<p1 class='searchp'>".$row["description"] . "</p1>".
                "<br/>".

                "</td>";

                $i++;
            }

            $conn->close();
            ?>

        </tr>
    </table>
</div>

<div class="div3">
    <h2>ArtStore.Produced and maintained by Achillessanger at 2018.4.1.All Rights Reserved</h2>
</div>


</body>
</html>
