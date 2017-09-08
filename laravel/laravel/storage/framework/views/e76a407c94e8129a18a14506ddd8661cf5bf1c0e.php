
<?php if(count($errors)): ?>
    <div id="" class="zhao" style="display: block;">
        <div class="ui-5447790657 npl-win npl-aau" style="top: 4.5px; left: 27%;">
            <div class="zwrp">
                <a href="javascript:;" class="zcls zflg" title="关闭" onclick="frontovers(this)"></a>
                <div class="ztbr noselect zmov">
                    <div class="zttl thide fc1 zflg">错误!!</div>
                </div>
                <div class="zcnt fc2 zflg">
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>