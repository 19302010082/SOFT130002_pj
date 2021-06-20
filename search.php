<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<script type="text/javascript">
    function result() {
        var input = document.getElementById("input").value;
        if (input == "") {
            document.getElementById('none').style.display = 'block';
            document.getElementById('page1').style.display = 'none';
            document.getElementById('page2').style.display = 'none';
        } else {
            document.getElementById('none').style.display = 'none';
            document.getElementById('page1').style.display = 'block';
            document.getElementById('page2').style.display = 'none';
        }
    }

    function previous() {
        document.getElementById('page1').style.display = 'block';
        document.getElementById('page2').style.display = 'none';
    }

    function next() {
        document.getElementById('page1').style.display = 'none';
        document.getElementById('page2').style.display = 'block';
    }

</script>
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
            <p>未登录</p>
        </li>
    </ul>
</div>

<div style="text-align: center">
    <input type="text" id="input" value="">
    <button class="button2" onclick=result()>
        搜索
    </button>
</div>

<div id="none" style="display: block">
    <table class="searchtable">
        <?php
        $conn = new mysqli("127.0.0.1:3307", "root", "", "1111");
        $sql = "SELECT artworkID,title,artist,description FROM artworks";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $picture = "img/" . $row["artworkID"] . ".jpg" ;//获取图片相对路径
            echo
                "<tr>" .
                "<td>" . "<img src=$picture width='100' height='120'>" . "<td>" .

                "<td>" . "书名：" . $row["title"] . "<td>" .
                "<td>" . "作者：" . $row["artist"] . "<td>" .
                "<td>" . "简介：" . $row["description"] . "<td>" .

                "</tr>";
        }
        $conn->close();
        ?>
    </table>
</div>

<div id="page1" style="display: none">
    <table class="searchtable">
        <tr>
            <td>
                <table class="searchtabletd">
                    <tr>
                        <td>
                            <img src="resources/img/26.jpg" width="100" height="130" alt="">
                        </td>
                        <td class="searchtd">
                            名称 ：Two Nudes<br/>
                            作者 ：Pablo Picasso<br/>
                            简介 ：<br/>
                            <p class="searchp">
                                'Two Nudes', 'The terracotta shades and heavy monumentality of the figures in <em>Two
                                    Nudes</em> derive……
                            </p>
                            <button class="button2" style="float: right"
                                    onclick="javascrtpt:window.location.href='http://localhost:63339/lab1/show.html?_ijt=ghch9to0c8iiknlgmmriik23h6'">
                                Learn More
                            </button>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>

        <tr>
            <td>
                <button class="button2" style="float: left"
                        onclick="">
                    上一页
                </button>
            </td>
            <td></td>
            <td>
                <button class="button2" style="float: right"
                        onclick="next()">
                    下一页
                </button>
            </td>
        </tr>
    </table>
</div>

<div id="page2" style="display: none">
    <table class="searchtable">
        <tr>
            <td>
                <table class="searchtabletd">
                    <tr>
                        <td>
                            <img src="resources/img/26.jpg" width="100" height="130" alt="">
                        </td>
                        <td class="searchtd">
                            名称 ：Two Nudes<br/>
                            作者 ：Pablo Picasso<br/>
                            简介 ：<br/>
                            <p class="searchp">
                                'Two Nudes', 'The terracotta shades and heavy monumentality of the figures in <em>Two
                                    Nudes</em> derive……
                            </p>
                            <button class="button2" style="float: right"
                                    onclick="javascrtpt:window.location.href='http://localhost:63339/lab1/show.html?_ijt=ghch9to0c8iiknlgmmriik23h6'">
                                Learn More
                            </button>
                        </td>
                    </tr>
                </table>
            </td>

            <td>
                <table class="searchtabletd">
                    <tr>
                        <td>
                            <img src="resources/img/26.jpg" width="100" height="130" alt="">
                        </td>
                        <td class="searchtd">
                            名称 ：Two Nudes<br/>
                            作者 ：Pablo Picasso<br/>
                            简介 ：<br/>
                            <p class="searchp">
                                'Two Nudes', 'The terracotta shades and heavy monumentality of the figures in <em>Two
                                    Nudes</em> derive……
                            </p>
                            <button class="button2" style="float: right"
                                    onclick="javascrtpt:window.location.href='http://localhost:63339/lab1/show.html?_ijt=ghch9to0c8iiknlgmmriik23h6'">
                                Learn More
                            </button>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="searchtabletd"></table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="searchtabletd"></table>
            </td>
            <td>
                <table class="searchtabletd"></table>
            </td>
            <td>
                <table class="searchtabletd"></table>
            </td>
        </tr>
        <tr>
            <td>
                <button class="button2" style="float: left"
                        onclick="previous()">
                    上一页
                </button>
            </td>
            <td></td>
            <td>
                <button class="button2" style="float: right"
                        onclick="">
                    下一页
                </button>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
