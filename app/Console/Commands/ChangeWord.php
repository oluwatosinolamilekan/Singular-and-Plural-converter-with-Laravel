<?php

namespace App\Console\Commands;

use App\Actions\FormatWord;
use Illuminate\Console\Command;

/**
 * Class ChangeWord
 * @package App\Console\Commands
 */
class ChangeWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change words to singular and plural';

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
       $option = $this->ask('Select the option of word you want to convert if it singular or plural.',false);
       if (empty($option)){
           $this->error('Please Select an option');

           return 0;
       }
       if ($option !== 'singular' || $option !== 'plural'){
           $this->error("{$option} is not a singular or plural");

           return 0;
       }
        $word = $this->ask("Type the word you to convert to: {$option}");
        if (empty($word)){
           $this->error('Please type a word to convert');

           return 0;
       }

       $formatWord = (new FormatWord())->action($option,$word);

       $this->info("The {$option} of {$word} is $formatWord");

        return 0;
    }
}
