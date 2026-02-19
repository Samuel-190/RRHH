<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function crear_colaborador_con_datos_validos()
    {
        $response = $this->postJson('/api/collaborators', [
            'first_name'     => 'Juan',
            'last_name'      => 'Pérez',
            'document_type'  => 'CC',
            'document_number'=> '123456789',
            'birth_date'     => '1995-05-10',
            'email'          => 'juan.perez@example.com',
            'phone_number'    => '555-1234',
            'address'         => 'Calle Falsa 123',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('collaborators', [
            'document_number' => '123456789',
        ]);
    }
}

