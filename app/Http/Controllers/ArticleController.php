<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // 入力ボックスに入力された値が存在するかを判定
        if (isset($request->username)) {

            // 入力ボックスに入力がある場合の処理
            // Zennで記事一覧を取得して$resp変数へ代入
            $resp = Http::get('https://zenn.dev/api/articles?username='.$request->username.'&order=latest');

            // 取得した記事をJson形式に変換して$resp変数に代入
            $resp = $resp->json();

            // 取得した記事の'article'オブジェクトを$articles変数に代入
            $articles = $resp['articles'];
            // dd($articles);

            // Zennで記事一覧を取得して$resp変数へ代入
            $resp = Http::get('https://zenn.dev/api/scraps?username='.$request->username.'&order=latest');

            // 取得した記事をJson形式に変換して$resp変数に代入
            $resp = $resp->json();

            // 取得した記事の'scrap'オブジェクトを$scraps変数に代入
            $scraps = $resp['scraps'];
            // dd($scraps);

            // 変数をそのままの名前でtopビューへ渡して表示
            return view('top', ['articles' => $articles, 'scraps' => $scraps]);

        } else {

            // 入力ボックスに入力がない場合の処理
            // topビューを表示
            return view('top');

        };
    }
}
