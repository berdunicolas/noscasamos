<?php

namespace App\View\Components\Modules;

use App\Models\InvitationModule;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class SaveDateModule extends Component
{
    public string $fullDateTime = '';
    public string $dateTittle = '';
    public string $fechali = '';
    public string $fechalip = '';
    public string $fechalif = '';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public InvitationModule $module,
        public ?string $nombres,
        public ?string $date,
        public ?string $time,
        public ?string $timezone,
        public ?int $duration,
        public ?string $style,
        public ?string $color,
        public ?string $icontype,
        public ?string $marco,
        public ?string $padding,
    ) {
        Carbon::setLocale('es');
        if($this->date && $this->time){     
            $dataTime = Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $this->date . ' ' . $this->time.':00',
                $this->timezone
            );
            $this->dateTittle = $dataTime->translatedFormat('j \d\e F');

            $this->fullDateTime = $dataTime->translatedFormat('m/d/Y/ H:i:s');
            $this->fechali = $dataTime->translatedFormat('YmdHis');

            $this->fechalip = $dataTime->setTimezone('UTC')->translatedFormat('YmdHis');
            $this->fechalif = $dataTime->addHours($this->duration)->setTimezone('UTC')->translatedFormat('YmdHis');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.save-date');
    }
}
