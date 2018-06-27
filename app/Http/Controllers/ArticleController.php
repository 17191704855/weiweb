<?php

namespace App\Http\Controllers;

use App\ArticleModel;
use App\TKLModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(Request $request){
        $page=empty($request->page)?1:$request->page;
        $page_size=config('default.page_size');
        $article_list=ArticleModel::getRecordListCondition([],['*'],['id'=>'desc'],$page,$page_size);
        $count=ArticleModel::getRecordCountCondition([]);
        $page_count=round($count/$page_size);
        return view('welcome',[
            'article_list'=>$article_list,
            'page'=>$page,
            'page_count'=>$page_count,
        ]);
    }

    public function read(Request $request){
        $article=ArticleModel::find($request->id);
        return view('read',[
            'article'=>$article,
        ]);
    }

    public function tkl(Request $request){
        $tkl=TKLModel::where(['itemId'=>$request->itemId])->first();
        dd($tkl);
    }
}
