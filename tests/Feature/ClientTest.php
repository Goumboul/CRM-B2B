<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ClientTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_see_clients_page(): void
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('/clients')
            ->assertOk()
            ->assertSee('Clients');
    }

    #[Test]
    public function authenticated_user_can_create_a_client(): void
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->post('/clients', [
                'name' => 'Client Test',
                'company' => 'Test Corp',
                'email' => 'test@client.com',
                'phone' => '0102030405',
            ])
            ->assertRedirect('/clients');

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Test',
            'user_id' => $user->id,
        ]);
    }

    #[Test]
    public function guest_cannot_access_clients(): void
    {
        $this->get('/clients')->assertRedirect('/login');
    }
}
