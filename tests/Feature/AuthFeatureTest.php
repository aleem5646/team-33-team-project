<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class AuthFeatureTest extends TestCase
{
    

    use RefreshDatabase;
    /**
     *  tests homepage loads succesfully
     */

    public function test_test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Tests authenticated users get redirected 
     * when they try to access secure routes.
     */

   

    public function test_authenticated_user_can_access_dashboard(): void 
    {
        $user = User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
           
            'email' => 'test@example.com',
            'hashed_password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }
}
