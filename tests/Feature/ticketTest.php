<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ticket;

class ticketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    public function testCreacionTicket()
    {
     
        $ticketData = Ticket::factory()->make()->toArray();

        $response = $this->post('/api/tickets/save', $ticketData);

        $response->assertStatus(201);
        $response->assertJson(['message' => 'Ticket creado exitosamente']);

       
    
    }


    

    public function testMostrarTicket()
    {

        $ticketData = Ticket::factory()->make()->toArray();

        $response = $this->get('/api/tickets/mostrar'); 
        $response->assertStatus(200);

   
        $response->assertJsonStructure([
            '*' => [ 
                'id',
                'titulo',
                'descripcion',
                'archivo_adjunto',
                'created_at',
                'updated_at',
            ],
        ]);
    }

}

