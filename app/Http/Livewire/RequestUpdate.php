<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Requests\Employee\Request as EmployeeRequest;

class RequestUpdate extends Component
{
    public $selected_year = '';

    public $series_year = [
        
    ];

    public $selected_month = '';

    public $series_month = [
        
    ];

    public function render(EmployeeRequest $request)
    {
        $columns = $request->getColumnRequestUpdate('request_update');
        $datas = $request->getDataRequestUpdate();

        $this->setYear();
        $this->setMonth();

        $this->selected_year = date('Y');
        $this->selected_month = date('m');

        return view('livewire.request-update', compact('columns','datas'));
    }

    public function setYear()
    {
        for($i = date('Y') + 3; $i >= date('Y') - 10; $i--) {
            $this->series_year[] = $i;
        }
    }

    public function setMonth()
    {
        for($i = 1; $i <= 12; $i++) {
            $this->series_month[] = date('F', strtotime("1997-$i-20"));
        }
    }
}
