<?php

namespace App\Exports;

use App\Models\Story;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Story::all();
    }
}
