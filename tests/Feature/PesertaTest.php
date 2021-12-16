<?php

namespace Tests\Feature;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PesertaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_index_peserta()
    {
        /**
         * Given
         * database data
         */
        $pesertas = Peserta::factory()
                        ->count(5)
                        ->for(User::factory()->state([
                            'name' => 'admin',
                            'email' => 'admin@gmail.com',
                            'password' => Hash::make('admin')
                        ])
                        )->create();

        // When
        $view = $this->view('peserta.index', [
            'page' => 1,
            'pageSize' => 5,
            'numPage' => 1,
            'pesertas' => $pesertas
        ]);

        // Expect see the data
        foreach ($pesertas as $peserta) {
            $view->assertSee($peserta->nama);
            $view->assertSee($peserta->email);
            $view->assertSee($peserta->nilai_X);
            $view->assertSee($peserta->nilai_Y);
            $view->assertSee($peserta->nilai_Z);
            $view->assertSee($peserta->nilai_W);
        }
    }

    public function test_get_detail_peserta()
    {
        // Given
        $user = User::factory()->state([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ])->create();
        $peserta = Peserta::factory()
                        ->for($user)
                        ->create();

        // When
        $response = $this->actingAs($user)->call('GET','peserta/'.$peserta->id.'');

        // Expect
        $response->assertStatus(200);
        $output = $response->original->getData()['peserta'];
        $this->assertEquals($peserta->nama, $output->nama);
        $this->assertEquals($peserta->email, $output->email);
    }
}
