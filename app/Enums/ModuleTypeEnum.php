<?php

namespace App\Enums;

use App\Models\Invitation;
use App\View\Components\ModuleForms\Confirmation;
use App\View\Components\ModuleForms\Cover;
use App\View\Components\ModuleForms\Events;
use App\View\Components\ModuleForms\FloatButton;
use App\View\Components\ModuleForms\Foot;
use App\View\Components\ModuleForms\Galery;
use App\View\Components\ModuleForms\Gifts;
use App\View\Components\ModuleForms\Guest;
use App\View\Components\ModuleForms\Highlights;
use App\View\Components\ModuleForms\History;
use App\View\Components\ModuleForms\Info;
use App\View\Components\ModuleForms\Interactive;
use App\View\Components\ModuleForms\Intro;
use App\View\Components\ModuleForms\Music;
use App\View\Components\ModuleForms\SaveDate;
use App\View\Components\ModuleForms\Suggestions;
use App\View\Components\ModuleForms\Video;
use App\View\Components\ModuleForms\Welcome;
use App\View\Components\Modules\ConfirmationModule;
use App\View\Components\Modules\CoverModule;
use App\View\Components\Modules\EventsModule;
use App\View\Components\Modules\FloatButtonModule;
use App\View\Components\Modules\FootModule;
use App\View\Components\Modules\GaleryModule;
use App\View\Components\Modules\GiftsModule;
use App\View\Components\Modules\GuestModule;
use App\View\Components\Modules\HighlightsModule;
use App\View\Components\Modules\HistoryModule;
use App\View\Components\Modules\InfoModule;
use App\View\Components\Modules\InteractiveModule;
use App\View\Components\Modules\IntroModule;
use App\View\Components\Modules\MusicModule;
use App\View\Components\Modules\SaveDateModule;
use App\View\Components\Modules\SuggestionsModule;
use App\View\Components\Modules\VideoModule;
use App\View\Components\Modules\WelcomeModule;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\File;

