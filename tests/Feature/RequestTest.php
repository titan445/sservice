<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestTest extends TestCase
{
    use RefreshDatabase;
    
    public  function setUp(): void {
        $user =  factory(App\Models\User::class)->make(['id' => 1]);
        $admin =  factory(App\Models\User::class)->make(['id' => 2]);

        $request = factory(App\Models\Request::class,3)->make(['user_id' => 2,'admin_id' => 2]);

    }
    public function test_status()
    {
       
        $response = $this->get('/api/show_requests_list/2');

        $response->assertStatus(200);
    }
    public function test_count()
    {
       
        $response = $this->get('/api/show_requests_list/2');

        $response->assertJsonCount(3, 'id');
    }


}
