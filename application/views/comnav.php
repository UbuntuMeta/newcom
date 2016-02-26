<div id="mainbodynews">

    <div class="newsleft fl">
        <div class="newscenter">
            <h2 class="newstitle"><a href="#">关于我们</a></h2>
            <ul class="newsnav">
                <?php foreach($comlist as $v){?>
                    <li><a href="/company/<?php echo $navArray[$v['id']];?>"><?php echo $v['com_title'];?></a></li>

                <?php }?>
            </ul>
        </div>

        <div class="newsconsult"><!--consult咨询-->
            <h2 class="online newstitle"><a href="#">在线咨询</a></h2>
            <div class="two_form newsform">
                <img src="%E4%BC%81%E4%B8%9A%E7%AE%80%E4%BB%8B_files/pic19.jpg" style="margin-bottom:4px;">
                <form>
                    <input value="联系人" c                lass="linkman" type="text">
                    <input value="电子邮件" class="email" type="text">
                    <input value="主题" class="subject" type="text">
                    <textarea class="content" name="content">内容</textarea>
                    <input value="验证码" class="check newscheck" type="text"><img src="%E4%BC%81%E4%B8%9A%E7%AE%80%E4%BB%8B_files/pic20.jpg">
                    <p class="beizhu">注意：带<span>*为</span>必填！<br><span class="foem_phone">电话：010-84673473</span></p>
                    <input value="提交" class="subm" type="submit">
                    <input value="重置" class="rese" type="reset">
                </form>
            </div>
        </div>
    </div>