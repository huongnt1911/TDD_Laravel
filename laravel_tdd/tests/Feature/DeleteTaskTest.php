<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class DeleteTaskTest extends TestCase
{
    /** @test */
    public function authenticated_user_can_delete_task()
    {
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $response = $this->delete($this->getDeleteTaskRoute($task->id));
        $this->assertDatabaseMissing('tasks',$task->toArray());
        $response->assertRedirect($this->getListTaskRoute());
    }

    /** @test */
    public function unauthenticated_user_can_not_delete_task()
    {
        $task = Task::factory()->create();
        $response = $this->delete($this->getDeleteTaskRoute($task->id));
        $response->assertRedirect('/login');
    }

    public function getDeleteTaskRoute($id){
        return route('tasks.delete',$id);
    }

    public function getListTaskRoute(){
        return route('tasks.index');
    }
}
