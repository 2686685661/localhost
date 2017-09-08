
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my personage - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('static/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" />
    
    <?php $__env->startSection('style'); ?>

    <?php echo $__env->yieldSection(); ?>
</head>
<body>
<div id="wrapper">
    <?php $__env->startSection('header'); ?>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;TWO PAGE</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">See Website</a></li>
                    <li><a href="#">Open Ticket</a></li>
                    <li><a href="#">Report Bug</a></li>
                </ul>
            </div>

        </div>
    </div>
    <?php echo $__env->yieldSection(); ?>


    <?php $__env->startSection('leftmenu'); ?>
    
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center user-image-back">
                    <img src="<?php echo e(asset('img/find_user.png')); ?>" class="img-responsive" />

                </li>


                <li>
                    <a href="#"><i class="fa fa-edit "></i>文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('artical/newartical')); ?>">新增文章</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('artical/list')); ?>">文章列表</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-edit "></i>日记管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('diary/newdiary')); ?>">写日记</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('diary/list')); ?>">日记列表</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="#"><i class="fa fa-edit "></i>留言管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('message/messagelist')); ?>">留言列表</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('message/adoptlist')); ?>">待审核</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-table "></i>回收站</a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-sitemap "></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qrcode "></i>Tabs & Panels</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i>Mettis Charts</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit "></i>Last Link </a>
                </li>
                <li>
                    <a href="blank.html"><i class="fa fa-table "></i>Blank Page</a>
                </li>
            </ul>

        </div>

    </nav>
    <?php echo $__env->yieldSection(); ?>


    
    <div id="page-wrapper">
        <div id="page-inner">

            <?php echo $__env->make('queenCommon.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('connect'); ?>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('static/jquery/jquery-1.10.2.js')); ?>"></script>

<script src="<?php echo e(asset('static/bootstrap/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('static/jquery/jquery.metisMenu.js')); ?>"></script>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

<?php $__env->startSection('javascript'); ?>

<?php echo $__env->yieldSection(); ?>
</body>
</html>
