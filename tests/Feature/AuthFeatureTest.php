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
     * Test that the homepage loads successfully 
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

    /**
     * Tests the guests can access the homepage without authentication
     */

    public function test_guest_can_access_homepage(): void{

        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /**
     * ensures login page loads successfully
     */

public function test_login_page_loads(): void 

{
    $response = $this->get('/login');
    $response->assertStatus(200);
}

/**
 * Ensure login fails with when incorrect credentials used
 */

public function test_user_cannot_login_with_invalid_credentials(): void
{
    $response = $this->post('/login', [
        'email' => 'wrong@example.com',
        'password'=> 'wrongpassword',

    ]);
    $response->assertSessionHasErrors();
}
}
