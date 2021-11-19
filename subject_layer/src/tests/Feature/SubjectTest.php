<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_subject()
    {
        $data = [
            'name' => 'Subject 1',
            'repository' => 1
        ];

//        $response = $this->put(route('subject.store'), $data);

        $response = $this->get('/api/remote-users');
        $response->assertStatus(200);
    }
}
