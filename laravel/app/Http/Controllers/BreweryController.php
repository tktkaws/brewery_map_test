<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreweryController extends Controller
{
        //==========ここから追加==========
        public function index()
        {
            // ダミーデータ
            $breweries = [
                (object) [
                    'id' => 1,
                    'title' => 'タイトル1',
                    'body' => '本文1',
                    'created_at' => now(),
                    'user' => (object) [
                        'id' => 1,
                        'name' => 'ユーザー名1',
                    ],
                ],
                (object) [
                    'id' => 2,
                    'title' => 'タイトル2',
                    'body' => '本文2',
                    'created_at' => now(),
                    'user' => (object) [
                        'id' => 2,
                        'name' => 'ユーザー名2',
                    ],
                ],
                (object) [
                    'id' => 3,
                    'title' => 'タイトル3',
                    'body' => '本文3',
                    'created_at' => now(),
                    'user' => (object) [
                        'id' => 3,
                        'name' => 'ユーザー名3',
                    ],
                ],
            ];

            return view('breweries.index', ['breweries' => $breweries]);
        }
        //==========ここまで追加==========
}
