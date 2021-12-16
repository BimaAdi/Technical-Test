<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_access_home_page_without_credentials()
    {
        // Given
        /**
         * User not login
         */

        // When
        $response = $this->get('/');

        // Expect
        /**
         * redirect
         */
        $response->assertStatus(302);

    }

    public function test_access_peserta_page_without_credentials()
    {
        // Given
        /**
         * User not login
         */

        // When
        $response = $this->get('/peserta');

        // Expect
        /**
         * redirect
         */
        $response->assertStatus(302);

    }

    public function test_access_peserta_page_with_credentials()
    {
        // Given
        /**
         * User login
         */
        $user = User::factory()->create();

        // When
        $response = $this->actingAs($user)->get('/peserta');
        

        // Expect
        /**
         * 200
         */
        $response->assertStatus(200);
    }
}
