<?php
/**
 * Created by PhpStorm.
 * User: marvin
 * Date: 16/10/2017
 * Time: 1:36 AM
 */

namespace App\Http\Controllers;

use \App\Word;
use Illuminate\Support\Facades\DB;


class PagesController
{
    public function index()
    {

        $word = Word::where('word', 'like', 'poly%')->orderBy('frequent')->get();

        return view('pages.index', ['word' => $word]);
    }

    public function test()
    {

        $prefix = DB::table('data-prefix')->get();

        $all = [];
        $all[0] = 'dfgdfgdfdfgreee';

        foreach ($prefix as $row)
        {
            foreach (explode(',', $row->words) as $word)
            {
//                if (trim($word) == 'bisect')
//                {
//                    var_dump((($key = array_search('bicycle', $all)) !== false));exit;
//                    print_r($all);exit;
//                }

                if(($key = array_search(trim($word), $all)) !== false) {
                    $all[] = trim($word);
                }

            }
        }

        print_r($all);exit;


        $frequent = DB::table('words')->whereIn('word', $all)->orderBy('frequent')->get();
//
//        $frequent = DB::table('words')->whereIn('word', ['bisect'])->orderBy('frequent')->get();
//        print_r($frequent);exit;

        foreach ($frequent as $one)
        {

            if(($key = array_search($one->word, $all)) !== false) {
                unset($all[$key]);
            }
            //echo $one->word;echo '<br />';
            if ($one->word == 'bisect')
            {
                print_r($all);exit;
            }
        }

        print_r($all);exit;

        return view('pages.index', ['word' => $frequent]);
    }
}