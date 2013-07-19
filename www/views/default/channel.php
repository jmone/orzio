<div>
    <form enctype="multipart/form-data" method="POST" action="/index.php?act=send">
        <b>标题</b><input type="text" name="message[title]" /><br />
        <b>E-mail</b><input type="text" name="message[email]" /><br />
        <textarea id="ftxa" rows="4" cols="48" name="message[content]"></textarea><br />
        <b>添加图片</b><input type="file" name="link"><br />
        <b>删除码</b><input type="text" name="message[delete_code]" /><br />
        <b>验证码</b><input type="text" name="validate" /><br />
        <input type="hidden" name="message[channel_id]" value="<?php echo $channel['id'];?>" />
        <input type="submit" value="匿名发布" />
    </form>
</div>

<div>
    <?php
    foreach ($messages as $message) {
    ?>
    <div class="message">
        <?php echo $message['title'];?><br />
        <?php echo $message['content'];?><br />
        <img src="<?php echo $message['link'];?>" /><br />
        <?php echo date('Y-m-d H:i:s', $message['dateline']);?>
    </div>
    <?php
    }
    ?>
</div>