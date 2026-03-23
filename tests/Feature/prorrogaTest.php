<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Collaborator;
use App\Models\User;
use App\Models\Contract;

class prorrogaTest extends TestCase {

    use RefreshDatabase;

    protected function setUp(): void {

        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);

    }

    /** @test */
    public function agregar_prorroga_a_un_contrato_valido() {

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
            'status' => 'Activo'
        ]);

        $response = $this->post("/contracts/{$contract->id}/extensions", [
            'extension_type' => 'Tiempo',
            'new_end_date' => '2026-12-31',
            'description' => 'Prórroga de 6 meses al contrato'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contract_extensions', [
            'contract_id' => $contract->id,
            'extension_type' => 'Tiempo',
            'new_end_date' => '2026-12-31'
        ]);
    }

    /** @test */
    public function fecha_final_de_contrato_se_actualiza_al_agregar_prorroga_de_tiempo() {
        
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
            'status' => 'Activo'
        ]);

        $response = $this->post("/contracts/{$contract->id}/extensions", [
            'extension_type' => 'Tiempo',
            'new_end_date' => '2027-03-31',
            'description' => 'Prórroga de 3 meses'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'end_date' => '2027-03-31'
        ]);
    }

    /** @test */
    public function no_agregar_prorroga_a_un_contrato_terminado()
    {
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
            'status' => 'Terminado'
        ]);

        $response = $this->post("/contracts/{$contract->id}/extensions", [
            'extension_type' => 'Tiempo',
            'new_end_date' => '2027-06-30',
            'description' => 'Intento de prórroga a contrato finalizado'
        ]);

        $response->assertStatus(403);
    }
}
