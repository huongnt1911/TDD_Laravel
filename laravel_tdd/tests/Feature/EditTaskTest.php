<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class EditTaskTest extends TestCase
{
    
    /** @test */
    public function authenticated_user_can_edit_task()
    {
        // $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $response=$this->put($this->getEditTaskRoute($task->id), $task->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $task->toArray());
        $response->assertRedirect(route('tasks.index'));
    }

    /** @test */
    public function unauthenticated_user_can_not_edit_task()
    {
        $task = Task::factory()->create();
        $response=$this->put($this->getEditTaskRoute($task->id), $task->toArray());
        $response->assertRedirect("/login");
    }

    /** @test */
    public function authenticated_user_can_not_edit_task_if_name_field_is_null()
    {
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $data=[
            'name'=>null,
            'content'=>$task->content
        ];
        $response=$this->put($this->getEditTaskRoute($task->id), $data);
        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function authenticated_user_can_view_edit_task_form(){
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $response = $this->get($this->getEditTaskView( $task->id));
        $response -> assertViewIs('tasks.edit'); 
    }

    public function getEditTaskRoute($id){
        return route('tasks.update',$id);
    }

    public function getEditTaskView($id){
        return route('tasks.edit', $id);
    }
}
