<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Collaborator;
use App\Models\User;
use Tests\TestCase;

class ContractTest extends TestCase {

    use RefreshDatabase;

    protected function setUp(): void {

        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);

    }

    /** @test */
    public function crear_un_contrato_asociado_a_un_colaborador_existente() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $response = $this->post('/contracts', [
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Desarrollador',
            'salary' => 3000,
            'status' => 'Activo'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'collaborator_id' => $collaborator->id,
            'position' => 'Desarrollador'
        ]);
    }

    /** @test */
    public function no_crear_un_contrato_para_un_colaborador_inexistente() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $response = $this->post('/contracts', [
            'collaborator_id' => 999,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Desarrollador',
            'salary' => 3000,
            'status' => 'Activo'
        ]);

        $response->assertSessionHasErrors('collaborator_id');

        $this->assertDatabaseCount('contracts', 0);
    }

    /** @test */
    public function validar_los_campos_de_fecha_y_salario() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $response = $this->post('/contracts', [
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-10',
            'end_date' => '2025-01-01', 
            'position' => 'Desarrollador',
            'salary' => -1000, 
            'status' => 'Activo'
        ]);

        $response->assertSessionHasErrors([
            'end_date',
            'salary'
        ]);

        $this->assertDatabaseCount('contracts', 0);
    }

    /** @test */
    public function actualizar_un_contrato_existente() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $contract = \App\Models\Contract::create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Desarrollador',
            'salary' => 3000,
            'status' => 'Activo'
        ]);

        $response = $this->put("/contracts/{$contract->id}", [
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Senior Developer',
            'salary' => 4000,
            'status' => 'Activo'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'position' => 'Senior Developer',
            'salary' => 4000
        ]);
    }
}
