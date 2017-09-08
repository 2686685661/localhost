<div>
    <lable class='text'>姓名：<span id="name" style="display: inline-block"><?php echo $name; ?></span></lable>
    <p class='text' id='name'></p>
</div>
<div>
    <lable class='text'>密保问题：</lable>
    <p class='text'><?php echo $question; ?></p>
</div>
<input id='answer' class='input' type='text' placeholder='密保答案'/>
<input id='new-password' class='input' type='password' placeholder='新密码'/>
<input id='confirm-password' class='input' type='password' placeholder='确认密码'/>
<input type='submit' id='submit2' class='submit' value='确认'>