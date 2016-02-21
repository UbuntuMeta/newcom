<!-- mainbody区域 -->
<div id="mainbody">
    <div style="top: 200px;" id="ad">
        <img src="<?php echo IMG_PATH?>ads.gif" height="112" width="216">
    </div>

    <script src="<?php echo IMG_PATH?>b.js" async="" charset="utf-8" type="text/javascript"></script><script>

    function scroller(){
        document.getElementById("ad").style.top=200+document.documentElement.scrollTop+"px";
    }
    setInterval(scroller,1);

</script>
    <div class="main_left fl">

        <!--幻灯轮转开始-->
        <div id="box">
            <ul class="big_img">
                <?php foreach($adlist as $ad){?>
                <li><img src="<?php echo IMG_PATH , '/' , $ad['ad_img'];?>" alt=""/></a></li>
                <?php }?>
            </ul>

            <ul class="slider_title">
                <?php foreach($adlist as $ad){?>
                <li><a href="#"><?php echo $ad['ad_info'];?></a></li>
                <?php }?>
            </ul>
            <ul class="slider_list">
                <?php $len=count($adlist);?>
                <?php for($index=1;$index<=$len;$index++){?>
                <li index="<?php echo $index;?>" class="current"><a href="#"><img src="<?php echo IMG_PATH , '/', $adlist[$index-1]['thumb_img'];?>" alt="" /><span class="border"></span></a></li>

                <?php }?>
            </ul>
        </div>

        <div class="left_two">
            <div class="left_two_h2"><a href="company.php?id=2">公司简介</a></div>
            <dl class="left_two_dl">
                <dt><img src="<?php echo IMG_PATH;?>/data/images/201308/19/thumb_cf.jpg"></img><a href="#">工作厂房</a></dt>
                <dd> <?php echo mb_substr($intro['info'],0,400,'utf-8') , '......' ,
				'<a  href="company.php?id=2">点击此处看全文</a>';?>
                </dd>
            </dl>

            <div class="porductshow">
                <div class="title"><h2>产品展示</h2></div>
                <div class="show">
                    <div id="box1">
                        <div id="all_pic1">
                            <div id="one1">
                                <?php foreach($productPics as $p){?>
                                <dl class="product_scroll fl">
                                    <dt><a href=""><img src="<?php echo IMG_PATH , '/' , $p['thumb_img'];?>" height="117" width="151" /></a></dt>
                                    <dd></dd>
                                </dl>
                                <?php }?>
                            </div>
                            <div id="two1">
                                <dl class="product_scroll fl">
                                    <dt><a href="#readproduct.php?id=38"><img src="<?php echo IMG_PATH?>20121031031144.jpg" height="117" width="151"></a></dt>
                                    <dd></dd>
                                </dl>
                                <dl class="product_scroll fl">
                                    <dt><a href="#readproduct.php?id=37"><img src="<?php echo IMG_PATH?>20121031031141.jpg" height="117" width="151"></a></dt>
                                    <dd></dd>
                                </dl>
                                <dl class="product_scroll fl">
                                    <dt><a href="#readproduct.php?id=36"><img src="<?php echo IMG_PATH?>20121031031135.jpg" height="117" width="151"></a></dt>
                                    <dd></dd>
                                </dl>
                                <dl class="product_scroll fl">
                                    <dt><a href="#readproduct.php?id=35"><img src="<?php echo IMG_PATH?>20121031031057.jpg" height="117" width="151"></a></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <script language="javascript">
                                document.getElementById("two1").innerHTML=document.getElementById("one1").innerHTML;
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="left_three">
            <h2>合作伙伴</h2>
            <div class="img" style="line-height:18px;">
                <?php echo $partner['info'];?>
            </div>
        </div>

    </div>

    <div class="main_right fr">
        <div class="right_one">
            <h2 class="news"><a href="#newslist.php?type=%D0%D0%D2%B5%D0%C2%CE%C5">人才招聘</a></h2>
            <ul class="right_one_ul">
                <?php foreach($jobs as $r){?>
                <li style="border-bottom: 1px dashed rgb(223,223, 223);">&nbsp;<a href="newsdetails.php?id=<?php echo $r['news_id'];?>"><?php echo $r['news_title'];?></a></li>
                <?php }?>
            </ul>
        </div>

        <div class="right_two">
            <div class="consult"><a href="#">在线咨询</a></div>
            <p class="two_img"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=273595388
&amp;site=qq&amp;menu=yes"><img src="<?php echo IMG_PATH?>pa.gif" alt="点击这里给我发消息" title="点击这里给我发消息" border="0"></a></p>
            <div class="two_form">
                <img src="<?php echo IMG_PATH?>pic19.jpg" style="margin-bottom:4px;">
                <form action="addbbs.php" method="post" name="myform">
                    <input value="联系人" class="linkman" name="name" type="text">
                    <input value="电子邮件" class="email" name="email" type="text">
                    <input value="主题" class="subject" name="title" type="text">
                    <textarea class="content" name="content">内容</textarea>
                    <input value="验证码" class="check" name="code" type="text"><img src="<?php echo IMG_PATH?>code.png">
                    <p class="beizhu">注意：带<span>*为</span>必填！<br><span class="foem_phone">电话:028-87113863
 </span></p>
                    <input value="提交" class="subm" name="sub" onclick="return checkForm()" type="submit">
                    <input value="重置" class="rese" type="reset">
                    <script>
                        function checkForm(){
                            if(document.myform.name.value==""||document.myform.name.value=="联系人"){
                                alert("联系人不合法")
                                return false
                            }
                        }
                    </script>
                </form>
            </div>
            <div class="print">
                <div class="yinshua"><a href="news.php?type=行业新闻"> 行业新闻</a></div>
                <ul class="changshi">
                    <?php foreach($news as $x){?>
                        <li style="border-bottom: 1px dashed rgb(223,223, 223);">
                            <a href="newsdetails.php?id=<?php echo $x['news_id'];?>"><?php echo $x['news_title'];?></a>
                        </li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </div>
</div>