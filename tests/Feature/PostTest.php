<?php

namespace Tests\Feature;

use App\Enums\PostStatusEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();
    }

    public function test_post_can_be_stored()
    {
        $data = [
            'title' => $this->faker->word,
            'content' => $this->faker->text(500),
            'status' => $this->faker->randomElement(PostStatusEnum::toValues()),
            'publish_date' => $this->faker->dateTimeBetween('+5 days', '+10 days')->format('Y-m-d H:i:s'),
        ];
        $this->postJson(route('posts.store'), $data)
            ->assertStatus(201);
        $this->assertDatabaseHas('posts', $data);
    }
}
