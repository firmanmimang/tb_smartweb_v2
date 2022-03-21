<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique recusandae in, temporibus magnam earum eius praesentium! Fugit quia unde dolorum, maiores minus incidunt? Deleniti veritatis aperiam quo nihil voluptatibus accusantium asperiores modi sequi, totam velit rem adipisci dignissimos numquam placeat praesentium magni consectetur sunt aliquam eaque corrupti sed? Quia, molestias?'
        ],
        [
            'title' => 'Judul Post Kedua',
            'slug' => 'judul-post-kedua',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique recusandae in, temporibus magnam earum eius praesentium! Fugit quia unde dolorum, maiores minus incidunt? Deleniti veritatis aperiam quo nihil voluptatibus accusantium asperiores modi sequi, totam velit rem adipisci dignissimos numquam placeat praesentium magni consectetur sunt aliquam eaque corrupti sed? Quia, molestias?'
        ]
    ];

    public static function all(){
        return collect(self::$blog_post);
    }

    public static function find($slug){
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p){
        //     if($p['slug'] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
