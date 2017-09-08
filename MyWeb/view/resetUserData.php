<form class='form' id="setUserData">
    <div class="clearboth">
        <div class="head"><img src="__HEADROOT__<?php echo $head ?>" alt=""></div>
        <span class="changeHead">更换头像</span>
        <input class="input-head" type="file" name="head[]">
    </div>
    <div class='form-row'><label>姓名：</label>
        <input type='text' id='name' name="name" value=<?php echo $name ?> />
    </div>

    <div class='form-row'><label>性别：</label>
        <select id='sex' class='sex' name="sex">
            <?php
                if($sex === '女')
                    echo "<option selected>女</option><option>男</option>";
                else
                    echo "<option>女</option><option selected>男</option>";
            ?>
        </select>
    </div>
    <div class='form-row'><label>生日：</label>
        <input type='date' id='birthday' name="birthday" value='<?php echo $birthday ?>' >
    </div>
    <div class='form-row'><label>职业：</label>
        <input type='text' id='occupation' name="occupation" value='<?php echo $occupation ?>' >
    </div>
    <div class='form-row'><label>故乡：</label>
        <input type='text' id='hometown' name="hometown" value='<?php echo $hometown ?>' >
    </div>
    <div class='form-row'><label>地址：</label>
        <input type='text' id='location' name="location" value='<?php echo $location ?>' >
    </div>
    <div class='form-row'><label>公司：</label>
        <input type='text' id='company' name="company" value='<?php echo $company ?>' >
    </div>
    <div class='form-row'><label>电话：</label>
        <input type='text' id='phonenum' name="phonenum" value='<?php echo $phonenum ?>' >
    </div>
    <div class='form-row'><label>邮箱：</label>
        <input type='text' id='postbox' name="postbox" value='<?php echo $postbox ?>' >
    </div>
    <div class='form-row'><label>个人签名：</label>
        <textarea id='signature' name="signature"><?php echo $signature ?></textarea></div>
    <div class='form-row'><label>个人说明：</label>
        <textarea id='description' name="description"><?php echo $description ?></textarea></div>
</form>
<button class='sub' id='sub' >修改</button>
