<?php


namespace App\Actions;


use Illuminate\Support\Str;

/**
 * Class FormatWord
 * @package App\Actions
 */
class FormatWord
{
    /**
     * @param string $option
     * @param string $word
     * @return string
     */
    public function action(string $option, string $word): string
    {
        return $option === 'plural' ? Str::plural($word) : Str::singular($word);
    }
}
