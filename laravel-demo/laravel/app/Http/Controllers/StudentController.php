<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;


class StudentController extends Controller
{

    //学生列表页
    public function index() {

        $students = Student::paginate(3);

        return view('student.index',[
            'students'=>$students
        ]);
    }

    //添加页面
    public function create(Request $request) {

        $student = new Student();

        if($request->isMethod('POST')) {


            //1,控制器验证
//             $this->validate($request,[
//                 'Student.name' => 'required|min:2|max:10',
//                 'Student.age' => 'required|integer',
//                 'Student.sex' => 'required|integer'
//             ],[
//                 'required'=>':attribute 为必填项',   //:attribute为换位符
//                 'min'=>':attribute 长度低于要求',
//                 'max'=>':attribute 长度高于要求',
//                 'integer'=>':attribute 必须为整数'
//             ],[
//                 'Student.name'=>'姓名',
//                 'Student.age'=>'年龄',
//                 'Student.sex'=>'性别'
//             ]);


            //2，Validator类验证
                $validator = Validator::make($request->input(),[
                 'Student.name' => 'required|min:2|max:10',
                 'Student.age' => 'required|integer',
                 'Student.sex' => 'required|integer'
             ],[
                 'required'=>':attribute 为必填项',   //:attribute为换位符
                 'min'=>':attribute 长度低于要求',
                 'max'=>':attribute 长度高于要求',
                 'integer'=>':attribute 必须为整数'
             ],[
                 'Student.name'=>'姓名',
                 'Student.age'=>'年龄',
                 'Student.sex'=>'性别'
             ]);

            if($validator->fails()) {                   //Validator实例创建后使用failes（）执行这个验证
//                withErrors 函数把 Validator 实例传递给 Redirect。这个函数将刷新 Session 中保存的错误消息，使得在下次请求中能够可用
                return redirect()->back()->withErrors($validator)->withInput() ;
            }


            $data = $request->input('Student'); //$data 为数组


            if(Student::create($data)) {      //使用create()方法时需要在Model中设置批量赋值
                return redirect('student/index')->with('success','添加成功');
            }else {
                return redirect()->back();
            }
        }

        return view('student.create',[
            'student' => $student
        ]);
    }

    // 保存添加
    public function save(Request $request) {

        $data = $request->input('Student');

        $student = new Student();

        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if($student->save()) {
            return redirect('student/index');
        }else {
            return redirect()->back();
        }

    }



    public function update( Request $request,$id) {

        $student = Student::find($id);

        if($request->isMethod('POST')) {


            $this->validate($request,[
                 'Student.name' => 'required|min:2|max:10',
                 'Student.age' => 'required|integer',
                 'Student.sex' => 'required|integer'
             ],[
                 'required'=>':attribute 为必填项',   //:attribute为换位符
                 'min'=>':attribute 长度低于要求',
                 'max'=>':attribute 长度高于要求',
                 'integer'=>':attribute 必须为整数'
             ],[
                 'Student.name'=>'姓名',
                 'Student.age'=>'年龄',
                 'Student.sex'=>'性别'
             ]);


            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];

            if($student->save()) {
                return redirect('student/index')->with('success','修改成功-'.$id);
            }

        }

        return view('student.update',[
            'student' => $student
        ]);
    }


    public function detail($id) {


        $student = Student::find($id);

        return view('student.detail',[
            'student' => $student
        ]);
    }


    public function delete($id) {

        $student = Student::find($id);

        if($student->delete()) {
            return redirect('student/index')->with('success','删除成功-'.$id);
        }else {
            return redirect('student/index')->with('error','删除失败');
        }
    }


    /**
     *   文件上传
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload(Request $request) {



        if($request->isMethod('POST')) {
            $file = $request->file('source');



            //文件是否上传成功
            if($file->isValid()) {
                $originaName = $file->getClientOriginalName();  //获取文件的原名
                $ext = $file->getClientOriginalExtension(); //获取文件的扩展名
                $type = $file->getClientMimeType();            //文件的类型

                $realpath = $file->getRealPath();          //临时文件的绝对路径

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //起的文件名


                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realpath));


                var_dump($bool);

            }
        }

        return view('upload.upload');
    }

    public function up() {

        return view('admin.upload.index');

    }


}