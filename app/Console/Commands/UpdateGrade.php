<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Command\Command as CommandAlias;

final class UpdateGrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-grade {grade}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update description or access conditions of a grade';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $grade = $this->argument('grade');

        $grades = Config::get('grades', []);
        $grades = is_array($grades) ? $grades : (array) $grades;
        if (! array_key_exists($grade, $grades)) {
            $this->error('Le grade spécifié n\'existe pas.');

            return CommandAlias::FAILURE;
        }

        return CommandAlias::SUCCESS;
    }
}
