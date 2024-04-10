<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Ejecutors;
use Illuminate\Support\Carbon;

class Reports extends Component
{
    
    public $componentName, $data, $details, $sumDetails, $countDetails,
    $reportType, $userId, $dateFrom, $dateTo, $saleId,

    public function mount()
    {
        $this->componentName = 'Reportes de ventas';
        $this->data = [];
        $this->details = [];
        $this-> sumDetails= 0;
        $this->countDetails=0;
        $this->reportType=0;
        $this->userId=0;
        $this->saleId=0;
    }
    
    public function render()
    {
        return view('livewire.reports',[
            'users'=> User::orderBy('name','asc')->get()
        ]);
    }
}
