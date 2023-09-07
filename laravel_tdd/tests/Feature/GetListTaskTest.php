<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class GetListTaskTest extends TestCase
{
    /** @test */
    public function users_can_get_all_task()
    {
        $task = Task::factory()->create();

        $response = $this->get('/tasks');

        $response->assertStatus(200);

        $response->assertViewIs('tasks.index');

        $response->assertSee($task->name);
    }
}
