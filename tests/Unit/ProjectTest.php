<?php

namespace Tests\Unit;

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
    public function it_has_a_path()
    {
        $project = Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    /**
     * @test
     */
    public function it_belongs_to_an_user()
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf(User::class, $project->user);
    }
}
