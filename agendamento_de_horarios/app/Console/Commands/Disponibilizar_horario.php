<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Horario;

use App\Models\Usuario;

use Illuminate\Support\Facades\DB;

use Log;


class Disponibilizar_horario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'desmarcar:horario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para deixar todos horarios disponiveis as 00:00';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('Executing Send News Letter');

        $horarios = Horario::all()->where('reservado', 1);


        foreach($horarios as $horario):

            Usuario::where('horario_marcada', $horario['hora'])->update(['marcado' => '0']);
            Usuario::where('horario_marcada', $horario['hora'])->update(['horario_marcada' => '']);
            Horario::where('id', $horario['id'])->update(['reservado' => 0]);

        endforeach;

        redirect('/home');
    }
}
