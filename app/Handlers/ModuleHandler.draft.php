<?php

namespace App\Enums;

use App\Models\Invitation;
use App\View\Components\ModuleForms\Confirmation;
use App\View\Components\ModuleForms\Cover;
use App\View\Components\ModuleForms\Events;
use App\View\Components\ModuleForms\FloatButton;
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
        'fixed' => true, //parte del handle
        'is_unique' => true, //parte del handle
        'plan' => PlanTypeEnum::CLÁSICO->value, //parte del handle
        'stamp_image' => ''
    ];
    const MUSIC = [
        'name' => 'MUSIC',
        'display_name' => 'Música', 
        'fixed' => true, 
        'is_unique' => true,
        'plan' => PlanTypeEnum::GOLD->value,
        'song' => ''
    ];
    const FLOAT_BUTTON = [
        'name' => 'FLOAT_BUTTON',
        'display_name' => 'Botón Flotante', 
        'fixed' => true, 
        'is_unique' => true, 
        'plan' => 'default',
        'type_button' => '',
        'url_button' => '',
        'icon_button' => '',
    ];
    const COVER = [
        'name' => 'COVER',
        'display_name' => 'Portada', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default',
        'format' => 'Imagenes',
        'frame_type' => '',
        'align' => '',
        'active_header' => false,
        'active_logo' => false,
        'active_central' => false,
        'names' => '',
        'tittle' => '¡Nos Casamos!',
        'detail' => 'y queremos compartirlo con vos',
        'text_color_cover' => '#E2BF83',
        'desktop_images' => [],
        'mobile_images' => [],
        'desktop_design' => '',
        'mobile_design' => '',
        'desktop_video' => '',
        'mobile_video' => '',
        'logo_cover' => '',
        'central_image_cover' => '',
    ];
    const GUEST = [
        'name' => 'GUEST',
        'display_name' => 'Invitado', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default',
        'tittle' => '',
        'icon' => '',
        'signs' => '',
    ];
    const SAVE_DATE = [
        'name' => 'SAVE_DATE',
        'display_name' => 'Save The Date', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value,
        'tittle' => 'Agendá la fecha',
        'icon' => 'mzfjzfjs',
        'text_button' => 'Agendar fecha',
        'is_countdown' => true,
        'days_tanslation' => 'Días',
        'hr_tanslation' => 'Hs',
        'min_translation' => 'Min',
        'sec_translation' => 'Seg',
    ];
    const WELCOME = [
        'name' => 'WELCOME',
        'display_name' => 'Bienvenida',
        'fixed' => false,
        'is_unique' => true,
        'plan' => 'default',
        'tittle' => '',
        'icon' => 'aydxrkfl',
        'text' => '',
        'image' => '',
    ];
    const EVENTS = [
        'name' => 'EVENTS',
        'display_name' => 'Eventos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default',
        'events' => [
            'civil' => [
                'active' => false,
                'event' => 'Civil',
                'icon' => 'czmrowis',
                'order' => '',
                'date' => '',
                'time' => '',
                'hr_translation' => 'Horas',
                'name' => '',
                'detail' => '',
                'button_url' => '',
                'button_text' => 'Cómo llegar',
                'image' => '',
            ],
            'ceremony' => [
                'active' => false,
                'event' => 'Ceremonia',
                'icon' => 'fshosubk',
                'order' => '',
                'date' => '',
                'time' => '',
                'hr_translation' => 'Horas',
                'name' => '',
                'detail' => '',
                'button_url' => '',
                'button_text' => 'Cómo llegar',
                'image' => '',
            ],
            'party' => [
                'active' => false,
                'event' => 'Festejo',
                'icon' => 'yvgmrqny',
                'order' => '',
                'date' => '',
                'time' => '',
                'hr_translation' => 'Horas',
                'name' => '',
                'detail' => '',
                'button_url' => '',
                'button_text' => 'Cómo llegar',
                'image' => '',
            ],
            'dresscode' => [
                'active' => false,
                'event' => 'Dress Code',
                'icon' => 'dkyhucjt',
                'order' => '',
                'name' => '',
                'detail' => '',
                'button_url' => '',
                'button_text' => '',
                'image' => '',
            ],
        ]
    ];
    const HISTORY = [
        'name' => 'HISTORY',
        'display_name' => 'Historia', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value,
        'icon' => '',
        'image' => '',
        'tittle' => 'Nuestra Historia',
        'text' => '',
        'button_icon' => 'aydxrkfl',
        'button_text' => '',
        'button_url' => '',
    ];
    const INFO = [
        'name' => 'INFO',
        'display_name' => 'Info', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value,
        'on_t_right' => true,
        'icon' => '',
        'image' => '',
        'tittle' => '',
        'text' => '',
        'button_icon' => '',
        'button_text' => '',
        'button_url' => '',
    ];
    const HIGHLIGHTS = [
        'name' => 'HIGHLIGHTS',
        'display_name' => 'Destacado', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default',
        'icon' => '',
        'image' => '',
        'tittle' => '',
        'text' => '',
        'button_icon' => '',
        'button_text' => '',
        'button_url' => '',
    ];
    const INTERACTIVE = [
        'name' => 'INTERACTIVE',
        'display_name' => 'Interactivos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value,
        'interactives' => [
            'spotify' => [
                'active' => false,
                'icon' => 'xsiktwiz',
                'order' => '',
                'tittle' => 'Nuestra Playlist',
                'text' => 'Sumate a nuestra playlist y recomendá las canciones que no pueden faltar en la fiesta.',
                'button_icon' => '',
                'button_text' => 'Ir a Spotify',
                'button_url' => '',
            ],
            'hashtag' => [
                'active' => false,
                'icon' => 'tgyvxauj',
                'order' => '',
                'tittle' => '',
                'text' => 'Sumate a la boda compartiendo fotos y videos con nuestro hashtag.',
                'button_icon' => '',
                'button_text' => 'Ir a Instagram',
                'button_url' => '',
            ],
            'ig' => [
                'active' => false,
                'icon' => 'tgyvxauj',
                'order' => '',
                'tittle' => '',
                'text' => '',
                'button_icon' => '',
                'button_text' => 'Seguinos en nuestra cuenta de instagram.',
                'button_url' => 'Ir a Instagram',
            ],
            'link' => [
                'active' => false,
                'icon' => '',
                'order' => '',
                'tittle' => '',
                'text' => '',
                'button_icon' => '',
                'button_text' => '',
                'button_url' => '',
            ],
        ]
    ];
    const VIDEO = [
        'name' => 'VIDEO',
        'display_name' => 'Video', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => 'default',
        'pre_tittle' => 'Video',
        'tittle' => '',
        'video_id' => '',
        'type_video' => '',
        'format' => '',
    ];
    const SUGGESTIONS = [
        'name' => 'SUGGESTIONS',
        'display_name' => 'Sugerencias', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::GOLD->value,
        'pre_tittle' => 'Sugerencias',
        'tittle' => 'Alojamientos',
        'text' => '¿Estarás de visita en la ciudad?<br> Te recomendamos algunos lugares para hospedarte.',
        'icon' => 'kjeyqivm',
        'suggestions' => []
    ];
    const GALERY = [
        'name' => 'GALERY',
        'display_name' => 'Galería', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::GOLD->value,
        'icon' => 'wsaaegar',
        'tittle' => 'Álbum de Fotos',
        'pre_tittle' => 'Momentos únicos',
        'galery_images' => [],
    ];
    const GIFTS = [
        'name' => 'GIFTS',
        'display_name' => 'Regalos', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::CLÁSICO->value,
        'icon' => 'kezeezyg',
        'pre_tittle' => 'Regalos',
        'text' => 'Tu presencia es lo más importante para nosotros. <br>Si además querés hacernos un regalo, podés ayudarnos con nuestra luna de miel.',
        'background_image' => '',
        'module_image' => '',
        'button_icon' => '',
        'button_text' => 'Más Información',
        'button_type' => '',
        'button_url' => '',
        'first_account' => [
            'active' => false,
            'tittle' => 'Cuenta bancaria',
            'text' => '',
            'data' => 'CBU',
            'value' => '',
            'copy_button_text' => 'Copiar',
            'copy_message' => 'Copiado',
        ],
        'second_account' => [
            'active' => false,
            'tittle' => 'Cuenta en dólares',
            'text' => '',
            'button_url' => '',
            'button_text' => 'Ir a punto de pago',
            'value' => '',
        ],
        'box' => [
            'active' => false,
            'tittle' => 'Buzón en Salón',
            'text' => 'En caso que prefieras hacernos un regalo en efectivo, tendrás a disposición un buzón en el salón durante la recepción.',
            'button_text' => '',
            'button_url' => '',
        ],
        'list' => [
            'active' => false,
            'tittle' => 'Ideas de Regalos',
            'text' => 'Te compartimos algunas opciones que seguro disfrutaremos.',
            'button_text' => '',
            'button_url' => '',
            'product_1' => '',
            'product_url_1' => '',
            'product_price_1' => '',
            'product_image_1' => '',
            'product_2' => '',
            'product_url_2' => '',
            'product_price_2' => '',
            'product_image_2' => '',
            'product_3' => '',
            'product_url_3' => '',
            'product_price_3' => '',
            'product_image_3' => '',
            'product_4' => '',
            'product_url_4' => '',
            'product_price_4' => '',
            'product_image_4' => '',
            'product_5' => '',
            'product_url_5' => '',
            'product_price_5' => '',
            'product_image_5' => '',
            'product_6' => '',
            'product_url_6' => '',
            'product_price_6' => '',
            'product_image_6' => '',
        ],
    ];
    const CONFIRMATION = [
        'name' => 'CONFIRMATION',
        'display_name' => 'Confirmación', 
        'fixed' => false, 
        'is_unique' => true, 
        'plan' => PlanTypeEnum::PLATINO->value,
        'icon' => 'heqlbljj',
        'pre_tittle' => 'RSVP',
        'tittle' => 'Confirmación de Asistencia',
        'text' => 'Esperamos contar con tu presencia',
        'limit_date' => 'Por favor confirmar antes del ',
        'card_active' => false,
        'card_tittle' => 'Valor de Tarjetas',
        'card_text' => '',
        'card_button_text' => 'Cómo Abonar',
        'form_active' => false,
        'form_button_text' => 'Confirmar Asistencia',
        'form_button_url' => '',
        'form_text' => 'El formulario es individual.<br> Si tu invitación incluye acompañantes repetí el proceso por cada persona.',
        'form_ill_attend' => 'Asistiré',
        'form_ill_n_attend' => 'No Asistiré',
        'form_name' => '',
        'form_email' => '',
        'form_phone' => '',
        'form_special_menu' => '¿Necesitas un menú especial?',
        'form_nothing' => 'Ninguno',
        'form_menu1' => 'Celiaco',
        'form_menu2' => 'Vegetariano',
        'form_menu3' => 'Vegano',
        'form_menu4' => 'Diabético',
        'form_menu5' => 'Kosher',
        'form_transfer' => '',
        'form_option1' => 'No, voy por mis propios medios',
        'form_option2' => 'Si, necesito traslado',
        'form_option3' => '',
        'form_option4' => '',
        'form_companions' => 'Apellido y nombres de acompañantes (si corresponde)',
        'form_comments' => 'Comentarios',
        'form_thanks' => '¡Gracias por confirmar tu asistencia!',
        'form_errors' => 'Por favor completa todos los campos',
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

    public static function availableModules(array $modules): array
    {
        $fullModules = self::goldModules();
        $result = array_udiff($fullModules, $modules, function ($itemfull, $item) {
            return strcmp($itemfull['name'], $item['name']);
        });


        $newModules = array_column($result, 'name');
        $alwaysAvailable = [self::INFO, self::HIGHLIGHTS, self::HISTORY];

        foreach ($alwaysAvailable as $item) {
            if (!in_array($item['name'], $newModules)) {
                $result[] = $item;
                $newModules[] = $item['name'];
            }
        }

        return $result;
    }

    public static function fixedModules(): array
    {
        return array_filter(self::values(), fn($config) => $config['fixed'] === true);
    }

    public static function allWithKeys(): array
    {
        return (new \ReflectionClass(self::class))->getConstants();
    }

    public static function syncModule(array $module): array 
    {
        $modulePattern = (new \ReflectionClass(self::class))->getConstant($module['name']);

        foreach($modulePattern as $key => $item){
            if(!isset($module[$key])){
                $module[$key] = $item;
            }
        }
        return $module;
    }

    public static function getModulesByPlan(string $plan): array
    {
        return match($plan) {
            PlanTypeEnum::CLÁSICO->value => self::classicModules(),
            PlanTypeEnum::PLATINO->value => self::platinumModules(),
            PlanTypeEnum::GOLD->value => self::goldModules(),
        };
    }

    public static function getModuleForm(string $name, Invitation $invitation, $displayName) {
        $form = match($name){
            'INTRO' => new Intro($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'MUSIC' => new Music($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'FLOAT_BUTTON' => new FloatButton($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'COVER' => new Cover($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name), $invitation->host_names),
            'GUEST' => new Guest($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'SAVE_DATE' => new SaveDate($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'WELCOME' => new Welcome($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'EVENTS' => new Events($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'HISTORY' => new History($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name, $displayName)),
            'INFO' => new Info($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name, $displayName)),
            'HIGHLIGHTS' => new Highlights($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name, $displayName)),
            'INTERACTIVE' => new Interactive($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'VIDEO' => new Video($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'SUGGESTIONS' => new Suggestions($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'GALERY' => new Galery($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'GIFTS' => new Gifts($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
            'CONFIRMATION' => new Confirmation($invitation->id, self::getModuleFromArrayByName($invitation->modules, $name)),
        };

        return Blade::renderComponent($form);
    }

    public static function getModuleComponent(array $module, Invitation $invitation) {

        $module = match($module['name']){
            'INTRO' => new IntroModule($module, $invitation->style->value),
            'MUSIC' => new MusicModule($module),
            'FLOAT_BUTTON' => new FloatButtonModule($module, $invitation->color),
            'COVER' => new CoverModule($module, $invitation->host_names, $invitation->meta_title, $invitation->color, $invitation->background_color),
            'GUEST' => new GuestModule($module),
            'SAVE_DATE' => new SaveDateModule(
                $module,
                $invitation->meta_title,
                $invitation->date,
                $invitation->time,
                $invitation->time_zone,
                $invitation->duration,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'WELCOME' => new WelcomeModule(
                $module, 
                $invitation->icon_type,
                $invitation->style->value,
                $invitation->color,
            ),
            'EVENTS' => new EventsModule(
                $module,
                $invitation->icon_type,
                $invitation->style->value,
                $invitation->color,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'HISTORY' => new HistoryModule(
                $module,
                $invitation->icon_type,
            ),
            'INFO' => new InfoModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'HIGHLIGHTS' => new HighlightsModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'INTERACTIVE' => new InteractiveModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'VIDEO' => new VideoModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'SUGGESTIONS' => new SuggestionsModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'GALERY' => new GaleryModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'GIFTS' => new GiftsModule(
                $module,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
            'CONFIRMATION' => new ConfirmationModule(
                $module, 
                $invitation->path_name,
                $invitation->style->value,
                $invitation->color,
                $invitation->icon_type,
                $invitation->frameImg(),
                $invitation->padding,
            ),
        };

        return Blade::renderComponent($module);
    }

    public static function getModuleFromArrayByName(array $modules, string $name, ?string $displayName = null): array
    {
        return array_values(array_filter($modules, function ($module) use ($name, $displayName) {
            if($displayName!==null){
                if($module['name'] === $name && $displayName === $module['display_name']){
                    return true;
                }
            } else {
                if($module['name'] === $name){
                    return true;
                }
            }

            return false;
        }))[0];
    }

    public static function getModuleRequestRules(string $name): array
    {
        $rules = match($name){
            'INTRO' => [
                'stamp_image' => 'nullable'
            ],
            'MUSIC' => [
                'song' => [
                    'nullable',
                    File::types(['mp3', 'mp4', 'mpeg', 'mpga', 'wav'])
                        ->max(10240)
                ]
            ],
            'FLOAT_BUTTON' => [
                'type_button' => 'nullable|string',
                'url_button' => 'required_unless:type_button,"Confirmar Asistencia"',
                'icon_button' => 'required_unless:type_button,"Confirmar Asistencia"'
            ],
            'COVER' => [
                'format' => 'nullable|string',
                'active_header' => 'boolean',
                'active_logo' => 'boolean',
                'active_central' => 'boolean',
                'names' => 'nullable|string',
                'tittle' => 'nullable|string',
                'detail' => 'nullable|string',
                'text_color_cover' => 'nullable|string',
                'desktop_images' => ['array'
                    /*File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2*2048)*/
                ],
                'mobile_images' => [
                    'array'
                    /*File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2*2048)*/
                ],
                'desktop_design' => [
                    'nullable',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ],
                'mobile_design' => [
                    'nullable',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ],
                'desktop_video' => [
                    File::types(['mp4', 'mov', 'avi'])
                        ->max(61440)
                ],
                'mobile_video' => [
                    File::types(['mp4', 'mov', 'avi'])
                        ->max(61440)
                ],
                'logo_cover' => [
                    'nullable',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ],
                'central_image_cover' => [
                    'nullable',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ]
            ],
            'GUEST' => [
                'tittle' => 'nullable|string',
                'icon' => 'nullable|string',
                'signs' => 'nullable|string',
            ],
            'SAVE_DATE' => [
                'tittle' => 'nullable|string',
                'icon' => 'nullable|string',
                'text_button' => 'nullable|string',
                'is_countdown' => 'boolean',
                'days_tanslation' => 'nullable|string',
                'hr_tanslation' => 'nullable|string',
                'min_translation' => 'nullable|string',
                'sec_translation' => 'nullable|string',
            ],
            'WELCOME' => [
                'tittle' => 'nullable|string',
                'icon' => 'nullable|string',
                'text' => 'nullable|string',
                'image' => 'nullable'
            ],
            'EVENTS' => [
                'civil_active' => 'boolean',
                'civil_event' => 'nullable|string',
                'civil_icon' => 'nullable|string',
                'civil_order' => 'nullable|string',
                'civil_date' => 'nullable|string',
                'civil_time' => 'nullable|string',
                'civil_hr_translation' => 'nullable|string',
                'civil_name' => 'nullable|string',
                'civil_detail' => 'nullable|string',
                'civil_button_url' => 'nullable|string',
                'civil_button_text' => 'nullable|string',
                'civil_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'ceremony_active' => 'boolean',
                'ceremony_event' => 'nullable|string',
                'ceremony_icon' => 'nullable|string',
                'ceremony_order' => 'nullable|string',
                'ceremony_date' => 'nullable|string',
                'ceremony_time' => 'nullable|string',
                'ceremony_hr_translation' => 'nullable|string',
                'ceremony_name' => 'nullable|string',
                'ceremony_detail' => 'nullable|string',
                'ceremony_button_url' => 'nullable|string',
                'ceremony_button_text' => 'nullable|string',
                'ceremony_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'party_active' => 'boolean',
                'party_event' => 'nullable|string',
                'party_icon' => 'nullable|string',
                'party_order' => 'nullable|string',
                'party_date' => 'nullable|string',
                'party_time' => 'nullable|string',
                'party_hr_translation' => 'nullable|string',
                'party_name' => 'nullable|string',
                'party_detail' => 'nullable|string',
                'party_button_url' => 'nullable|string',
                'party_button_text' => 'nullable|string',
                'party_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],

                'dresscode_active' => 'boolean',
                'dresscode_event' => 'nullable|string',
                'dresscode_icon' => 'nullable|string',
                'dresscode_order' => 'nullable|string',
                'dresscode_name' => 'nullable|string',
                'dresscode_detail' => 'nullable|string',
                'dresscode_button_url' => 'nullable|string',
                'dresscode_button_text' => 'nullable|string',
                'dresscode_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'HISTORY' => [
                'icon' => 'nullable|string',
                'tittle' => 'nullable|string',
                'text' => 'nullable|string',
                /*'button_icon' => 'required|string',
                'button_text' => 'required|string',
                'button_url' => 'required|string',*/
                'image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'INFO' => [
                'icon' => 'nullable|string',
                'tittle' => 'nullable|string',
                'text' => 'nullable|string',
                'button_icon' => 'nullable|string',
                'button_text' => 'nullable|string',
                'button_url' => 'nullable|string',
                'on_t_right' => 'boolean',
                'image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'HIGHLIGHTS' => [
                'icon' => 'nullable|string',
                'tittle' => 'nullable|string',
                'text' => 'nullable|string',
                'button_icon' => 'nullable|string',
                'button_text' => 'nullable|string',
                'button_url' => 'nullable|string',
                'image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'INTERACTIVE' => [
                'spotify_active' => 'nullable|boolean',
                'spotify_icon' => 'nullable|string',
                'spotify_order' => 'nullable|string',
                'spotify_tittle' => 'nullable|string',
                'spotify_text' => 'nullable|string',
                'spotify_button_icon' => 'nullable|string',
                'spotify_button_text' => 'nullable|string',
                'spotify_button_url' => 'nullable|string',

                'hastag_active' => 'nullable|boolean',
                'hastag_icon' => 'nullable|string',
                'hastag_order' => 'nullable|string',
                'hastag_tittle' => 'nullable|string',
                'hastag_text' => 'nullable|string',
                'hastag_button_icon' => 'nullable|string',
                'hastag_button_text' => 'nullable|string',
                'hastag_button_url' => 'nullable|string',

                'ig_active' => 'nullable|boolean',
                'ig_icon' => 'nullable|string',
                'ig_order' => 'nullable|string',
                'ig_tittle' => 'nullable|string',
                'ig_text' => 'nullable|string',
                'ig_button_icon' => 'nullable|string',
                'ig_button_text' => 'nullable|string',
                'ig_button_url' => 'nullable|string',

                'link_active' => 'nullable|boolean',
                'link_icon' => 'nullable|string',
                'link_order' => 'nullable|string',
                'link_tittle' => 'nullable|string',
                'link_text' => 'nullable|string',
                'link_button_icon' => 'nullable|string',
                'link_button_text' => 'nullable|string',
                'link_button_url' => 'nullable|string',
            ],
            'VIDEO' => [
                'pre_tittle' => 'nullable|string',
                'tittle' => 'nullable|string',
                'video_id' => 'nullable|string',
                'type_video' => 'nullable|string',
                'format' => 'nullable|string',
            ],
            'SUGGESTIONS' => [
                'pre_tittle' => 'nullable|string',
                'tittle' => 'nullable|string',
                'text' => 'nullable|string',
                'icon' => 'nullable|string',
                'suggestion_1' => 'nullable|string', 'link_1' => 'nullable|string',
                'suggestion_2' => 'nullable|string', 'link_2' => 'nullable|string',
                'suggestion_3' => 'nullable|string', 'link_3' => 'nullable|string',
                'suggestion_4' => 'nullable|string', 'link_4' => 'nullable|string',
                'suggestion_5' => 'nullable|string', 'link_5' => 'nullable|string',
                'suggestion_6' => 'nullable|string', 'link_6' => 'nullable|string',
                'suggestion_7' => 'nullable|string', 'link_7' => 'nullable|string',
                'suggestion_8' => 'nullable|string', 'link_8' => 'nullable|string',
            ],
            'GALERY' => [
                'icon' => 'nullable|string',
                'pre_tittle' => 'nullable|string',
                'tittle' => 'nullable|string',
                'galery_images' => 'nullable|array'
            ],
            'GIFTS' => [
                'icon' => 'nullable|string',
                'pre_tittle' => 'nullable|string',
                'background_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'module_image' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'button_icon' => 'nullable|string',
                'button_text' => 'nullable|string',
                'button_type' => 'nullable|string',
                'button_url' => 'nullable|string',
                'first_account_active' => 'nullable|boolean',
                'first_account_tittle' => 'nullable|string',
                'first_account_text' => 'nullable|string',
                'first_account_data' => 'nullable|string',
                'first_account_value' => 'nullable|string',
                'first_account_copy_button_text' => 'nullable|string',
                'first_account_copy_message' => 'nullable|string',
                'second_account_active' => 'nullable|boolean',
                'second_account_tittle' => 'nullable|string',
                'second_account_text' => 'nullable|string',
                'second_account_button_url' => 'nullable|string',
                'second_account_button_text' => 'nullable|string',
                'box_active' => 'nullable|boolean',
                'box_tittle' => 'nullable|string',
                'box_text' => 'nullable|string',
                'box_button_text' => 'nullable|string',
                'box_button_url' => 'nullable|string',
                'list_active' => 'nullable|boolean',
                'list_tittle' => 'nullable|string',
                'list_text' => 'nullable|string',
                'list_product_1' => 'nullable|string',
                'list_product_url_1' => 'nullable|string',
                'list_product_price_1' => 'nullable|string',
                'list_product_image_1' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'list_product_2' => 'nullable|string',
                'list_product_url_2' => 'nullable|string',
                'list_product_price_2' => 'nullable|string',
                'list_product_image_2' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'list_product_3' => 'nullable|string',
                'list_product_url_3' => 'nullable|string',
                'list_product_price_3' => 'nullable|string',
                'list_product_image_3' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'list_product_4' => 'nullable|string',
                'list_product_url_4' => 'nullable|string',
                'list_product_price_4' => 'nullable|string',
                'list_product_image_4' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'list_product_5' => 'nullable|string',
                'list_product_url_5' => 'nullable|string',
                'list_product_price_5' => 'nullable|string',
                'list_product_image_5' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
                'list_product_6' => 'nullable|string',
                'list_product_url_6' => 'nullable|string',
                'list_product_price_6' => 'nullable|string',
                'list_product_image_6' => [
                    'nullable',
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            ],
            'CONFIRMATION' => [
                'icon' => 'nullable|string',
                'pre_tittle' => 'nullable|string',
                'tittle' => 'nullable|string',
                'text' => 'nullable|string',
                'limit_date' => 'nullable|string',
                'card_active' => 'nullable|boolean',
                'card_tittle' => 'nullable|string',
                'card_text' => 'nullable|string',
                'card_button_text' => 'nullable|string',
                'form_active' => 'nullable|boolean',
                'form_button_text' => 'nullable|string',
                'form_button_url' => 'nullable|string',
                'form_text' => 'nullable|string',
                'form_ill_attend' => 'nullable|string',
                'form_ill_n_attend' => 'nullable|string',
                'form_name' => 'nullable|string',
                'form_email' => 'nullable|string',
                'form_phone' => 'nullable|string',
                'form_special_menu' => 'nullable|string',
                'form_nothing' => 'nullable|string',
                'form_menu1' => 'nullable|string',
                'form_menu2' => 'nullable|string',
                'form_menu3' => 'nullable|string',
                'form_menu4' => 'nullable|string',
                'form_menu5' => 'nullable|string',
                'form_transfer' => 'nullable|string',
                'form_option1' => 'nullable|string',
                'form_option2' => 'nullable|string',
                'form_option3' => 'nullable|string',
                'form_option4' => 'nullable|string',
                'form_companions' => 'nullable|string',
                'form_comments' => 'nullable|string',
                'form_thanks' => 'nullable|string',
                'form_errors' => 'nullable|string',
            ]
        };

        return $rules;
    }

    public static function updateModuleHandle(Invitation $invitation, string $name, array $data, ?string $displayName = null): array
    {
        $modules = $invitation->modules;
        $updateTask = function ($modules, $name, $data) use ($displayName): array{
            
            foreach($modules as $index => $item){

                if($displayName === null){
                    if($item['name'] == $name){
                        $modules[$index] = array_merge($modules[$index], $data);
                        break;
                    }
                } else {
                    if($item['name'] == $name && $item['display_name'] == $displayName){
                        $modules[$index] = array_merge($modules[$index], $data);
                        break;
                    }
                }
            }
            return $modules;
        };

        $updatedModules = match($name){
            'INTRO' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                if(!isset($data['stamp_image'])){
                    $invitation->media(self::INTRO['name'])->each(function ($media) {
                        $media->delete();
                    });
                }elseif(!is_string($data['stamp_image'])){
                    $invitation->media(self::INTRO['name'])->each(function ($media) {
                        $media->delete();
                    });
    
                    $invitation->addMedia($data['stamp_image'], self::INTRO['name'], $invitation->path_name);
                    $invitation->refresh();
                }

                return $updateTask($modules, $name, [
                    'stamp_image' => $invitation->media(self::INTRO['name'])->first()?->getMediaUrl()
                ]);
            })(),
           'MUSIC' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::MUSIC['name'])->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['song'])){
                    $invitation->addMedia($data['song'], self::MUSIC['name'], $invitation->path_name);
                    $invitation->refresh();
                }

                return $updateTask($modules, $name, [
                    'song' => $invitation->media(self::MUSIC['name'])->first()?->getMediaUrl()
                ]);
            })(),
            'FLOAT_BUTTON' => $updateTask($modules, $name, [
                'type_button' => $data['type_button'],
                'url_button' => $data['url_button'],
                'icon_button' => $data['icon_button']
            ]),
           'COVER' => (function () use ($invitation, $modules, $name, $data, $updateTask){

               
               if($data['format'] == 'Imagenes' || $data['format'] == 'Imagenes con marco'){
                    $invitation->media(self::COVER['name'].'/desktop_images')->each(function ($media) {
                        $media->delete();
                    });
                    $invitation->media(self::COVER['name'].'/mobile_images')->each(function ($media) {
                        $media->delete();
                    });

                    if(isset($data['desktop_images'])){
                        foreach($data['desktop_images'] as $image){
                            $invitation->addMedia($image, self::COVER['name'].'/desktop_images', $invitation->path_name);
                        }
                    }
                    if(isset($data['mobile_images'])){
                        foreach($data['mobile_images'] as $image){
                            $invitation->addMedia($image, self::COVER['name'].'/mobile_images', $invitation->path_name);
                        }                    
                    }

                }elseif($data['format'] == 'Diseño' || $data['format'] == 'Diseño con marco'){
                    $invitation->media(self::COVER['name'].'/desktop_design')->each(function ($media) {
                        $media->delete();
                    });
                    $invitation->media(self::COVER['name'].'/mobile_design')->each(function ($media) {
                        $media->delete();
                    });

                    if(isset($data['desktop_design'])) $invitation->addMedia($data['desktop_design'], self::COVER['name'].'/desktop_design', $invitation->path_name);
                    if(isset($data['mobile_design'])) $invitation->addMedia($data['mobile_design'], self::COVER['name'].'/mobile_design', $invitation->path_name);

                }elseif($data['format'] == 'Video' || $data['format'] == 'Video centrado'){
                    $invitation->media(self::COVER['name'].'/desktop_video')->each(function ($media) {
                        $media->delete();
                    });
                    $invitation->media(self::COVER['name'].'/mobile_video')->each(function ($media) {
                        $media->delete();
                    });

                    if(isset($data['desktop_video'])) $invitation->addMedia($data['desktop_video'], self::COVER['name'].'/desktop_video', $invitation->path_name);
                    if(isset($data['mobile_video'])) $invitation->addMedia($data['mobile_video'], self::COVER['name'].'/mobile_video', $invitation->path_name);
                }

                $invitation->media(self::COVER['name'].'/logo_cover')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::COVER['name'].'/central_image_cover')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['logo_cover'])) $invitation->addMedia($data['logo_cover'], self::COVER['name'].'/logo_cover', $invitation->path_name);
                if(isset($data['central_image_cover'])) $invitation->addMedia($data['central_image_cover'], self::COVER['name'].'/central_image_cover', $invitation->path_name);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'desktop_images' => $invitation->media(self::COVER['name'].'/desktop_images')->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray(),
                    'mobile_images' => $invitation->media(self::COVER['name'].'/mobile_images')->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray(),
                    'desktop_video' => $invitation->media(self::COVER['name'].'/desktop_video')->first()?->getMediaUrl(),
                    'mobile_video' => $invitation->media(self::COVER['name'].'/mobile_video')->first()?->getMediaUrl(),
                    'desktop_design' => $invitation->media(self::COVER['name'].'/desktop_design')->first()?->getMediaUrl(),
                    'mobile_design' => $invitation->media(self::COVER['name'].'/mobile_design')->first()?->getMediaUrl(),
                    'logo_cover' => $invitation->media(self::COVER['name'].'/logo_cover')->first()?->getMediaUrl(),
                    'central_image_cover' => $invitation->media(self::COVER['name'].'/central_image_cover')->first()?->getMediaUrl(),
                    'active_header' => $data['active_header'],
                    'active_logo' => $data['active_logo'],
                    'format' => $data['format'],
                    'names' => $data['names'],
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

                if(isset($data['image'])){
                    $invitation->addMedia($data['image'], self::WELCOME['name'], $invitation->path_name);
                    $invitation->refresh();
                }

                return $updateTask($modules, $name, [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'image' => $invitation->media(self::WELCOME['name'])->first()?->getMediaUrl()
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
                $module['civil']['button_url'] = $data['civil_button_url'] ?? '';
                $module['civil']['button_text'] = $data['civil_button_text'] ?? '';
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
                $module['ceremony']['button_url'] = $data['ceremony_button_url'] ?? '';
                $module['ceremony']['button_text'] = $data['ceremony_button_text'] ?? '';
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
                $module['party']['button_url'] = $data['party_button_url'] ?? '';
                $module['party']['button_text'] = $data['party_button_text'] ?? '';
                $module['party']['image'] = $invitation->media(self::EVENTS['name'].'/party')->first()?->getMediaUrl();
                $module['dresscode']['active'] = $data['dresscode_active'] ?? false;
                $module['dresscode']['event'] = $data['dresscode_event'] ?? '';
                $module['dresscode']['icon'] = $data['dresscode_icon'] ?? '';
                $module['dresscode']['order'] = $data['dresscode_order'] ?? '';
                $module['dresscode']['name'] = $data['dresscode_name'] ?? '';
                $module['dresscode']['detail'] = $data['dresscode_detail'] ?? '';
                $module['dresscode']['button_url'] = $data['dresscode_button_url'] ?? '';
                $module['dresscode']['button_text'] = $data['dresscode_button_text'] ?? '';
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
            'HISTORY' => (function () use ($invitation, $modules, $name, $data, $updateTask, $displayName){
                $invitation->media(self::HISTORY['name'])->where('file_path', 'like', '%'.$displayName.'%')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['image'])) $invitation->addMedia($data['image'], self::HISTORY['name'], $invitation->path_name.'/'.$displayName);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    /*'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_url' => $data['button_url'],*/
                    'image' => $invitation->media(self::HISTORY['name'])->where('file_path', 'like', '%'.$displayName.'%')->first()?->getMediaUrl()
                ]);
            })(),
            'INFO' => (function () use ($invitation, $modules, $name, $data, $updateTask, $displayName){
                $invitation->media(self::INFO['name'])->where('file_path', 'like', '%'.$displayName.'%')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['image'])) $invitation->addMedia($data['image'], self::INFO['name'], $invitation->path_name.'/'.$displayName);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'on_t_right' => $data['on_t_right'],
                    'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_url' => $data['button_url'],
                    'image' => $invitation->media(self::INFO['name'])->where('file_path', 'like', '%'.$displayName.'%')->first()?->getMediaUrl()
                ]);
            })(),
            'HIGHLIGHTS' => (function () use ($invitation, $modules, $name, $data, $updateTask, $displayName){
                $invitation->media(self::HIGHLIGHTS['name'])->where('file_path', 'like', '%'.$displayName.'%')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['image'])) $invitation->addMedia($data['image'], self::HIGHLIGHTS['name'], $invitation->path_name.'/'.$displayName);
                $invitation->refresh();

                return $updateTask($modules, $name, [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_url' => $data['button_url'],
                    'image' => $invitation->media(self::HIGHLIGHTS['name'])->where('file_path', 'like', '%'.$displayName.'%')->first()?->getMediaUrl()
                ]);
            })(),
            'INTERACTIVE' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                
                $module = [
                    'spotify' => [],
                    'hashtag' => [],
                    'ig' => [],
                    'link' => [],
                ]; 

                $module['spotify']['active'] = $data['spotify_active'] ?? false;
                $module['spotify']['icon'] = $data['spotify_icon'] ?? '';
                $module['spotify']['order'] = $data['spotify_order'] ?? '';
                $module['spotify']['tittle'] = $data['spotify_tittle'] ?? '';
                $module['spotify']['text'] = $data['spotify_text'] ?? '';
                $module['spotify']['button_icon'] = $data['spotify_button_icon'] ?? '';
                $module['spotify']['button_text'] = $data['spotify_button_text'] ?? '';
                $module['spotify']['button_url'] = $data['spotify_button_url'] ?? '';

                $module['hashtag']['active'] = $data['hashtag_active'] ?? false;
                $module['hashtag']['icon'] = $data['hashtag_icon'] ?? '';
                $module['hashtag']['order'] = $data['hashtag_order'] ?? '';
                $module['hashtag']['tittle'] = $data['hashtag_tittle'] ?? '';
                $module['hashtag']['text'] = $data['hashtag_text'] ?? '';
                $module['hashtag']['button_icon'] = $data['hashtag_button_icon'] ?? '';
                $module['hashtag']['button_text'] = $data['hashtag_button_text'] ?? '';
                $module['hashtag']['button_url'] = $data['hashtag_button_url'] ?? '';

                $module['ig']['active'] = $data['ig_active'] ?? false;
                $module['ig']['icon'] = $data['ig_icon'] ?? '';
                $module['ig']['order'] = $data['ig_order'] ?? '';
                $module['ig']['tittle'] = $data['ig_tittle'] ?? '';
                $module['ig']['text'] = $data['ig_text'] ?? '';
                $module['ig']['button_icon'] = $data['ig_button_icon'] ?? '';
                $module['ig']['button_text'] = $data['ig_button_text'] ?? '';
                $module['ig']['button_url'] = $data['ig_button_url'] ?? '';

                $module['link']['active'] = $data['link_active'] ?? false;
                $module['link']['icon'] = $data['link_icon'] ?? '';
                $module['link']['order'] = $data['link_order'] ?? '';
                $module['link']['tittle'] = $data['link_tittle'] ?? '';
                $module['link']['text'] = $data['link_text'] ?? '';
                $module['link']['button_icon'] = $data['link_button_icon'] ?? '';
                $module['link']['button_text'] = $data['link_button_text'] ?? '';
                $module['link']['button_url'] = $data['link_button_url'] ?? '';


                uasort($module, function ($a, $b) {
                    return ($a['order'] ?? PHP_INT_MAX) <=> ($b['order'] ?? PHP_INT_MAX);
                });
                            
                foreach($modules as $index => $item){
                    if($item['name'] == $name){
                        $modules[$index]['interactives'] = $module;
                        break;
                    }
                }
                return $modules;
            })(),
            'VIDEO' => $updateTask($modules, $name, [
                'pre_tittle' => $data['pre_tittle'],
                'tittle' => $data['tittle'],
                'video_id' => $data['video_id'],
                'type_video' => $data['type_video'],
                'format' => $data['format'],
            ]),
            'SUGGESTIONS' => $updateTask($modules, $name, [
                'pre_tittle' => $data['pre_tittle'],
                'tittle' => $data['tittle'],
                'text' => $data['text'],
                'icon' => $data['icon'],
                'suggestions' => [
                    ['suggestion_1' => $data['suggestion_1'], 'link_1' => $data['link_1']],
                    ['suggestion_2' => $data['suggestion_2'], 'link_2' => $data['link_2']],
                    ['suggestion_3' => $data['suggestion_3'], 'link_3' => $data['link_3']],
                    ['suggestion_4' => $data['suggestion_4'], 'link_4' => $data['link_4']],
                    ['suggestion_5' => $data['suggestion_5'], 'link_5' => $data['link_5']],
                    ['suggestion_6' => $data['suggestion_6'], 'link_6' => $data['link_6']],
                    ['suggestion_7' => $data['suggestion_7'], 'link_7' => $data['link_7']],
                    ['suggestion_8' => $data['suggestion_8'], 'link_8' => $data['link_8']],
                ]
            ]),
            'GALERY' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::GALERY['name'])->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['galery_images'])){
                    foreach($data['galery_images'] as $image){
                        $invitation->addMedia($image, self::GALERY['name'], $invitation->path_name);
                    }
                }
 
                return $updateTask($modules, $name, [
                    'galery_images' => $invitation->media(self::GALERY['name'])->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray(),
                    'pre_tittle' => $data['pre_tittle'],
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon']
                ]);
             })(),
            'GIFTS' => (function () use ($invitation, $modules, $name, $data, $updateTask){
                $invitation->media(self::GIFTS['name'].'/background')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/module')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['background_image'])) $invitation->addMedia($data['background_image'], self::GIFTS['name'].'/background', $invitation->path_name);

                if(isset($data['module_image'])) $invitation->addMedia($data['module_image'], self::GIFTS['name'].'/module', $invitation->path_name);

                $invitation->media(self::GIFTS['name'].'/product_1')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/product_2')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/product_3')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/product_4')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/product_5')->each(function ($media) {
                    $media->delete();
                });
                $invitation->media(self::GIFTS['name'].'/product_6')->each(function ($media) {
                    $media->delete();
                });

                if(isset($data['list_product_image_1'])){ 
                    $invitation->addMedia($data['list_product_image_1'], self::GIFTS['name'].'/product_1', $invitation->path_name);
                }
                if(isset($data['list_product_image_2'])){  
                    $invitation->addMedia($data['list_product_image_2'], self::GIFTS['name'].'/product_2', $invitation->path_name);
                }
                if(isset($data['list_product_image_3'])){ 
                    $invitation->addMedia($data['list_product_image_3'], self::GIFTS['name'].'/product_3', $invitation->path_name);
                }
                if(isset($data['list_product_image_4'])){ 
                    $invitation->addMedia($data['list_product_image_4'], self::GIFTS['name'].'/product_4', $invitation->path_name);
                }
                if(isset($data['list_product_image_5'])){ 
                    $invitation->addMedia($data['list_product_image_5'], self::GIFTS['name'].'/product_5', $invitation->path_name);
                }
                if(isset($data['list_product_image_6'])){ 
                    $invitation->addMedia($data['list_product_image_6'], self::GIFTS['name'].'/product_6', $invitation->path_name);
                }

                $invitation->refresh();


                return $updateTask($modules, $name, [
                    'icon' => $data['icon'],
                    'pre_tittle' => $data['pre_tittle'],
                    'background_image' => $invitation->media(self::GIFTS['name'].'/background')->first()?->getMediaUrl(),
                    'module_image' => $invitation->media(self::GIFTS['name'].'/module')->first()?->getMediaUrl(),
                    'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_type' => $data['button_type'],
                    'button_url' => $data['button_url'],
                    'first_account' => [
                        'active' => $data['first_account_active'],
                        'tittle' => $data['first_account_tittle'],
                        'text' => $data['first_account_text'],
                        'data' => $data['first_account_data'],
                        'value' => $data['first_account_value'],
                        'copy_button_text' => $data['first_account_copy_button_text'],
                        'copy_message' => $data['first_account_copy_message'],
                    ],
                    'second_account' => [
                        'active' => $data['second_account_active'],
                        'tittle' => $data['second_account_tittle'],
                        'text' => $data['second_account_text'],
                        'button_url' => $data['second_account_button_url'],
                        'button_text' => $data['second_account_button_text'],
                    ],
                    'box' => [
                        'active' => $data['box_active'],
                        'tittle' => $data['box_tittle'],
                        'text' => $data['box_text'],
                        'button_text' => $data['box_button_text'],
                        'button_url' => $data['box_button_url'],
                    ],
                    'list' => [
                        'active' => $data['list_active'],
                        'tittle' => $data['list_tittle'],
                        'text' => $data['list_text'],
                        'product_1' => $data['list_product_1'],
                        'product_url_1' => $data['list_product_url_1'],
                        'product_price_1' => $data['list_product_price_1'],
                        'product_image_1' => $invitation->media(self::GIFTS['name'].'/product_1')->first()?->getMediaUrl(),
                        'product_2' => $data['list_product_2'],
                        'product_url_2' => $data['list_product_url_2'],
                        'product_price_2' => $data['list_product_price_2'],
                        'product_image_2' => $invitation->media(self::GIFTS['name'].'/product_2')->first()?->getMediaUrl(),
                        'product_3' => $data['list_product_3'],
                        'product_url_3' => $data['list_product_url_3'],
                        'product_price_3' => $data['list_product_price_3'],
                        'product_image_3' => $invitation->media(self::GIFTS['name'].'/product_3')->first()?->getMediaUrl(),
                        'product_4' => $data['list_product_4'],
                        'product_url_4' => $data['list_product_url_4'],
                        'product_price_4' => $data['list_product_price_4'],
                        'product_image_4' => $invitation->media(self::GIFTS['name'].'/product_4')->first()?->getMediaUrl(),
                        'product_5' => $data['list_product_5'],
                        'product_url_5' => $data['list_product_url_5'],
                        'product_price_5' => $data['list_product_price_5'],
                        'product_image_5' => $invitation->media(self::GIFTS['name'].'/product_5')->first()?->getMediaUrl(),
                        'product_6' => $data['list_product_6'],
                        'product_url_6' => $data['list_product_url_6'],
                        'product_price_6' => $data['list_product_price_6'],
                        'product_image_6' => $invitation->media(self::GIFTS['name'].'/product_6')->first()?->getMediaUrl(),
                    ],
                ]);
            })(),
            'CONFIRMATION' => $updateTask($modules, $name, $data)
        };

        return $updatedModules;
    }
}
