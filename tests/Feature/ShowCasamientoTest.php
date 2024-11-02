<?php

namespace Tests\Feature;

use App\Models\Casamiento;
use App\Models\DatoGeneralParroquia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowCasamientoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba unitaria para la vista individual de un casamiento.
     *
     * @return void
     */
    public function test_show_casamiento_displays_correct_data()
    {
        // Crear un dato general de parroquia para la relación foránea
        $datoParroquia = DatoGeneralParroquia::factory()->create();

        // Crear un casamiento de prueba en la base de datos, enlazado al dato de parroquia
        $casamiento = Casamiento::factory()->create([
            'dato_parroquia_id' => $datoParroquia->dato_parroquia_id, // Asignar ID del dato parroquial
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

        // Simular la solicitud GET para ver el casamiento
        $response = $this->get(route('casamientos.show', ['casamiento_id' => $casamiento->casamiento_id]));

        // Verificar que la respuesta tiene un código 200 (OK)
        $response->assertStatus(200);

        // Verificar que se está cargando la vista 'casamiento.casamiento-show'
        $response->assertViewIs('casamiento.casamiento-show');

        // Verificar que la vista contiene el objeto 'casamiento' con los datos esperados
        $response->assertViewHas('casamiento', function ($viewCasamiento) use ($casamiento) {
            return $viewCasamiento->id === $casamiento->id &&
                   $viewCasamiento->nombre_esposo === 'Juan Pérez' &&
                   $viewCasamiento->nombre_esposa === 'Ana López';
        });
    }
}
