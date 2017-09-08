<?php
require "FileUpload.php";
//require 'Admin.php';
$up = new FileUpload();
$up->set('path','../View/articalPicture')->set('size',10000000);

$up->upload("articalcover");
$picturename = $up->getname();
require "../Model/conModel.php";
$model = new \MyBlogs\Model\conModel;
$row = $_POST;
$row['imgurl']=$picturename;
$new = $model->newArticle($row);

