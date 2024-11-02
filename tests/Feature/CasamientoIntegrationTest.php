<?php

namespace Tests\Feature;

use App\Models\Casamiento;
use App\Models\DatoGeneralParroquia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CasamientoIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba de integración para ver un casamiento.
     *
     * @return void
     */
    public function test_user_can_view_casamiento_details()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crear un registro de DatoGeneralParroquia para la relación foránea
        $datoParroquia = DatoGeneralParroquia::factory()->create();

        // Crear un casamiento de prueba relacionado con el DatoGeneralParroquia
        $casamiento = Casamiento::factory()->create([
            'dato_parroquia_id' => $datoParroquia->dato_parroquia_id,
            'NoPartida' => '12345',
            'folio' => 'A123',
            'fecha_casamiento' => '2023-01-01',
            'nombres_testigos' => 'Testigo Uno, Testigo Dos',
            'nombre_esposo' => 'Juan Pérez',
            'edad_esposo' => '30',
            'origen_esposo' => 'Ciudad Esposo',
            'feligresesposo' => 'Parroquia Esposo',
            'nombre_padre_esposo' => 'Padre Esposo',
            'nombre_madre_esposo' => 'Madre Esposo',
            'nombre_esposa' => 'Ana López',
            'edad_esposa' => '28',
            'origen_esposa' => 'Ciudad Esposa',
            'feligresesposa' => 'Parroquia Esposa',
            'nombre_padre_esposa' => 'Padre Esposa',
            'nombre_madre_esposa' => 'Madre Esposa',
            'nombre_parroco' => 'Párroco Ejemplo',
        ]);

        // Realizar la solicitud GET para ver el casamiento
        $response = $this->get(route('casamientos.show', ['casamiento_id' => $casamiento->casamiento_id]));

        // Verificar que la respuesta sea 200 (OK)
        $response->assertStatus(200);

        // Verificar que la vista 'casamiento.casamiento-show' se esté cargando
        $response->assertViewIs('casamiento.casamiento-show');

        // Verificar que algunos datos específicos aparezcan en el HTML en el orden correcto
        $response->assertSeeInOrder([
            'Partida No:',
            '12345',
            'Folio:',
            'A123',
            'Fecha de casamiento:',
            '2023-01-01',
            'Testigos',
            'Testigo Uno, Testigo Dos',
            'Datos del esposo',
            'Nombre del esposo:',
            'Juan Pérez',
            'Edad del esposo:',
            '30',
            'Origen del esposo:',
            'Ciudad Esposo',
            'Feligres de:',
            'Parroquia Esposo',
            'Datos de la esposa',
            'Nombre de la esposa:',
            'Ana López',
            'Edad de la esposa:',
            '28',
            'Origen de la esposa:',
            'Ciudad Esposa',
            'Feligres de:',
            'Parroquia Esposa',
            'Párroco',
            'Párroco Ejemplo',
        ]);
    }
}
