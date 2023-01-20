<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $news_id = null): array
    {
        $news = [];
        $quantityNews = 10;

        if ($news_id === null) {
            for($i = 1; $i < $quantityNews; $i++)
            {
                $news[$i] = [
                    'news_id' => $i,
                    'news_title' => \fake()->jobTitle(),
                    'news_description' => \fake()->text(100),
                    'news_author' => \fake()->userName(),
                    'news_created_at' => \now()->format('d-m-Y H:i'),
                ];
            }

            return $news;
        }

        return [
            'news_id' => $news_id,
            'news_title' => \fake()->jobTitle(),
            'news_description' => \fake()->text(100),
            'news_author' => \fake()->userName(),
            'news_created_at' => \now()->format('d-m-Y H:i'),
        ];
    }

    public function getCategories(int $category_id = null): array
    {
        $categories = [];
        $quantityCategories = 10;

        if ($category_id === null) {
            for($i = 1; $i < $quantityCategories; $i++)
            {
                $categories[$i] = [
                    'category_id' => $i,
                    'category_title' => \fake()->jobTitle(),
                    'category_description' => \fake()->text(20),
                    'category_author' => \fake()->userName(),
                    'category_created_at' => \now()->format('d-m-Y H:i'),
                    'news_id' => \fake()->randomDigit(),
                ];
            }

            return $categories;
        }

        return [
            'category_id' => $category_id,
            'category_title' => \fake()->jobTitle(),
            'category_description' => \fake()->text(20),
            'category_author' => \fake()->userName(),
            'category_created_at' => \now()->format('d-m-Y H:i'),
            'news_id' => \fake()->randomDigit(),
        ];
    }
}
