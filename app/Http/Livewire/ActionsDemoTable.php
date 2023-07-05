<?php

namespace App\Http\Livewire;

use App\Http\Requests\Employee\Request;
use App\Models\Employee\RequestUpdate;
use App\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ActionsDemoTable extends LivewireDatatable
{
    public $model = RequestUpdate::class;

    public function columns()
    {
        $requestUpdate = new Request;
        $cols = $requestUpdate->getColumnRequestUpdate();
        // dd($cols);

        $data = [];
        for($i = 0; $i < count($cols); $i++)
        {
            // $data[] = [
            //     // NumberColumn::name('id')->filterable(),

            //     // Column::name('name')->filterable()->searchable(),

            //     // Column::name('email')->truncate()->filterable()->searchable(),

            //     // DateColumn::name('created_at')->filterable(),

            //     // Column::callback(['id', 'name'], function ($id, $name) {
            //     //     return view('table-actions', ['id' => $id, 'name' => $name]);
            //     // })->unsortable()


            // ];

            $data[] = Column::name($cols[$i]['field'])->label($cols[$i]['comment'])->filterable()->searchable();
        }

        Column::callback(['id', 'name'], function ($id, $name) {
            return view('table-actions', ['id' => $id, 'name' => $name]);
        })->unsortable();

        return $data;
    }
}