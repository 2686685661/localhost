<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    {{--laravel默认开启csrf验证，post请求需要验证csrf，所以要在表单里加个隐藏域--}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="Student[name]" class="form-control" id="name" placeholder="请输入学生姓名" value="{{ old('Student')['name'] ? old('Student')['name'] : $student->name }}">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.name') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>

        <div class="col-sm-5">
            <input type="text" name="Student[age]" class="form-control" id="age" placeholder="请输入学生年龄" value="{{ old('Student')['age'] ? old('Student')['age'] : $student->age }}">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.age') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>

        <div class="col-sm-5">
            @foreach($student->getsex() as $ind=>$val)
                <label class="radio-inline">
                    <input type="radio" name="Student[sex]"
                           {{ isset($student->sex) && $student->sex == $ind ? 'checked' : '' }}
                           value="{{ $ind }}"> {{ $val }}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.sex') }}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>