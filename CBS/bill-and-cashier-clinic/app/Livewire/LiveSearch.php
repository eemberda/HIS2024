<?php

namespace App\Livewire;

use livewire\LivewireServiceProvider;
use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Component
{
    public $query = '';

    public function render()
    {
        $patients = [];

        if (!empty($this->query)) {
            $patients = Patient::where('name', 'like', '%' . $this->query . '%')
                ->get();
        }

        return view('livewire.live-search', ['patients' => $patients]);
    }
}
