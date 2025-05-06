<?php

namespace App\View\Components\Modules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class SaveDateModule extends Component
{
    /*
    public string $day;
    public string $month;
    public string $monthName;
    public string $year;
    public string $hour;
    */
    public string $fullDateTime;
    public string $dateTittle;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
        public string $nombres,
        public string $date,
        public string $time,
        public string $timezone,
        public string $style,
        public string $color,
    ) {
        //Carbon::setLocale(App::getLocale()); 
        Carbon::setLocale('es'); 
        $dataTime = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $this->date . ' ' . $this->time,
            //$this->timezone
        );
        $this->dateTittle = $dataTime->translatedFormat('j \d\e F');
        $this->fullDateTime = $dataTime->translatedFormat('m/d/Y/ H:i:s');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.save-date');
    }
}
