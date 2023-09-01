<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 2000; $i++) {
            $content = [];
            $content_items = ['h', 'p', 'p', 'p', 'h', 'i', 'p', 'h', 'p', 'p', 'p',];

            foreach ($content_items as $value) {
                if ($value == 'p') {
                    $item = "<p>" . '' . fake()->sentence(40) . '' . "</>";
                    array_push($content, $item);
                } else if ($value == 'h') {
                    $item = "<h1>" . '' . fake()->sentence(5) . '' . "</h1>";
                    array_push($content, $item);
                } else if ($value == 'i') {
                    $img_url = "http://localhost:8000/assets/img/post-bg.jpg";

                    $item = "<img src=" . '"' . $img_url . '"' . ">";
                    array_push($content, $item);
                }
            }
            $content = implode($content);


            \App\Models\Blog::factory()->create([
                'title' => fake()->sentence(),
                'sub_title' => fake()->sentence(),
                'tags' => implode(';', fake()->words(5)),
                'header_img' => 'assets/img/post-bg.jpg',
                'content' => $content,
            ]);
        }
    }
}
