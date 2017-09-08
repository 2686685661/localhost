<div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
       <div class="form-group">
           <div class="col-md-6">
               <label for="file" class="col-md-4 control-label">请选择文件</label>
               <input id="file" type="file" for="file" class="form-control" name="source">
           </div>
       </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">确认上传</button>
            </div>
        </div>
    </form>
</div>