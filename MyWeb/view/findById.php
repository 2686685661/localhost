<form class='form' id='replace'>
    <div class='form-row'><label>密保问题</label>
        <input type='text' name='question' value="<?php echo $question ?>">
    </div>
    <div class='form-row'><label>密保答案</label>
        <input type='text' name='answer' value="<?php echo $answer ?>">
    </div>
    <div class='form-row'><label>更新密码</label>
        <input type='password' name='password'>
    </div>
    <div class='form-row'><label>确认密码</label>
        <input type='password' name='newpassword'>
    </div>
</form>
<button id='replace-sub' style='display:block; width: 50px;margin: 0 auto;'>确认</button>
