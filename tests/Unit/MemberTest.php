<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Member;
use Faker\Factory;

class MemberTest extends TestCase
{


    public function test_can_create_member() {

    	$faker = Factory::create();

        $data = [
            'event_id' => 1,
            'first_name' => $faker->name,
            'surname' => $faker->name,
            'email' => $faker->unique()->safeEmail,
        ];

        $this->post(route('members.store'), $data)->assertStatus(201);
    }

    public function test_can_show_member() {

        $member = factory(Member::class)->create();

        $this->get(route('members.show', $member->id))
            ->assertStatus(200);
    }

}
