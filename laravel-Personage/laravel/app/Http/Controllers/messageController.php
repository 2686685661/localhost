<?php

namespace App\Http\Controllers;

use App\MyModel\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function adoptview() {

//        Message::create(
//            ['email'=>'123'],
//            ['name'=>'sean','email'=>'456']
//
//        );

        $message = Message::where('adopt_id','=',0)->paginate(5);

        return view('message.adoptlist',[
            'messages' => $message
        ]);

    }

    public function messageview() {
        $message = Message::where('adopt_id','=',1)->paginate(5);

        return view('message.messagelist',[
            'messages' => $message
        ]);
    }


    public function isadopt(Request $request,$id=null) {

//        $data = $request->input('ID');
//
//        dd($data);

        $message = Message::find($id);


        $message->adopt_id = Message::ALREADY_ADOPT;

        if($message->save()) {
            return redirect('message/adoptlist')->with('success','已审核通过-'.$id);
        }
    }

    public function noadopt($id) {
        $message = Message::find($id);

        $message->adopt_id = Message::NO_ADOPT;
        if($message->save()) {
            return redirect('message/messagelist')->with('success','已取消审核'.$id);
        }

    }

    public function delete($id) {

        $message = Message::find($id);

        if($message->delete()) {
            return redirect('message/adoptlist')->with('success','删除成功-'.$id);
        }else {
            return redirect('message/adoptlist')->with('error','删除失败');
        }


    }
}