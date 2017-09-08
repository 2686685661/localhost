<?php

require "FileUpload.php";
$up = new FileUpload();
$up->set('path','../View/images')->set('size',10000000);
$up->upload('myfile');

$picturename = $up->getname();

require "../Model/conModel.php";
$model = new \MyBlogs\Model\conModel;
$model->newpicture($picturename);


