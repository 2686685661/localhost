<form  method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group">
        <label>Text Input</label>
        <input class="form-control" name="Artical[headline]" value="{{ old('Artical')['headline'] ? old('Artical')['headline'] : $artical->headline }}">
        <p class="help-block">Help text here.</p>
    </div>
    <div class="form-group">
        <label>Text Input with Placeholder</label>
        <input class="form-control" name="Artical[publishperson]" placeholder="PLease Enter Keyword"
        value="{{ old('Artical')['publishperson'] ? old('Artical')['publishperson'] : $artical->publishperson }}"
        >
    </div>
    {{--<div class="form-group">--}}
    {{--<label>Text</label>--}}
    {{--<select id="disabledSelect" name="Artical[artyid]" class="form-control">--}}
    {{--<option>Disabled t</option>--}}
    {{--<option>Disabled a</option>--}}
    {{--<option>Disabled s</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    <div class="form-group">
        <label>Just A Label Control</label>
        <p class="form-control-static">info@yourdomain.com</p>
    </div>

    <div class="form-group">
        <label for="file" class="col-md-4 control-label">请选择文件</label>
        <input id="file" type="file" for="file" class="form-control" name="source"
        value="{{ old('source') ? old('source') : $artical->picture }}"
        >
    </div>

    <div class="form-group">
        <label>Text area</label>
        <textarea class="form-control" name="Artical[articalcontent]" rows="3">{{ old('Artical')['articalcontent'] ? old('Artical')['articalcontent'] : $artical->articalcontent }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Button</button>
</form>