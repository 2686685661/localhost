<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class ItemSearchController extends Controller
{

    /**
     * items列表
     */
    public function index(Request $request)
    {

//        Item::create(
//            ['title'=>'123'],
//            ['title'=>'456']
//        );


        if($request->has('titlesearch')){
            echo $request->has('titlesearch');
//            $items = Item::search($request->titlesearch)
//                ->paginate(6);
        }else{
            echo 'wu';
//            $items = Item::paginate(6);
        }
        return view('item-search',compact('items'));
    }


    /**
     * 创建新的item
     */
    public function create(Request $request)
    {


        $this->validate($request,['title'=>'required']);

        $items = Item::create($request->all());
        return back();
    }
}