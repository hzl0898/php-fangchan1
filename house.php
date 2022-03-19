<?php
include 'connect.php';
session_start();
//创建一个空数组
$house = array();

$i = 0;

$result = mysqli_query($link,"select * from house");
while ($row=mysqli_fetch_assoc($result)){
    $house[$i]['id']=$row['id'];
    $house[$i]['title']=$row['title'];
    $house[$i]['price']=$row['price'];
    $house[$i]['jiegou']=$row['jiegou'];
    $house[$i]['mianji']=$row['mianji'];
    $house[$i]['louceng']=$row['louceng'];
    $house[$i]['address']=$row['address'];
    $house[$i]['fdname']=$row['fdname'];
    $house[$i]['img']=$row['img'];
    $house[$i]['zhengzu']=$row['zhengzu'];
    $house[$i]['nanbei']=$row['nanbei'];
    $house[$i]['dtf']=$row['dtf'];

    $i++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>北海租房信息</title>
    <script src="layui-v2.6.8/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="layui-v2.6.8/layui/css/layui.css">
    <script src="layui-v2.6.8/layui/layui.js"></script>
    <script src="kindeditor/kindeditor-all.js"></script>
    <link rel="stylesheet" href="css/house.css">
</head>
<body>

<nav>
    <ul class="layui-nav" lay-filter="">
        <li class="layui-nav-item layui-nav-item layui-this"><a href="house.php">首页</a></li>
        <li class="layui-nav-item"><a href="userreserveList.php">我的收藏</a></li>
        <li class="layui-nav-item"><a href="userreservetow.php">我的预约</a></li>
        <li class="layui-nav-item" style="float: right">
            <a href="javascript:;" style="color: white"><span style="color: rgba(255,255,255,.7)">欢迎回来：</span>
                <span style="color: yellow"><?php echo $_SESSION['username']; ?></span></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="loginout.php">退出登录</a></dd>
            </dl>
        </li>
    </ul>
</nav>

<div class="bigDiv">
    <div class="logAndSearch">
        <a href="house.php" class="logAndSearchImg"><img style="width: 85px;height: 25px" src="img/anjukelogo.svg" alt=""></a>
        <a href="house.php" class="logAndSearchSpan">租房</a>
<div style="float: right;vertical-align: center;">
<input type="text" class="logAndSearchInput" id="con" placeholder="请输入小区名称、地址..."><input type="button" class="logAndSearchButton layui-btn" id="sousuo" value="搜索">
</div>
    </div>


    <div style="width: 1180px;height: 194px;margin: 20px auto;border: 1px solid #e6e6e6;">
        <div class="shaixuan01">
            <span>区域：</span>
            <a href="house.php">全部</a>
            <a href="">海城</a>
            <a href="">银海</a>
            <a href="">合浦</a>
            <a href="">铁山港</a>
        </div>
        <div class="shaixuan01">
            <span>租金：</span>
            <a href="house.php">全部</a>
            <a href="price/price500.php">500元以下</a>
            <a href="price/price500-800.php">500-800元</a>
            <a href="price/price800-1000.php">800-1000元</a>
            <a href="price/price1000-1500.php">1000-1500元</a>
            <a href="price/price1500-2000.php">1500-2000元</a>
            <a href="price/price2000-3000.php">2000-3000元</a>
            <a href="price/price3000-5000.php">3000-5000元</a>
            <a href="price/price5000up.php">5000元及以上</a>
        </div>
        <div class="shaixuan01">
            <span>房型：</span>
            <a href="house.php" class="layui-this">全部</a>
            <a href="price/jiegou1.php">一室</a>
            <a href="price/jiegou2.php">二室</a>
            <a href="price/jiegou3.php">三室</a>
            <a href="price/jiegou4.php">四室</a>
            <a href="price/jiegou5.php">五室及以上</a>
        </div>
        <div class="shaixuan01">
            <span>类型：</span>
            <a href="house.php">全部</a>
            <a href="price/zhengzu.php">整租</a>
            <a href="price/hezu.php">合租</a>
        </div>
        <div class="shaixuan01">
            <span>更多筛选：</span>

        </div>
    </div>

    <div class="textDiv">
        <div class="myCollection">
            <span style="float: left;padding-left: 21px;">为您找到<span style="color: #f60;padding: 0 2px 0 1px;">北海</span>附近租房</span>
            <div style="float: right;padding: 0 10px 0 10px">
                <span>排序：</span>
                <a href="house.php">默认</a>

                <a href="shengxu.php" class="" style="text-decoration: none">
                    <shan class="layui-icon layui-icon-up" style="font-size: 13px">租金</shan>
                </a>

                <a href="jiangxu.php" class="" style="text-decoration: none">
                    <shan class="layui-icon layui-icon-down" style="font-size: 13px">租金</shan>
                </a>
            </div>
        </div>

        <!--房源页-->
        <div class="layui-card mycontent" id="div1" style="float: left;margin-top: 10px">
            <?php
            foreach ($house as $value){
            echo '
            <div class="layui-card-body shijian" style="width: 900px;height: 176px;">
                <div class="layui-row" style="padding: 5px;">
                    <div class="layui-col-md2">
                        <img src="'.$value['img'].'" class="fwimg" width="180px" height="135px" alt="">
                    </div>
                    <div class="layui-col-md10" style="padding: 5px 0 0 50px">
                        <span style="font-size: 20px;font-weight: bold;" id="spp" class="fwtitle myTit" >'.$value['title'].'</span>
                        <span class="fwprice" style="display: block;width: 150px;height: 29px;font-size: 22px;float: right;color: #eb5f00">'.$value['price'].'
                            <span>元/月</span></span>
                        <div style="clear: both"></div>
                        <br>
                        <div>
                            <span class="fwjiegou">'.$value['jiegou'].'</span>
                            <span class="fwmianji">'.$value['mianji'].'</span>
                            <span class="fwlouceng">'.$value['louceng'].'</span>
                            <span class="fwfdname">'.$value['fdname'].'</span>
                        </div>
                        <!--把数据传递到userreserve.php-->
<a href="userreserve.php?id='.$value['id'].'&title='.$value['title'].'&price='.$value['price'].'&jiegou='.$value['jiegou'].'&mianji='.$value['mianji'].'&louceng='.$value['louceng'].'&address='.$value['address'].'&fdname='.$value['fdname'].'&img='.$value['img'].'" class="layui-btn layui-btn-normal" style="float: right">加入收藏</a>
                        <span class="fwaddress">'.$value['address'].'</span>
                        <br>
                        <span class="layui-badge layui-bg-orange">'.$value['zhengzu'].'</span>
                        <span class="layui-badge layui-bg-green">'.$value['nanbei'].'</span>
                        <span class="layui-badge layui-bg-blue">'.$value['dtf'].'</span>
                    </div>
                </div>
            </div>
            ';}
            ?>
        </div>

        <!--右侧广告页-->
        <div class="guanggao">

            <div class="div1">
                <a href="house.php">
                    <div style="width:200px;height:200px;border:none;padding:0px;margin:0px;overflow:hidden;position: relative;">
                        <img src="img/guanggao01.jpg" style="width: 200px;height: 200px;border: none;" alt="">
                    </div>
                </a>
            </div>

            <div class="div1">
                <a href="house.php">
                    <div style="width:200px;height:200px;border:none;padding:0px;margin:0px;overflow:hidden;position: relative;">
                        <img src="img/guanggao02.jpg" style="width: 200px;height: 200px;border: none;" alt="">
                    </div>
                </a>
            </div>

            <div class="div1">
                <div class="layui-carousel" id="test1">
                    <div carousel-item>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo01.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                        <span>优质好车，你还等啥</span>
                                </div>
                            </a>
                        </div>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo02.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                    <span>家政全包，为您分忧</span>
                                </div>
                            </a>
                        </div>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo03.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                    <span>全网热招，高薪职位</span>
                                </div>
                            </a>
                        </div>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo04.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                    <span>优质房源，舒适放心</span>
                                </div>
                            </a>
                        </div>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo05.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                    <span>二手好货，真的便宜</span>
                                </div>
                            </a>
                        </div>

                        <div class="lunboBox01" style="background-image: url(img/guanggaolunbo06.jpg);position:relative;">
                            <a href="#" class="rightcornerlink">
                                <div class="lunboBox02">
                                    <span>可爱萌宠，带回家!</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div style="clear: both"></div>
    </div>
</div>


<script>
    //轮播图
    layui.use('carousel', function(){
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#test1'
            ,width: '100%' //设置容器宽度
            ,height:'100%'//设置容器高度
            ,arrow: 'hover' //鼠标悬浮显示箭头
            //,anim: 'fade' //切换动画方式
            ,indicator:'none'//隐藏底部指示器
            ,interval:'3000'
        });
    });

    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
    $(function () {
        $("#sousuo").click(function () {
            str='';
            var con=$("#con").val();
            $.ajax({
                type:'get',
                url:'houseshowdb.php?content=sousuo',
                data:{"con":con},
                dataType:'json',
                success:function (data) {
                    str="";
                    $.each(data,function (key,value) {
                        str+=
                            "<div class='layui-card-body' style='margin-top: 20px'>"+
                                "<div class='layui-row'>"+
                                    "<div class='layui-col-md2'>"+
                                        "<img class='fwimg' width='180px' height='135px' src="+value.img+">"+
                                    "</div>"+
                                    "<div class='layui-col-md10' style='padding: 5px 0 0 50px;'>"+
                                        "<span style='font-size: 20px;font-weight: bold;' class='fwtitle myTit'>"+value.title+"</span>"+
                                        "<span class='fwprice' style='display: block;width: 150px;height: 29px;font-size: 22px;float: right;color: #eb5f00'>"+value.price+"<span>"+"元/月"+"</span>"+"</span>"+

                                    "<div style='clear: both'>"+"</div>"+"<br>"+
                                    "<div>"+
                                        "<span class='fwjiegou'>"+value.jiegou+"</span>"+
                                        "<span class='fwmianji'>"+value.mianji+"</span>"+
                                        "<span class='fwlouceng'>"+value.louceng+"</span>"+
                                        "<span class='fwfdname'>"+value.fdname+"</span>"+
                                    "</div>"+
                                    "<a href='userreserveList.php' class='layui-btn layui-btn-normal' style='float:right;margin:0 10px 0 10px'>"+"加入收藏"+"</a>"+
                                    "<span class='fwaddress'>"+value.address+"</span>"+"<br>"+
                                    "<span class='layui-badge layui-bg-orange' style='margin-right: 5px'>"+"整租"+"</span>"+
                                    "<span class='layui-badge layui-bg-green' style='margin-right: 5px'>"+"朝南"+"</span>"+
                                    "<span class='layui-badge layui-bg-blue' style='margin-right: 5px'>"+"有电梯"+"</span>"+
                                "</div>"+
                            "</div>"+
                        "</div>";

                        $("div#div1").html(str);

                        //截取字符串
                        $("span.myTit").each(function(){
                            //当前HTML对象text的长度
                            var len=$(this).text().length;
                            //如果字符大于20
                            if(len>20){
                                //那么就清空内容,使用字符串截取，获取前20个字符，多余的字符使用“...”代替
                                var str="";
                                str=$(this).text().substring(0,20)+"...";
                                //将替换的值赋值给当前对象
                                $(this).html(str);
                            }
                        });
                    })
                }
            })
        })
    });

    //限制文字字数，超出用省略号......表示
    $("span.myTit").each(function(){
        var len=$(this).text().length;   //当前HTML对象text的长度
        if(len>20){
            var str="";
            str=$(this).text().substring(0,20)+"...";  //使用字符串截取，获取前35个字符，多余的字符使用“......”代替
            $(this).html(str);                   //将替换的值赋值给当前对象
        }
    });

    // 回到顶部
    layui.use(['util', 'laydate', 'layer'], function(){
        var util = layui.util
            ,laydate = layui.laydate
            ,$ = layui.$
            ,layer = layui.layer;
        //固定块
        util.fixbar({
            bar1: false
            ,bar2: false
            ,css: {right: 50, bottom: 100}
            ,bgcolor: 'rgba(10,0,255,0.8)'

        });
    });
</script>
</body>
</html>