<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Models\ProjectModel;

class RenderBladeToHtml extends Command
{
    // php artisan render:blade index index.html

    protected $signature = 'render:blade {view} {output}';
    protected $description = 'Renderiza uma view Blade e salva como HTML estático';

    public function handle()
    {
        $view = $this->argument('view');
        $outputPath = $this->argument('output');

        $projects = ProjectModel::all();

        // Renderiza o conteúdo da view
        $html = View::make($view)->with('projects', $projects)->render();

        // Salva o conteúdo como um arquivo HTML
        File::put(public_path($outputPath), $html);

        $this->info("View $view renderizada com sucesso em $outputPath");
    }
}