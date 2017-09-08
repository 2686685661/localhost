<?php

namespace App\Http\Controllers;

use Validator;
use App\MyModel\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class articalController extends Controller
{


    public function articalview() {


        $artical = Artical::paginate(5);

        return view('artical.list',[
            'articals' => $artical
        ]);
    }


    public function newartical(Request $request) {

        $artical = new Artical();

        if($request->isMethod('POST')) {

            $validator = Validator::make($request->input(),[
                'Artical.headline' => 'required|min:1|max:15',
                'Artical.publishperson' => 'required|min:1|max:6',
                'Artical.articalcontent' => 'required|min:2',
            ],[
                'required'=>':attribute 不能为空',
                'min'=>':attribute 长度低于要求',
                'max'=>':attribute 长度高于要求',
            ],[
                'Artical.headline' => '文章标题',
                'Artical.publishperson' => '发表人',
                'Artical.articalcontent' => '文章内容'
            ]);

            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput() ;
            }


            $file = $request->file('source');

            $fileture = $this->upload($file);

            if($fileture) {
                $data = $request->input('Artical');
                $data['picture'] =$fileture;
                if(Artical::create($data)) {
                    return redirect('artical/list')->with('success','添加成功');
                }else {
                    return redirect()->back();
                }
            }

        }

        return view('artical.newartical',[
            'artical' => $artical
        ]);
    }


    public function upload($file) {

        if($file->isValid()) {

            $originaName = $file->getClientOriginalName();  //获取文件的原名
            $ext = $file->getClientOriginalExtension(); //获取文件的扩展名
            $type = $file->getClientMimeType();            //文件的类型

            $realpath = $file->getRealPath();          //临时文件的绝对路径

            $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;  //起的文件名
            Storage::disk('upload')->put($filename,file_get_contents($realpath));

            return $filename;
        }

        return false;

    }



    public function updateartical(Request $request,$id) {

        $artical = Artical::find($id);

        if($request->isMethod('POST')) {

            $this->validate($request,[
                'Artical.headline' => 'required|min:1|max:15',
                'Artical.publishperson' => 'required|min:1|max:6',
                'Artical.articalcontent' => 'required|min:2',
            ],[
                'required'=>':attribute 不能为空',
                'min'=>':attribute 长度低于要求',
                'max'=>':attribute 长度高于要求',
            ],[
                'Artical.headline' => '文章标题',
                'Artical.publishperson' => '发表人',
                'Artical.articalcontent' => '文章内容'
            ]);

            $file = $request->file('source');
            $fileture = $this->upload($file);

            if($fileture) {
                $data = $request->input('Artical');
                $data['picture'] = $fileture;

                $artical->headline = $data['headline'];
                $artical->publishperson = $data['publishperson'];
                $artical->articalcontent = $data['articalcontent'];

                if($artical->save()) {
                    return redirect('artical/list')->with('success','修改成功-'.$id);
                }
            }

        }

        return view('artical.updateartical',[
            'artical' => $artical
        ]);

    }

    public function deleteartical($id) {
        $artical = Artical::find($id);


        if($artical->delete()) {
            return redirect('artical/list')->with('success','删除成功-'.$id);
        }else {
            return redirect('artical/list')->with('error','删除失败');
        }
    }


}