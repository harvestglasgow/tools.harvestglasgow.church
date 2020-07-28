<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TradesmanTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_tradesman()
    {
//        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $attributes = [
            'name' => 'ABC Builders',
            'description' => 'Bacon ipsum dolor sit amet rump turkey spare ribs shank, hamburger boudin frankfurter ham hock pancetta salami. Jerky porchetta salami, fatback swine chicken pastrami beef ribs landjaeger biltong.',
            'phone' => '07766494949',
            'email' => 'hello@digitalevangelist.net'
        ];

        $this->post('tradesmen', $attributes);

        $this->assertDatabaseHas('tradesmen', $attributes);
    }
}