final class ModuleTypeEnum
{
    const INTRO = [
        'name' => 'INTRO',
        'display_name' => 'Intro Animada',
        'fixed' => true, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value
    ];
    const MUSIC = [
        'name' => 'MUSIC',
        'display_name' => 'Música', 
        'fixed' => true, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::GOLD->value
    ];
    const FLOAT_BUTTON = [
        'name' => 'FLOAT_BUTTON',
        'display_name' => 'Botón Flotante', 
        'fixed' => true, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const COVER = [
        'name' => 'COVER',
        'display_name' => 'Portada', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const GUEST = [
        'name' => 'GUEST',
        'display_name' => 'Invitado', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const SAVE_DATE = [
        'name' => 'SAVE_DATE',
        'display_name' => 'Save The Date', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value
    ];
    const WELCOME = [
        'name' => 'WELCOME',
        'display_name' => 'Bienvenida', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const EVENTS = [
        'name' => 'EVENTS',
        'display_name' => 'Eventos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const HISTORY = [
        'name' => 'HISTORY',
        'display_name' => 'Historia', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value
    ];
    const INFO = [
        'name' => 'INFO',
        'display_name' => 'Info', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value
    ];
    const HIGHLIGHTS = [
        'name' => 'HIGHLIGHTS',
        'display_name' => 'Destacado', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const INTERACTIVE = [
        'name' => 'INTERACTIVE',
        'display_name' => 'Interactivos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value
    ];
    const VIDEO = [
        'name' => 'VIDEO',
        'display_name' => 'Video', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default'
    ];
    const SUGGESTIONS = [
        'name' => 'SUGGESTIONS',
        'display_name' => 'Sugerencias', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::GOLD->value
    ];
    const GALERY = [
        'name' => 'GALERY',
        'display_name' => 'Galería', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::GOLD->value
    ];
    const GIFTS = [
        'name' => 'GIFTS',
        'display_name' => 'Regalos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value
    ];
    const CONFIRMATION = [
        'name' => 'CONFIRMATION',
        'display_name' => 'Confirmación', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value
    ];
    const FOOT = [
        'name' => 'FOOT',
        'display_name' => 'Foot', 
        'fixed' => true, 
        'is_unique' => true, 
        'plan' => 'default'
    ];

    
    public static function values(): array
    {
        return array_values((new \ReflectionClass(self::class))->getConstants());
    }

    public static function names(): array
    {
        return array_map(
            fn($config) => $config['name'],
            self::values()
        );
    }

    public static function defaultModules(): array
    {
        return array_filter(self::values(), fn($config) => $config['plan'] === 'default');
    }

    public static function classicModules(): array
    {
        return array_filter(self::values(), fn($config) => $config['plan'] === PlanTypeEnum::CLÁSICO->value || $config['plan'] === 'default');
    }

    public static function platinumModules(): array
    {
        return array_filter(self::values(), fn($config) => $config['plan'] === PlanTypeEnum::CLÁSICO->value || $config['plan'] === PlanTypeEnum::PLATINO->value || $config['plan'] === 'default');
    }

    public static function goldModules(): array
    {
        return array_filter(self::values());
    }

    public static function fixedModules(): array
    {
        return array_filter(self::values(), fn($config) => $config['fixed'] === true);
    }

    public static function allWithKeys(): array
    {
        return (new \ReflectionClass(self::class))->getConstants();
    }

    public static function getModulesByPlan(string $plan): array
    {
        return match($plan) {
            PlanTypeEnum::CLÁSICO->value => self::classicModules(),
            PlanTypeEnum::PLATINO->value => self::platinumModules(),
            PlanTypeEnum::GOLD->value => self::goldModules(),
        };
    }

    public static function getModuleForm(string $name, Invitation $invitation) {
        $form = match($name){
            'INTRO' => new Intro($invitation->id),
            'MUSIC' => new Music($invitation->id),
            'FLOAT_BUTTON' => new FloatButton($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'COVER' => new Cover($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'GUEST' => new Guest($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'SAVE_DATE' => new SaveDate($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'WELCOME' => new Welcome($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'EVENTS' => new Events($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'HISTORY' => new History(),
            'INFO' => new Info(),
            'HIGHLIGHTS' => new Highlights(),
            'INTERACTIVE' => new Interactive(),
            'VIDEO' => new Video(),
            'SUGGESTIONS' => new Suggestions(),
            'GALERY' => new Galery(),
            'GIFTS' => new Gifts(),
            'CONFIRMATION' => new Confirmation(),
            'FOOT' => new Foot(),
        };

        return Blade::renderComponent($form);
    }

    public static function getModuleComponent(string $name, Invitation $invitation) {

        $module = match($name){
            'INTRO' => new IntroModule(self::getModuleFromArrayByName($invitation->modules, $name), $invitation->style->value),
            'MUSIC' => new MusicModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'FLOAT_BUTTON' => new FloatButtonModule(self::getModuleFromArrayByName($invitation->modules, $name), $invitation->color),
            'COVER' => new CoverModule(self::getModuleFromArrayByName($invitation->modules, $name), $invitation->meta_title, $invitation->color, $invitation->background_color),
            'GUEST' => new GuestModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'SAVE_DATE' => new SaveDateModule(
                self::getModuleFromArrayByName($invitation->modules, $name),
                $invitation->meta_title,
                $invitation->date,
                $invitation->time,
                $invitation->time_zone,
                $invitation->style->value,
                $invitation->color
            ),
            'WELCOME' => new WelcomeModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'EVENTS' => new EventsModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'HISTORY' => new HistoryModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'INFO' => new InfoModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'HIGHLIGHTS' => new HighlightsModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'INTERACTIVE' => new InteractiveModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'VIDEO' => new VideoModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'SUGGESTIONS' => new SuggestionsModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'GALERY' => new GaleryModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'GIFTS' => new GiftsModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'CONFIRMATION' => new ConfirmationModule(self::getModuleFromArrayByName($invitation->modules, $name)),
            'FOOT' => new FootModule(self::getModuleFromArrayByName($invitation->modules, $name)),
        };

        return Blade::renderComponent($module);
    }

    public static function getModuleFromArrayByName(array $modules, string $name): array
    {
        return array_values(array_filter($modules, fn($module) => $module['name'] === $name))[0];
    }

    public static function getModuleRequestRules(string $name): array
    {
        $rules = match($name){
            'INTRO' => [
                'stamp_image' => [
                    'required',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg', 'svg'])
                        ->max(2048)
                ],
            ],
            'MUSIC' => [
                'song' => [
                    'required',
                    File::types(['mp3', 'mp4', 'mpeg', 'mpga', 'wav'])
                        ->max(7*1024)
                ]
            ],
            'FLOAT_BUTTON' => [
                'type_button' => 'required|string',
                'url_button' => 'required_unless:type_button,"Confirmar Asistencia"',
                'icon_button' => 'required_unless:type_button,"Confirmar Asistencia"'
            ],
            'COVER' => [
                'format' => 'required|string',
                'frame_type' => 'required|string',
                'align' => 'required|string',
                'tittle' => 'required|string',
                'detail' => 'required|string',
                'text_color_cover' => 'required|string',
                'desktop_images' => [
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2*2048)
                ],
                'mobile_images' => [
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2*2048)
                ],
                'desktop_video' => [
                        File::types(['mp4', 'mov', 'avi'])
                            ->max(7*1024)
                    ],
                'mobile_video' => [
                    File::types(['mp4', 'mov', 'avi'])
                        ->max(7*1024)
                ],
                'logo_cover' => [
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ],
                'central_image_cover' => [
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ]
                
            ],
            'GUEST' => [
                'tittle' => 'required|string',
                'icon' => 'required|string',
                'signs' => 'required|string',
            ],
            'SAVE_DATE' => [
                'tittle' => 'required|string',
                'icon' => 'required|string',
                'text_button' => 'required|string',
                'is_countdown' => 'boolean',
                'days_tanslation' => 'required_if:is_countdown,1',
                'hr_tanslation' => 'required_if:is_countdown,1',
                'min_translation' => 'required_if:is_countdown,1',
                'sec_translation' => 'required_if:is_countdown,1',
            ],
            'WELCOME' => [
                'tittle' => 'required|string',
                'icon' => 'required|string',
                'text' => 'required|string',
                'image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ]
            ],
            'EVENTS' => [
                'civil_active' => 'boolean',
                'civil_event' => 'required_if:civil_active,1',
                'civil_icon' => 'required_if:civil_active,1',
                'civil_order' => 'required_if:civil_active,1',
                'civil_date' => 'required_if:civil_active,1',
                'civil_time' => 'required_if:civil_active,1',
                'civil_hr_translation' => 'required_if:civil_active,1',
                'civil_name' => 'required_if:civil_active,1',
                'civil_detail' => 'required_if:civil_active,1',
                'civil_image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'ceremony_active' => 'boolean',
                'ceremony_event' => 'required_if:ceremony_active,1',
                'ceremony_icon' => 'required_if:ceremony_active,1',
                'ceremony_order' => 'required_if:ceremony_active,1',
                'ceremony_date' => 'required_if:ceremony_active,1',
                'ceremony_time' => 'required_if:ceremony_active,1',
                'ceremony_hr_translation' => 'required_if:ceremony_active,1',
                'ceremony_name' => 'required_if:ceremony_active,1',
                'ceremony_detail' => 'required_if:ceremony_active,1',
                'ceremony_image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'party_active' => 'boolean',
                'party_event' => 'required_if:party_active,1',
                'party_icon' => 'required_if:party_active,1',
                'party_order' => 'required_if:party_active,1',
                'party_date' => 'required_if:party_active,1',
                'party_time' => 'required_if:party_active,1',
                'party_hr_translation' => 'required_if:party_active,1',
                'party_name' => 'required_if:party_active,1',
                'party_detail' => 'required_if:party_active,1',
                'party_image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'dresscode_active' => 'boolean',
                'dresscode_event' => 'required_if:dresscode_active,1',
                'dresscode_icon' => 'required_if:dresscode_active,1',
                'dresscode_order' => 'required_if:dresscode_active,1',
                'dresscode_name' => 'required_if:dresscode_active,1',
                'dresscode_detail' => 'required_if:dresscode_active,1',
                'dresscode_image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'HISTORY' => [],
            'INFO' => [],
            'HIGHLIGHTS' => [],
            'INTERACTIVE' => [],
            'VIDEO' => [],
            'SUGGESTIONS' => [],
            'GALERY' => [],
            'GIFTS' => [],
            'CONFIRMATION' => [],
            'FOOT' => [],
        };

        return $rules;
    }

    public static function updateModuleHandle(Invitation $invitation, string $name, array $data): array
    {
        $modules = $invitation->modules;
        $updateTask = function ($modules, $name, $data): array{
            
            foreach($modules as $index => $item){
                if($item['name'] == $name){
                    $modules[$index] = array_merge($modules[$index], $data);
                    break;
                }
            }
            return $modules;
        };

        $updatedModules = match($name){
            'INTRO' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::INTRO['name'])->each(function ($media) {
                    $media->delete();
                });

                $invitation->addMedia($data['stamp_image'], self::INTRO['name'], $invitation->path_name);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'stamp_image' => $invitation->media(self::INTRO['name'])->first()->getMediaUrl()
                ]);
            })(),
           'MUSIC' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::MUSIC['name'])->each(function ($media) {
                    $media->delete();
                });

                $invitation->addMedia($data['song'], self::MUSIC['name'], $invitation->path_name);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'song' => $invitation->media(self::MUSIC['name'])->first()->getMediaUrl()
                ]);
            })(),
            'FLOAT_BUTTON' => $updateTask($modules, $name, [
                'type_button' => $data['type_button'],
                'url_button' => $data['url_button'],
                'icon_button' => $data['icon_button']
            ]),
           'COVER' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media()->where('collection_name', 'like', self::COVER['name'].'%')->each(function ($media) {
                    $media->delete();
                });

                if($data['format'] == 'Imagenes'){
                    $invitation->addMedia($data['desktop_images'], self::COVER['name'].'/desktop_images', $invitation->path_name);
                    $invitation->addMedia($data['mobile_images'], self::COVER['name'].'/mobile_images', $invitation->path_name);
                }else{
                    $invitation->addMedia($data['desktop_video'], self::COVER['name'].'/desktop_video', $invitation->path_name);
                    $invitation->addMedia($data['mobile_video'], self::COVER['name'].'/mobile_video', $invitation->path_name);
                }

                if(isset($data['logo_cover'])) $invitation->addMedia($data['logo_cover'], self::COVER['name'].'/logo_cover', $invitation->path_name);
                if(isset($data['central_image_cover'])) $invitation->addMedia($data['central_image_cover'], self::COVER['name'].'/central_image_cover', $invitation->path_name);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'desktop_images' => $invitation->media(self::COVER['name'].'/desktop_images')->first()?->getMediaUrl(),
                    'mobile_images' => $invitation->media(self::COVER['name'].'/mobile_images')->first()?->getMediaUrl(),
                    'desktop_video' => $invitation->media(self::COVER['name'].'/desktop_video')->first()?->getMediaUrl(),
                    'mobile_video' => $invitation->media(self::COVER['name'].'/mobile_video')->first()?->getMediaUrl(),
                    'logo_cover' => $invitation->media(self::COVER['name'].'/logo_cover')->first()?->getMediaUrl(),
                    'central_image_cover' => $invitation->media(self::COVER['name'].'/central_image_cover')->first()?->getMediaUrl(),
                    'format' => $data['format'],
                    'frame_type' => $data['frame_type'],
                    'align' => $data['align'],
                    'tittle' => $data['tittle'],
                    'detail' => $data['detail'],
                    'text_color_cover' => $data['text_color_cover'],
                ]);
            })(),
            'GUEST' => $updateTask($modules, $name, [
                'tittle' => $data['tittle'],
                'icon' => $data['icon'],
                'signs' => $data['signs']
            ]),
            'SAVE_DATE' => $updateTask($modules, $name, [
                'tittle' => $data['tittle'],
                'icon' => $data['icon'],
                'text_button' => $data['text_button'],
                'is_countdown' => $data['is_countdown'] ? true : false,
                'days_tanslation' => $data['days_tanslation'],
                'hr_tanslation' => $data['hr_tanslation'],
                'min_translation' => $data['min_translation'],
                'sec_translation' => $data['sec_translation']
            ]),
            'WELCOME' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::WELCOME['name'])->each(function ($media) {
                    $media->delete();
                });

                $invitation->addMedia($data['image'], self::WELCOME['name'], $invitation->path_name);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'image' => $invitation->media(self::WELCOME['name'])->first()->getMediaUrl()
                ]);
            })(),
            'EVENTS' => (function () use ($invitation, $modules, $name, $data, $updateTask){

                $invitation->media()->where('collection_name', 'like', self::EVENTS['name'].'%')->each(function ($media) {
                    $media->delete();
                });
                
                if(isset($data['civil_image'])) $invitation->addMedia($data['civil_image'], self::EVENTS['name'].'/civil', $invitation->path_name);
                if(isset($data['ceremony_image'])) $invitation->addMedia($data['ceremony_image'], self::EVENTS['name'].'/ceremony', $invitation->path_name);
                if(isset($data['party_image'])) $invitation->addMedia($data['party_image'], self::EVENTS['name'].'/party', $invitation->path_name);
                if(isset($data['dresscode_image'])) $invitation->addMedia($data['dresscode_image'], self::EVENTS['name'].'/dresscode', $invitation->path_name);
                $invitation->refresh();
                
                $module = [
                    'civil' => [],
                    'ceremony' => [],
                    'party' => [],
                    'dresscode' => [],
                ]; 

                $module['civil']['active'] = $data['civil_active'] ?? false;
                $module['civil']['event'] = $data['civil_event'] ?? '';
                $module['civil']['icon'] = $data['civil_icon'] ?? '';
                $module['civil']['order'] = $data['civil_order'] ?? '';
                $module['civil']['date'] = $data['civil_date'] ?? '';
                $module['civil']['time'] = $data['civil_time'] ?? '';
                $module['civil']['hr_translation'] = $data['civil_hr_translation'] ?? '';
                $module['civil']['name'] = $data['civil_name'] ?? '';
                $module['civil']['detail'] = $data['civil_detail'] ?? '';
                $module['civil']['image'] = $invitation->media(self::EVENTS['name'].'/civil')->first()?->getMediaUrl();
                $module['ceremony']['active'] = $data['ceremony_active'] ?? false;
                $module['ceremony']['event'] = $data['ceremony_event'] ?? '';
                $module['ceremony']['icon'] = $data['ceremony_icon'] ?? '';
                $module['ceremony']['order'] = $data['ceremony_order'] ?? '';
                $module['ceremony']['date'] = $data['ceremony_date'] ?? '';
                $module['ceremony']['time'] = $data['ceremony_time'] ?? '';
                $module['ceremony']['hr_translation'] = $data['ceremony_hr_translation'] ?? '';
                $module['ceremony']['name'] = $data['ceremony_name'] ?? '';
                $module['ceremony']['detail'] = $data['ceremony_detail'] ?? '';
                $module['ceremony']['image'] = $invitation->media(self::EVENTS['name'].'/ceremony')->first()?->getMediaUrl();
                $module['party']['active'] = $data['party_active'] ?? false;
                $module['party']['event'] = $data['party_event'] ?? '';
                $module['party']['icon'] = $data['party_icon'] ?? '';
                $module['party']['order'] = $data['party_order'] ?? '';
                $module['party']['date'] = $data['party_date'] ?? '';
                $module['party']['time'] = $data['party_time'] ?? '';
                $module['party']['hr_translation'] = $data['party_hr_translation'] ?? '';
                $module['party']['name'] = $data['party_name'] ?? '';
                $module['party']['detail'] = $data['party_detail'] ?? '';
                $module['party']['image'] = $invitation->media(self::EVENTS['name'].'/party')->first()?->getMediaUrl();
                $module['dresscode']['active'] = $data['dresscode_active'] ?? false;
                $module['dresscode']['event'] = $data['dresscode_event'] ?? '';
                $module['dresscode']['icon'] = $data['dresscode_icon'] ?? '';
                $module['dresscode']['order'] = $data['dresscode_order'] ?? '';
                $module['dresscode']['name'] = $data['dresscode_name'] ?? '';
                $module['dresscode']['detail'] = $data['dresscode_detail'] ?? '';
                $module['dresscode']['image'] = $invitation->media(self::EVENTS['name'].'/dresscode')->first()?->getMediaUrl();

                uasort($module, function ($a, $b) {
                    return ($a['order'] ?? PHP_INT_MAX) <=> ($b['order'] ?? PHP_INT_MAX);
                });
                            
                foreach($modules as $index => $item){
                    if($item['name'] == $name){
                        $modules[$index]['events'] = $module;
                        break;
                    }
                }
                return $modules;
            })(),
           // 'HISTORY' => $updateTask($modules, $name, $data),
           // 'INFO' => $updateTask($modules, $name, $data),
           // 'HIGHLIGHTS' => $updateTask($modules, $name, $data),
           // 'INTERACTIVE' => $updateTask($modules, $name, $data),
           // 'VIDEO' => $updateTask($modules, $name, $data),
           // 'SUGGESTIONS' => $updateTask($modules, $name, $data),
           // 'GALERY' => $updateTask($modules, $name, $data),
           // 'GIFTS' => $updateTask($modules, $name, $data),
           // 'CONFIRMATION' => $updateTask($modules, $name, $data),
           // 'FOOT' => $updateTask($modules, $name, $data),
        };

        return $updatedModules;
    }
}
