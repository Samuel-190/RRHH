<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::create([
            'name' => 'gestor_rrhh',
            'guard_name' => 'web',
        ]);
    }

    /** @test */
    public function crear_colaborador() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $response = $this->actingAs($user)->post('/collaborators', [
            'first_name'      => 'Juan',
            'last_name'       => 'Perez',
            'document_type'   => 'CC',
            'document_number' => '123456789',
            'birth_date'      => '1990-01-01',
            'email'           => 'juan@test.com',
            'phone_number'    => '555-1234',
            'address'         => 'Calle Falsa 123',
        ]);

        // 5️⃣ Assert
        $response->assertStatus(201);

        $this->assertDatabaseHas('collaborators', [
            'document_number' => '123456789',
        ]);
    }

    /** @test */
    public function no_crear_colaborador_con_documento_duplicado() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user)->post('/collaborators', [
            'first_name'      => 'Juan',
            'last_name'       => 'Perez',
            'document_type'   => 'CC',
            'document_number' => '123456789',
            'birth_date'      => '1990-01-01',
            'email'           => 'juan@test.com',
            'phone_number'    => '555-1234',
            'address'         => 'Calle Falsa 123',
        ])->assertStatus(201);

        $response = $this->actingAs($user)->post('/collaborators', [
            'first_name'      => 'Carlos',
            'last_name'       => 'Lopez',
            'document_type'   => 'CC',
            'document_number' => '123456789', // ❌ duplicado
            'birth_date'      => '1995-05-10',
            'email'           => 'carlos@test.com',
            'phone_number'    => '555-9999',
            'address'         => 'Otra dirección',
       ]);

       $response->assertRedirect();
       $response->assertSessionHasErrors('document_number');

       $this->assertDatabaseCount('collaborators', 1);
    }

    /** @test */
    public function actualizar_un_colaborador_existente() {
        
        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user)->post('/collaborators', [
            'first_name'      => 'Juan Carlos',
            'last_name'       => 'Perez',
            'document_type'   => 'CC',
            'document_number' => '123456789',
            'birth_date'      => '1990-01-01',
            'email'           => 'juan@test.com',
            'phone_number'    => '555-1234',
            'address'         => 'Calle Falsa 123',
        ]);

        $collaborator = \App\Models\Collaborator::first();

        $response = $this->actingAs($user)->put(
            "/collaborators/{$collaborator->id}",
            [
                'first_name'      => 'Juan Carlos',
                'last_name'       => 'Perez',
                'document_type'   => 'CC',
                'document_number' => '123456789',
                'birth_date'      => '1990-01-01',
                'email'           => 'juan_actualizado@test.com',
                'phone_number'    => '555-9999',
                'address'         => 'Nueva dirección 456',
            ]
        );

        $response->assertRedirect();

        $this->assertDatabaseHas('collaborators', [
            'id'          => $collaborator->id,
            'email'       => 'juan_actualizado@test.com',
            'phone_number'=> '555-9999',
        ]);
    }

    /** @test */
    public function obtener_listado_de_colaboradores() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

       \App\Models\Collaborator::factory()->count(4)->create();

       $response = $this->actingAs($user)->getJson('/collaborators');

       $response->assertStatus(200);
       $response->assertJsonCount(4);
    }

    /** @test */
    public function eliminar_un_colaborador() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $collaborator = \App\Models\Collaborator::factory()->create();

        $response = $this->actingAs($user)->deleteJson("/collaborators/{$collaborator->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('collaborators', [
            'id' => $collaborator->id,
        ]);
    }
}