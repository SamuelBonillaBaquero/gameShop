<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Game;

class ImportGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.rawg.io/api/games', [ //mando peticion a esta pagina con la mi API key
        'key' => config('services.rawg.key'), //mi api key para la peticion
        'page_size' => 30 //limito a 20 que me quedo sin tokens
    ]);

    $games = $response->json()['results']; //nececio transformar la peticion a json porque esto esta en crudo

    foreach ($games as $game) { //por cada juego en la respuesta los voy creando en la bd
        Game::create([
            'name' => $game['name'],
            'description' => $game['slug'],
            'price' => rand(20, 70),
            'stock' => rand(1,30),
            'valoration' => rand(0,5),
            'image' => $game['background_image'] ?? null
        ]);
    }

    $this->info('Juegos importados correctamente'); //depuro queno me funciona
    }
}
