<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function guest_cannot_create_projects()
    {
        $attributes = Project::factory()->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');
    }

    /**
     * @test
     */
    public function guest_cannot_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    /**
     * @test
     */
    public function guest_cannot_view_a_single_project()
    {
        $project = Project::factory()->create();

        $this->get($project->path())->assertRedirect('login');
    }

    /**
     * @test
     */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect();

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /**
     * @test
     */
    public function a_user_can_view_their_project()
    {
        $this->withoutExceptionHandling();

        $this->be(User::factory()->create());

        $project = Project::factory()->create(['user_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /**
     * @test
     */
    public function an_authenticated_user_cannot_view_the_project_of_thers()
    {
        $this->be(User::factory()->create());

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    /**
     * @test
     */
    public function a_project_requires_a_title()
    {
        $this->actingAs(User::factory()->create());

        $attributes = Project::factory()->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    public function a_project_requires_a_description()
    {
        $this->actingAs(User::factory()->create());

        $attributes = Project::factory()->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}
