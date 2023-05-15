<?php

namespace Tests\Feature\API\V1;

use App\Enums\Role;
use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_property_owner_can_add_property()
    {
        $owner = User::factory()->create()->assignRole(Role::ROLE_OWNER);
        $response = $this->actingAs($owner)->postJson('/api/v1/owner/properties', [
            'name' =>  'Owner property',
            'city_id' => City::value('id'),
            'address_street' => 'Street Address 1',
            'address_postcode' => '12345'
        ]);

        $response->assertSuccessful();
        $response->assertJsonFragment(['name' => 'Owner property']);
    }

    public function test_property_owner_has_access_to_properties_feature()
    {
        $owner = User::factory()->create()->assignRole(Role::ROLE_OWNER);
        $response = $this->actingAs($owner)->getJson('/api/v1/owner/properties');

        $response->assertStatus(200);
    }

    public function test_user_does_not_have_access_to_properties_feature()
    {
        $user = User::factory()->create()->assignRole(Role::ROLE_USER);
        $response = $this->actingAs($user)->getJson('/api/v1/owner/properties');

        $response->assertStatus(403);
    }
}
