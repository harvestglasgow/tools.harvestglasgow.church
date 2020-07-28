<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToolTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_tool()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $attributes = [
            'name' => 'Drill',
            'description' => 'For drilling holes'
        ];

        $this->post('tools', $attributes);

        $this->assertDatabaseHas('tools', $attributes);
    }
}
