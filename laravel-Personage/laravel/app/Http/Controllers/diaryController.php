<?php

namespace App\Http\Controllers;

use Validator;
use App\MyModel\Diary;
use Illuminate\Http\Request;

class diaryController extends Controller
{

    public function diaryview() {

        $diary = Diary::paginate(5);

        return view('diary.list',[
            'diarys' => $diary
        ]);
    }



    public function newdiary(Request $request) {

        $diary = new Diary();

        if($request->isMethod('POST')) {

            $validator = Validator::make($request->input(),[
                'Diary.diaryContent' => 'required|min:5|max:50',
            ],[
                'required'=>':attribute 不能为空',
                'min'=>':attribute 长度低于要求',
                'max'=>':attribute 长度高于要求',
            ],[
                'Diary.diaryContent' => '日记内容',
            ]);

            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput() ;
            }

            $data = $request->input('Diary');
            if(Diary::create($data)) {
                return redirect('diary/list')->with('success','添加成功');
            }else {
                return redirect()->back();
            }

        }

        return view('diary.newDiary',[
            'diary' => $diary
        ]);
    }


    public function updatediary(Request $request,$id) {

        $diary = Diary::find($id);

        if($request->isMethod('POST')) {

            $this->validate($request,[
                'Diary.diaryContent' => 'required|min:5|max:50',
            ],[
                'required'=>':attribute 不能为空',
                'min'=>':attribute 长度低于要求',
                'max'=>':attribute 长度高于要求',
            ],[
                'Diary.diaryContent' => '日记内容',
            ]);

            $data = $request->input('Diary');
            $diary->diaryContent = $data['diaryContent'];

            if($diary->save()) {
                return redirect('diary/list')->with('success','修改成功-'.$id);
            }
        }

        return view('diary.update',[
            'diary' => $diary
        ]);
    }


    public function deletediary($id) {
        $diary = Diary::find($id);

        if($diary->delete()) {
            return redirect('diary/list')->with('success','删除成功-'.$id);
        }else {
            return redirect('diary/list')->with('error','删除失败');
        }

    }


}