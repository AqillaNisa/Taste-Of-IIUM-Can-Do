<?php

namespace Tests\Feature;

use App\Models\Food;
use App\Models\Stall;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminModulesTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'is_admin' => true,
        ]);
    }

    public function test_admin_can_update_and_delete_user(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($this->admin)
            ->get(route('admin.users.edit', $user))
            ->assertOk()
            ->assertSee('Edit User');

        $this->actingAs($this->admin)
            ->put(route('admin.users.update', $user), [
                'name' => 'Updated User',
                'email' => 'updated@example.com',
                'is_admin' => '1',
            ])
            ->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'is_admin' => true,
        ]);

        $this->actingAs($this->admin)
            ->delete(route('admin.users.destroy', $user))
            ->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    public function test_admin_can_update_and_delete_stall_with_text_fields(): void
    {
        $stall = Stall::create([
            'name' => 'Old Stall',
            'mahallah' => 'Ali',
            'opening_hours' => '8 AM - 8 PM',
            'food_type' => 'Western',
            'menu_items' => 'Burger',
        ]);

        $this->actingAs($this->admin)
            ->get(route('admin.stalls.create'))
            ->assertOk()
            ->assertSee('placeholder="Ali, Faruq, Aminah..."', false)
            ->assertSee('placeholder="Western, Dessert, Beverages..."', false);

        $this->actingAs($this->admin)
            ->put(route('admin.stalls.update', $stall), [
                'name' => 'Updated Stall',
                'mahallah' => 'Custom Mahallah',
                'opening_hours' => '10 AM - 10 PM',
                'food_type' => 'Custom Category',
                'menu_items' => 'Rice, Tea',
            ])
            ->assertRedirect(route('admin.stalls.index'));

        $this->assertDatabaseHas('stalls', [
            'id' => $stall->id,
            'name' => 'Updated Stall',
            'mahallah' => 'Custom Mahallah',
            'food_type' => 'Custom Category',
        ]);

        $this->actingAs($this->admin)
            ->delete(route('admin.stalls.destroy', $stall))
            ->assertRedirect(route('admin.stalls.index'));

        $this->assertDatabaseMissing('stalls', [
            'id' => $stall->id,
        ]);
    }

    public function test_admin_can_update_and_delete_food_with_text_category(): void
    {
        $stall = Stall::create([
            'name' => 'Test Stall',
            'mahallah' => 'Ali',
            'opening_hours' => '8 AM - 8 PM',
            'food_type' => 'Western',
            'menu_items' => 'Burger',
        ]);

        $food = Food::create([
            'stall_id' => $stall->id,
            'name' => 'Old Food',
            'category' => 'Dessert',
            'price' => 4.50,
            'description' => 'Old description',
        ]);

        $this->actingAs($this->admin)
            ->get(route('admin.foods.create'))
            ->assertOk()
            ->assertSee('placeholder="Western, Dessert, Beverages..."', false);

        $this->actingAs($this->admin)
            ->put(route('admin.foods.update', $food), [
                'stall_id' => $stall->id,
                'name' => 'Updated Food',
                'category' => 'Custom Food Category',
                'price' => 9.90,
                'description' => 'Updated description',
            ])
            ->assertRedirect(route('admin.foods.index'));

        $this->assertDatabaseHas('foods', [
            'id' => $food->id,
            'name' => 'Updated Food',
            'category' => 'Custom Food Category',
            'price' => 9.90,
        ]);

        $this->actingAs($this->admin)
            ->delete(route('admin.foods.destroy', $food))
            ->assertRedirect(route('admin.foods.index'));

        $this->assertDatabaseMissing('foods', [
            'id' => $food->id,
        ]);
    }
}
