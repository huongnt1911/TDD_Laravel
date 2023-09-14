<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function search_tasks()
    {
        $task=Task::factory()->create();
        $response=$this->get(route('tasks.index'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertSee(['name']);
    }
}
