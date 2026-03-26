<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Collaborator;
use App\Models\User;
use App\Models\Contract;
use App\Models\ContractTermination;

class TerminateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {

        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);

    }

    /** @test */
    public function se_puede_terminar_un_contrato()
    {
        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $contract = Contract::create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Developer',
            'salary' => 3000,
            'status' => 'Activo'
        ]);

        $response = $this->patch("/contracts/{$contract->id}/terminate", [
            'termination_date' => '2025-06-01',
            'termination_reason' => 'Renuncia'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'status' => 'Terminado'
        ]);
    }

    /** @test */
    public function se_registra_fecha_y_motivo_de_terminacion() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $contract = Contract::create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'position' => 'Developer',
            'salary' => 3000,
            'status' => 'Activo'
        ]);

        $this->patch("/contracts/{$contract->id}/terminate", [
            'termination_date' => '2025-06-01',
            'termination_reason' => 'Renuncia voluntaria'
        ]);

        $this->assertDatabaseHas('contract_terminations', [
            'contract_id' => $contract->id,
            'termination_date' => '2025-06-01',
            'reason' => 'Renuncia voluntaria'
        ]);
    }

    /** @test */
    public function no_se_puede_terminar_un_contrato_ya_finalizado() {

        $user = User::factory()->create();
        $user->assignRole('gestor_rrhh');

        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $contract = Contract::create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'start_date' => '2025-01-01',
            'end_date' => '2025-06-01',
            'position' => 'Developer',
            'salary' => 3000,
            'status' => 'Finalizado' 
        ]);

        $response = $this->patch("/contracts/{$contract->id}/terminate", [
            'termination_date' => '2025-05-01',
            'termination_reason' => 'Intento inválido'
        ]);

        $response->assertStatus(403);
    }
}
