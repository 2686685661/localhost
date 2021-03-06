<?php

namespace App\Http\Controllers;

use App\MyModel\Artiment;
use App\MyModel\database;
use App\MyModel\Message;
use Illuminate\Support\Facades\DB;
use Validator;
use App\MyModel\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class articalController extends Controller
{

    const NOT_DISPLAY = 0;

    public static $string = '';

    public static $aaa=[];

    public static  $Arr = [];


    public function __construct()
    {

        parent::__construct();

        DB::beginTransaction(); //开启事务

    }


    public function articalview()
    {

//        $a = new Artical;
//        $articals = $a->select_array([
//            'where',
//            'paginate'
//        ],[
//            "display,=,1",
//            5
//        ]);
//        dd($articals);

        $artical = Artical::where('display', '=', 1)->paginate(5);

        return parent::_view('artical.list', [
            'articals' => $artical
        ]);

    }


    public function newartical(Request $request)
    {

        $artical = new Artical();

        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->input(), [

                'Artical.headline' => 'required|min:1|max:15',

                'Artical.publishperson' => 'required|min:1|max:6',

                'Artical.articalcontent' => 'required|min:2',

            ], [

                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',

            ], [

                'Artical.headline' => '文章标题',

                'Artical.publishperson' => '发表人',

                'Artical.articalcontent' => '文章内容'

            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();

            }

            $file = $request->file('source');

            if(count($file)<1) {
                 return redirect()->back()->with('error','文章封面未选取');
            }

            if(!in_array($file->getClientOriginalExtension(),['jpg','png','image','jpeg'])) {
                return redirect()->back()->with('error','文章封面类型错误。请重新核实！');
            }

            $fileture = $this->upload($file);

            if ($fileture) {

                $data = $request->input('Artical');

                $data['picture'] = $fileture;

                if (Artical::create($data)) {

                    DB::commit();  //提交

                    return redirect('artical/list')->with('success', '添加成功');

                }else {

                    DB::rollback();  //回滚

                    return redirect()->back();

                }
            }
        }

        return parent::_view('artical.newartical', [

            'artical' => $artical

        ]);

    }


    public function upload($file)
    {

        if ($file->isValid()) {

            $originaName = $file->getClientOriginalName();  //获取文件的原名

            $ext = $file->getClientOriginalExtension(); //获取文件的扩展名

            $type = $file->getClientMimeType();            //文件的类型

            $realpath = $file->getRealPath();          //临时文件的绝对路径

            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;  //起的文件名

            Storage::disk('upload')->put($filename, file_get_contents($realpath));

            return $filename;

        }

        return false;

    }


    public function updateartical(Request $request)
    {

        $artical = Artical::find( $request->get('id'));

        if ($request->isMethod('POST')) {

            $this->validate($request, [

                'Artical.headline' => 'required|min:1|max:15',

                'Artical.publishperson' => 'required|min:1|max:6',

                'Artical.articalcontent' => 'required|min:2',

            ], [

                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',

            ], [

                'Artical.headline' => '文章标题',

                'Artical.publishperson' => '发表人',

                'Artical.articalcontent' => '文章内容'

            ]);

            $file = $request->file('source');



//            if(!in_array($file->getClientOriginalExtension(),['png','jpg','jpeg'])) {
//                return redirect()->back()->with('error','文章封面类型错误。请重新核实！');
//            }

            $data = $request->input('Artical');

            if(count($file)>0) {

                if(!in_array($file->getClientOriginalExtension(),['png','jpg','jpeg'])) {
                    return redirect()->back()->with('error','文章封面类型错误。请重新核实！');
                }

                $fileture = $this->upload($file);
                if($fileture) {
                    $data['picture'] = $fileture;
                    $artical->picture = $data['picture'];
                }
            }

            $artical->headline = $data['headline'];

            $artical->publishperson = $data['publishperson'];

            $artical->articalcontent = $data['articalcontent'];

            if ($artical->save()) {

                DB::commit();  //提交

                return redirect('artical/list')->with('success', '修改成功-' .  $request->get('id'));

            }else {

                DB::rollback();  //回滚

                return redirect('artical/list')->with('error', '修改失败-' .  $request->get('id'));

            }
        }

        return parent::_view('artical.updateartical', [

            'artical' => $artical

        ]);

    }


    public function deleteartical($id)
    {

        $artical = Artical::find($id);

        $artical->display = articalController::NOT_DISPLAY;

        if ($artical->save()) {

            DB::commit();  //提交

            return redirect('artical/list')->with('success', '删除成功-' . $id);

        } else {

            DB::rollback();  //回滚

            return redirect('artical/list')->with('error', '删除失败');

        }
    }


    public function frarticalview()
    {

        $artical = Artical::where('display', '=', 1)

            ->orderBy('created_at', 'desc')

            ->paginate(2);

        $hotartical = Artical::where('display', '=', 1)
            ->orderBy('readnumber', 'desc')

            ->take(5)

            ->get();

        $hotmessage = Message::where('display', '=', 1)

            ->orderBy('created_at', 'desc')

            ->take(7)

            ->get();

        return parent::_view('artical.frontArtical', [

            'articals' => $artical,

            'hotArtical' => $hotartical,

            'hotmessage' => $hotmessage

        ]);

    }


    public function selectReply($replyId, $ments,$artical,$topment)
    {
        $index = 0;

        foreach ($ments as $ment) {
            $index++;

            if ($ment->comid == $replyId) {

                self::$Arr[$topment->comname.'/'.$index] = $ment;

                $this->selectReply($ment->id, $ments,$artical,$ment);

            }
        }

        return self::$Arr;

    }







    public function frarid(Request $request,$id=38){

        if($request->isMethod('POST')) {

            $thement = $request->input('Ment');

            $this->validate($request, [

                'Ment.comname' => 'required|min:1|max:6',

                'Ment.comemail' => 'required|min:1',

                'Ment.comtext' => 'required|min:1|max:160',

            ], [

                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',

            ], [

                'Ment.comname' => '姓名',

                'Ment.comemail' => '邮箱',

                'Ment.comtext' => '评论内容'

            ]);

            if(Artiment::create($thement)) {

                DB::commit();  //提交

                $cookie = $request->cookie('cookie');

                if($cookie) {

                    $cookiedelete = Cookie::forget('cookie');

                }

                Cookie::queue('cookie', $thement, 5);

                return redirect()->back();

            }else {

                DB::rollback();  //回滚

               return 0;

            }

        }

//        $articalment = '';
        $articalment = [];

        $artical = Artical::find($id);
//
//        if($artical == null || $artical->display==0) {
//           return redirect()->back();
//        }


        $artiment = $artical->comments()

            ->orderBy('created_at','desc')

            ->get();


        foreach ($artiment as $ment) {

            if ($ment->comid == 0) {

                self::$Arr[] = $ment;

                $articalment = $this->selectReply($ment->id, $artiment,$artical,$ment);

            }

        }



        $artyCookie = $request->cookie('artyIdUrl');

        if($artyCookie) {
            if(Cookie::get('artyIdUrl') != $_SERVER['REDIRECT_URL']) {
                $artical->readnumber += 1;
                $artical->save();
                DB::commit();  //提交
                Cookie::queue('artyIdUrl', $_SERVER['REDIRECT_URL'], 5);
            }
        }else {
            $artical->readnumber += 1;
            $artical->save();
            DB::commit();  //提交
            Cookie::queue('artyIdUrl', $_SERVER['REDIRECT_URL'], 5);
        }


        $hotartical = Artical::where('display', '=', 1)

            ->orderBy('readnumber', 'desc')

            ->take(5)

            ->get();

        $hotmessage = Message::where('display', '=', 1)

            ->orderBy('created_at', 'desc')

            ->take(7)

            ->get();



        return parent::_view('artical.frontarid', [

            'artical' => $artical,

            'hotArtical' => $hotartical,

            'hotmessage' => $hotmessage,

            'artiments' => $articalment

        ]);

    }

}