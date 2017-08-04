<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create(['user_id'=>1, 'title'=>'Title1', 'img'=>'img1.jpg', 'content'=>'content1']);
        News::create(['user_id'=>2, 'title'=>'Title2', 'img'=>'img2.jpg', 'content'=>'content2']);
        News::create(['user_id'=>3, 'title'=>'Title3', 'img'=>'img3.jpg', 'content'=>'content3']);
        News::create(['user_id'=>2, 'title'=>'Title4', 'img'=>'img4.jpg', 'content'=>'content4']);
        News::create(['user_id'=>3, 'title'=>'Title5', 'img'=>'img5.jpg', 'content'=>'content5']);
        News::create(['user_id'=>4, 'title'=>'Title6', 'img'=>'img6.jpg', 'content'=>'content6']);
    }
}
