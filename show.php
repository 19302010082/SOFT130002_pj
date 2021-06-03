<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show</title>
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

<!--用url获取图书id-->
<script>
    var url = window.location.search;
    var id = url.substr(url.lastIndexOf("=") + 1);
</script>

<div class="showdiv">
    <table>
        <tr>
            <?php
            $a = $_GET['id'];
            $coll = 'block';//收藏
            $truecoll = 'none';//已收藏

            $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");

            //先看此书是否被收藏过了
            $sql = "SELECT book FROM collection";
            $result = $conn->query($sql);

            while($row = mysqli_fetch_assoc($result)) {
                if($a == $row["book"]) {//此书已收藏
                    $coll = 'none';
                    $truecoll = 'block';
                    break;
                }
            }


            $result = mysqli_query($conn, "SELECT * FROM artworks WHERE artworkID=$a");
            $row = $result->fetch_assoc();

            $picture = "img/" . $row["imageFileName"];//获取图片相对路径

            echo
                "<th width='300' height='400'>" .
                "<div class='box' id='box'>" .
                "<div id='smallBox' class='small'>" .
                "<img src=$picture width='300' height='450'>" .
                "<div id='mask' class='mask'>" .
                "<div id='bigBox' class='big'>" .
                "<img src=$picture width='300' height='400' id='bigPic'>" .
                "</div>" .
                "</div>" .
                "</div>" .
                "</div>" .
                "</th>" .

                "<td>" .
                "<h1 style='text-align: center'>" . $row["title"] . "</h1>" .

                "<p5>" . "Artist : " . $row["artist"] . "</p5>" .
                "</br>" . "</br>" .
                "<p5>" . "Price : $" . $row["price"] . "</p5>" .
                "</br>" . "</br>" .
                "<textarea class='showp'>" . $row["description"] . "</textarea>" .
                "</br>" .
                "<button class='button2' style='float: right; display: $coll' onclick='col()' id='coll'>" . "收藏" . "</button>" .//收藏按钮
                "<p style='float: right; display: $truecoll' id='truecoll'>" . "已收藏" . "</p>" .//已收藏
                "</td>";

            $conn->close();
            ?>


            </td>
        </tr>
    </table>
</div>

<div class="div3">
    <h2>ArtStore.Produced and maintained by Achillessanger at 2018.4.1.All Rights Reserved</h2>
</div>


<script>
    var smallBox = document.getElementById('smallBox');
    var mask = document.getElementById('mask');
    var bigBox = document.getElementById('bigBox');
    var box = document.getElementById('box')
    var bigPic = document.getElementById('bigPic')
    //鼠标经过小盒子，显示大盒子
    smallBox.onmouseover = function () {
        bigBox.style.display = "block";
        mask.style.display = "block";
    }

    smallBox.onmouseout = function () {
        bigBox.style.display = "none";
        mask.style.display = "none";
    }
    smallBox.onmousemove = function (event) {
        //遮罩跟随鼠标
        var event = event || widow.event;
        var pageX = event.pageX || event.clientX + document.documentElement.scrollLeft;
        var pageY = event.pageY || event.clientY + document.documentElement.scrollTop;

        var targetX = pageX - box.offsetLeft - mask.offsetWidth / 2;
        var targetY = pageY - box.offsetLeft - mask.offsetHeight / 2;
        //限制mask移动范围
        if (targetX < 0) {
            targetX = 0;
        }
        if (targetY < 0) {
            targetY = 0;
        }

        if (targetX > smallBox.offsetWidth - mask.offsetWidth) {
            targetX = smallBox.offsetWidth - mask.offsetWidth;
        }

        if (targetY > smallBox.offsetHeight - mask.offsetHeight) {
            targetY = smallBox.offsetHeight - mask.offsetHeight;
        }

        mask.style.left = targetX + "px";
        mask.style.top = targetY + "px";
        //按照比例移动大图
        var bigToMove = bigPic.offsetWidth - bigBox.offsetWidth;
        var maskToMove = smallBox.offsetWidth - mask.offsetWidth;
        var rate = bigToMove / maskToMove;
        bigPic.style.left = -rate * targetX + "px";
        bigPic.style.top = -rate * targetY + "px";
    }


    function col() {
        <?php
        $conn0 = new mysqli("127.0.0.1:3307", "root", "", "1111");

        $sql0 = "insert into collection value ('$a')";
        $result0 = mysqli_query($conn0,$sql0);

        $conn0->close();
        ?>

        alert("收藏成功");

        document.getElementById('truecoll').style.display = 'block';
        document.getElementById('coll').style.display = 'none';
    }

</script>


</body>
</html>
