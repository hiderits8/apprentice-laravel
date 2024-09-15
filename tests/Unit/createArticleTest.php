<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_article(): void
    {
        $article = Article::factory()->make()->toArray();
        $response = $this->post(route('articles.store'), $article);

        $response->assertRedirect(route('index'));

        $this->assertDatabaseHas('articles', [
            'title' => $article['title'],
            'lead' => $article['lead'],
            'text' => $article['text'],
        ]);
    }
}
