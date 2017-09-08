<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
//    public function test1()
//    {
////        $select = DB::select('select * from student');
//
//
////        $bool = DB::insert('insert into student(id,age,sex) values (?,?,?)',[1,18,'lishanlei']);
////        var_dump($bool);
//
//
////        $num=DB::update('update student set age=? where name=?',[20,'lishanlei']);
////        var_dump($num);
//
////        $student = DB::select('select * from student');
////        dd($student);
//
////        $num = DB::delete('delete from student where id>?',[0]);
////        var_dump($num);
//    }
//
//
//    public function query1() {
////        $num = DB::table('student')->insert(
////            ['name'=>'imooc','age'=>18]
////        );
////        var_dump($num);
//
////        $id = DB::table('student')->insertGetId(
////            ['name'=>'sean','age'=>18]
////        );
////        var_dump($id);
//
//
//
//        //插入多条数据
////        $bool = DB::table('student')->insert([
////            ['name'=>'name1','age'=>20],
////            ['name'=>'name2','age'=>18],
////        ]);
////        var_dump($bool);
//    }
//
//
//    public function query2() {
////       $num =  DB::table('student')
////            ->where('id',15)
////            ->update(
////                ['age'=>30]
////            );
////        var_dump($num);
//
//
//
//        //自增
////        $num = DB::table('student')->increment('age',3);//默认自增1,increment()中第二个参数为自增数
////        var_dump($num);
//
//        //自减
////        $num2 = DB::table('student')
////            ->where('id',15)
////            ->decrement('age');
////        var_dump($num2);
//
//
//
//        //在自增或者自减时修改字段
////        $num2 = DB::table('student')
////            ->where('id',15)
////            ->decrement('age',3,['name'=>'张开']);
//    }
//
//
//
//    public function query3() {
////        $num = DB::table('student')
////            ->where('id',12)
////            ->delete();
////        var_dump($num);
//
//
//        //根据条件删除
////        $num = DB::table('student')
////            ->where('id','>=',12)
////            ->delete();
////        var_dump($num);
//
//        //清空数据表
////        DB::table('student')->truncate();
//    }
//
//
//    /**
//     * 使用查询构造器查询数据
//     */
//    public function query4() {
//
//
//        //get()
////        $student = DB::table('student')->get();
////        dd($student);
//
//
//
//        //first()
////        $student = DB::table('student')
////            ->orderBy('id','desc') //进行倒序排序
////            ->first();
////        dd($student);
//
//
//        //where
////        $student = DB::table('student')
////            ->where('id','>=',1002)
////            ->get();
////        dd($student);
//
//
//        //为where加多个条件
////        $student = DB::table('student')
////            ->whereRaw('id>=? and age>=?',[1002,18])
////            ->get();
////        dd($student);
//
//
//        //pluck  返回结果集中指定的字段
//       // $student = DB::table('student')
//       //     ->pluck('name');
//
//
//
//        //lists 作用和pluck一样  但可以指定某个键作为下标
//       // $student = DB::table('student')
//       //  ->lists('id','age');
//       // dd($student);
//
//
//        //select  查询指定字段
////        $names = DB::table('student')
////            ->select('id','age')
////            ->get();
////        dd($names);
//
//
//        //chunk   分段从数据库中查询数据
//       echo '<pre>';
//       DB::table('student')
//           ->orderBy('id','desc')
//           ->chunk(2,function ($students) {
//           var_dump($students);
//               if(你的条件) {
//                   return false;//在某个指定的条件下让语句停止：return false
//               }
//
//       });
//
//
//    }
//
//
//    /**
//     * 查询构造器中的聚合函数
//     */
//    public function query5() {
//
//        //count  统计表的记录数
////        $num = DB::table('student')-count();
//
//
////        //max   min
////        $max = DB::table('student')->max('age');
////        $min = DB::table('student')->min('age');
////        var_dump($max);
//
//        //avg 平均数
////        $avg = DB::table('student')->avg('age');
////        var_dump($avg);
//    }
//
//
//    /**
//     * Eloquent ORM
//     */
//    public function orm1() {
//
//        //all() 返回值为集合  查询表
////        $students = Student::all();  //是App下的Student
////        dd($students);
//
//        //find 根据主键查询
////        $students = Student::find(1001);//返回一个模型对象查询结果
////        var_dump($students);
//
//
//        //findOrFail 根据主键查找，若未找到抛出异常
////        $students = Student::findOrFail(1002);
////        var_dump($students);
//
//
//
//
//
//
//
//        //查询构造器在Eloquent ORM中的使用
////        $students = Student::get();
//
////        $students = Student::where('id','>',1001)->orderBy('age','desc')->first();
////        dd($students);
//
////        echo '<pre>';
////        Student::chunk(2,function ($student) {
////            var_dump($student);
////        });
//
//
//        //聚合函数
////        Student::count();
////        Student::where('id','>',1001)->max('age');
//    }
//
//
//    /**
//     * ORM中的新增，自定义时间戳及批量赋值
//     */
//    public function orm2() {
//
//
//        //使用模型新增数据
////        $student = new Student();
////        $student->id = 1004;
////        $student->name = 'sean';
////        $student->age = 30;
//////        $student->sex = '男';
////        $bool = $student->save(); //保存数据
////        var_dump($bool);
//
//
////        $student = Student::find(1004);
////        echo date('Y-m-d H:i:s',$student->created_at);
////        echo $student->created_at;
//
//
//
//        //使用模型的Create方法新增数据
////        $student = Student::create(
////            ['name'=>'imooc','age'=>18]
////        );
////        dd($student);
//
//
//        //firstOrCreate()  以属性查找用户，若没有则新增并取得新的实例
////        $student = Student::firstOrCreate(
////            ['name'=>'aaa']
////        );
////        dd($student);
//
//
//
//        //firstOrNew() 以属性查找用户，若没有则建立新的实例，若要保存则自己调用save()
////        $student = Student::firstOrNew(
////            ['name'=>'bbb']
////        );
////        $bool = $student->save();
////        var_dump($bool);
//
//    }
//
//
//    /**
//     * 使用Eloquent ORM 修改数据
//     */
//    public function orm3() {
//
//
//        //通过模型更新数据
////        $student = Student::find(1004);
////        $student->name = '李静';
////        $bool = $student->save(); //还会自动维护时间戳
////        var_dump($bool);
//
//
//        //结合查询语句批量更新
//        $num = Student::where('id','>',1002)->update(
//            ['age'=>41]
//        );
//        var_dump($num);
//    }
//
//
//
//
//    /**
//     * 使用Eloquent ORM 删除数据
//     */
//    public function orm4() {
//
//
//        //通过模型删除
////        $stduent = Student::find(1001);
////        $bool = $stduent->delete();
////        var_dump($bool);
//
//
//        //通过主键删除
////        $num = Student::destroy(1002); //可以删除多个，方法的参数可以是多个主键，也可以是一个数组
////        var_dump($num);
//
//
////        $num = Student::where('id','>',1002)->delete();
////        var_dump($num);
//    }
//
//
//    public function section1() {
//
//        $name = 'sean';
//        $student = Student::get();
//        return view('student.section1',[
//            'name'=>$name,
//            'students'=>$student
//        ]);
//    }
//
//
//
//
//    public function urlTest() {
//
//        return 'urlTest';
//    }
//
//
//    /**
//     * Controller  Request
//     * @param Request $request
//     */
//    public function request1(Request $request) {
//
//        //1,取值
////        echo $request->input('name');
////        echo $request->input('sex','未知');  //默认的值
//
////        if($request->has('name')) {  //判断有无参数
////            echo $request->input('name');
////        }else {
////            echo '无参数';
////        }
//
//        //获得url中所有的参数
////        $a = $request->all();
////        dd($a);
//
//
//
//
//
//        //判断请求的类型
////        echo $request->method();
////
//
////        if($request->isMethod('GET'))
////            echo 'yes';
////        else
////            echo 'no';
//
//
////        $a = $request->ajax();  //判断请求是否为ajax请求
////        var_dump($a);
//
//
//        //判断请求的路径是否符合特定格式
////        $res = $request->is('student/*');
////        var_dump($res);
//
//
//        //获得当前url
////       echo  $request->url();
//
//    }
//
//
//    /**
//     * Controller  Session
//     */
//    public function session1(Request $request) {
//
//        //1,HTTP request session()
////        $request->session()->put('key1','vaule1'); //向session中存放数据
////        echo $request->session()->get('key1');    //从session中取出数据
//
//
//
//        //2，sesison()
////        session()->put('key2','value2');
////        echo session()->get('key2');
//
//
//
//
//        //3,Session 类
//
////        //存储数据到Session
////        Session::put('key3','value3');
////
////        //获取Session值
////        echo Session::get('key3');
////
////        //不存在则取默认值
////        echo Session::get('key4','default');
//
//
//        //以数组的形式存储数据
////        Session::put(['key4'=>'value4']);
////        echo Session::get('key4','default');
//
//
//
//        //把数据放到Session的数组中
////        Session::push('student','sean');
////        Session::push('student','imooc');
////        $rec = Session::get('student','default');
////        var_dump($rec);
//
//        //从Session中取出数据，取完后删除
////        $rec = Session::pull('student','default');
////        var_dump($rec);
//
//        //获取所有的值
////        $rec = Session::all();
////        dd($rec);
//
//
//        //判断Session中某个key是否存在
////        if(Session::has('key1')) {
////            echo 'cunzai';
////        }else{
////            echo 'no cunzai';
////        }
//
//
//
//        //暂存数据
////        Session::flash('key-flash','val-flash');
////        echo Session::get('key-flash');
//
//
//
//    }
//
//    public function session2(Request $request) {
//
//
////        return Session::get('message','暂无信息');
////        return 'session2';
//
//
//
//        //删除Session中指定key
////        Session::forget('key1');
////        $rec = Session::all();
////        dd($rec);
//
//
//        //清空Session中所有信息
////        Session::flush();
////        $rec = Session::all();
////        dd($rec);
//
//    }
//
//
//    /**
//     * Controller  Response  就是响应
//     */
//    public function response() {
//
//        //响应json
////        $data = [
////            'errCode'=>0,
////            'errMsg'=>'success',
////            'data'=>'sean'
////        ];
////        return response()->json($data);
//
//
//
//        //4,重定向
////        return redirect('session2');
//
////        return redirect('session2')->with('message','我是你好');
//
//        //action()
////        return redirect()->action('StudentController@session2')->with('message','我是你好啊');
//
//        //route()
////        return redirect()->route('session2')->with('message','我是你好啊');
//
////        return redirect()->back();
//    }
//
//
//
//
////    //活动的宣传页面
////    public function activity0() {
////
////
////        return '活动快要开始，请期待';
////    }
////
////    public function activity1() {
////        return '活动进行中1';
////    }
////    public function activity2() {
////        return '活动进行中2';
////    }



    public function upload() {

        return 'upload';
    }




}