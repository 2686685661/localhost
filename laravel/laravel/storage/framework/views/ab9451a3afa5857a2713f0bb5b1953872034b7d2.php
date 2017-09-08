<div class="col-md-4 sidebar-gutter">
    <aside>
        <!-- sidebar-widget -->
        <div class="sidebar-widget">
            <h3 class="sidebar-title">About Me</h3>
            <div class="widget-container widget-about">
                <a href="post.html"><img src="<?php echo e(asset('img/author.jpg')); ?>" alt=""></a>
                <h4>ShanLei Li</h4>
                <div class="author-title">Designer</div>
                <p>While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major fashion moments on the front row too.A soul with an unyielding soul, a soul that longs to die</p>
            </div>
        </div>
        <!-- sidebar-widget -->
        <div class="sidebar-widget">
            <h3 class="sidebar-title">hot artical</h3>
            <div class="widget-container">
                <?php $__currentLoopData = $hotArtical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hottic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="widget-post">
                        <div class="post-image">
                            <a href="<?php echo e(url('front/frarticid',['id'=>$hottic->id])); ?>"><img src="<?php echo e(asset('upload/'.$hottic->picture)); ?>" alt=""></a>
                        </div>
                        <div class="post-body">
                            <h2><a href="<?php echo e(url('front/frarticid',['id'=>$hottic->id])); ?>"><?php echo e($hottic->headline); ?></a></h2>
                            <div class="post-meta">
                                <span><i class="fa fa-clock-o"></i><?php echo e(date('d,m,Y',$hottic->created_at)); ?></span> <span><a href=""><i class="fa fa-comment-o"></i><?php echo e($hottic->readnumber); ?></a></span>
                            </div>
                        </div>
                    </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <!-- sidebar-widget -->
        <div class="sidebar-widget">
            <h3 class="sidebar-title">Socials</h3>
            <div class="widget-container">
                <div class="widget-socials">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-reddit"></i></a>
                </div>
            </div>
        </div>
        <!-- sidebar-widget -->

        <div class="sidebar-widget">
            <h3 class="sidebar-title">hot message</h3>
            <div class="widget-container nimei">
                <ol class="number">
                    <li style="background-color: #ff858e" class="one">1</li>
                    <li style="background-color: #77d549" class="two">2</li>

                    <li style="background-color: #62c1ff" class="three">3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                </ol>
                <ul>
                    <?php $__currentLoopData = $hotmessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><p style="font-size: 18px;color: gray"><?php echo e(str_limit(strip_tags($message->name.' : '.$message->meageContent),20,'...')); ?></p></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </aside>
</div>
