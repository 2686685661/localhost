<form id='addform' enctype='multipart/form-data'>
    <div class='form-row'><label>标题：</label>
        <input type='text' name='title' id='title' value="<?php echo $title ?>">
    </div>
    <div class='form-row'><label>类型：</label>
        <input type='text' name='type' id='type' value="<?php echo $type ?>">
    </div>
    <div class='form-row'><label>作者：</label>
        <input type='text' name='author' id='author' value="<?php echo $author ?>">
    </div>
    <div class='form-row'><label>封面：</label>
        <input type='file' name='cover[]' id='cover'>
    </div>
    <div class='summary'>
        <div class='title'>简介</div>
        <textarea name='summary' id='summary'><?php echo $summary ?></textarea>
    </div>
    <div class='clearboth content'>
        <div class='title'>内容</div>
        <textarea name='content' id='content' class='clearboth'>
            <?php echo $content ?>
        </textarea>
    </div>
    <input type='hidden' name='MAX_FILE_SIZE' value='2000000'>
</form>
<button class='sub' id='edit' >修改</button>