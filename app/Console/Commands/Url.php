<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Url as UrlDB;
use App\Models\UrlLog;

class Url extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:verifica';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica Status de URL';

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
        $urls = UrlDB::all();
        foreach ($urls as $url) {
            try {
                $check = Http::get($url->endereco);
                $body = $check->body();
                $status = $check->status();
            } catch (\Exception $exception) {
                $body = $exception->getMessage();
                $status = 503;
            }

            $log = new UrlLog();
            $log->url_id = $url->id;
            $log->status = $status;
            $log->conteudo = $body;
            $log->save();
        }
        return 0;
    }
}
