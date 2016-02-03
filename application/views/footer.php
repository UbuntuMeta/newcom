<!-- footer区域 -->
<div id="footer">
    <p class="p_p"><img src="<?php echo IMG_PATH?>pic26.jpg"></p>
    <ul class="footer_ul fl">
        <li><span><a href="#">关于我们</a></span></li>
        <li><a href="company.php?id=5">联系我们</a></li>
        <li><a href="company.php?id=3">服务项目</a></li>
    </ul>

    <ul class="footer_ul fl">
        <li><span><a href="#">服务项目</a></span></li>
        <li><a href="#">画册、折页、包装</a></li>
        <li><a href="#">手提袋</a></li>
        <li><a href="#">产品包装系列</a></li>

    </ul>

    <ul class="footer_ul fl">
        <li><span><a href="#company.php?id=6">服务流程</a></span></li>
        <li><a href="#">印前服务项目</a></li>
        <li><a href="#">印刷服务</a></li>
        <li><a href="#">印后加工</a></li>
        <li><a href="#">服务</a></li>
    </ul>

    <ul class="footer_ul fl">
        <li><span><a href="#">经营理念</a></span></li>
        <li><a href="#">1. 追求卓越品质 </a></li>
        <li><a href="#">2. 强化系统管理</a></li>
        <li><a href="#">3.  至诚服务</a></li>
        <li><a href="#"> </a></li>
    </ul>
    <div class="footer_end">
        <p>  成都天鸿印务有限公司   地址：四川都江堰经济开发区九鼎大道12号
            电话：028-87113863
            传真：028-87113863<br>
            网址：<a href="#">www.scthyw.com</a>
            Email：273595388@qq.com</a>
        </p>
    </div>

</div>

</div>

<!------幻灯js部分------->
<script type="text/javascript">
    /*
     * @name: 图片幻灯片特效
     * @time: 2013/03/02
     * @author: 网友晓天
     * @url: #/
     * @directiona: 关注JquerySchool网站，支持原创
     */
    var myTimer;
    var currentIndex = -1;	//当前图片索引
    var $big = $('.big_img li');
    var $title = $('.slider_title li');
    var $small = $('.slider_list li');	//小图索引
    function show(){		//进行索引位置的处理
        var next = currentIndex < ($big.length -1)? currentIndex+1:0;	//判断图像的索引
        showImg(next);
    }

    function showImg(index){
        $($big[index]).stop().fadeIn().siblings().stop().fadeOut();
        $($title[index]).stop().show().siblings().stop().hide();
        $($small[index]).addClass('current').siblings().removeClass('current');
        currentIndex = index;
    }

    $(function(){
        myTimer = setInterval("show()",3000);
        //大图停止事件
        $big.hover(function(){clearInterval(myTimer);},function(){myTimer = setInterval("show()",3000);});
        //小图事件
        $small.hover(function(){
            var index = $(this).attr('index');
            clearInterval(myTimer);
            showImg(index-1);
        },function(){
            myTimer = setInterval("show()",3000);
        });
        show();
    });
</script>

</body></html>
