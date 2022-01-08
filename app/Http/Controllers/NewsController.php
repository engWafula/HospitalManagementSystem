<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class NewsController extends Controller
{
 
    public function index()
    {
      $news=Http::get("https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=7004879ac1304fdcb6721b097f9e7171");

        return view('news',['news'=>json_decode($news)]);
        

    }

}
