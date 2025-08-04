<?php

namespace App\Handlers;

use App\Models\Invitation;
use App\Enums\PlanTypeEnum;
use App\Enums\ModuleTypeEnum;
use App\Models\Module;
use App\Handlers\InfoModuleHandler;
use App\Handlers\CoverModuleHandler;
use App\Handlers\GiftsModuleHandler;
use App\Handlers\GuestModuleHandler;
use App\Handlers\IntroModuleHandler;
use App\Handlers\MusicModuleHandler;
use App\Handlers\VideoModuleHandler;
use App\Handlers\EventsModuleHandler;
use App\Handlers\GaleryModuleHandler;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\File;
use App\Handlers\HistoryModuleHandler;
use App\Handlers\WelcomeModuleHandler;
use App\Handlers\SaveDateModuleHandler;
use App\Handlers\HighlightsModuleHandler;
use App\View\Components\ModuleForms\Info;
use App\Handlers\FloatButtonModuleHandler;
use App\Handlers\InteractiveModuleHandler;
use App\Handlers\SuggestionsModuleHandler;
use App\View\Components\ModuleForms\Cover;
use App\View\Components\ModuleForms\Gifts;
use App\View\Components\ModuleForms\Guest;
use App\View\Components\ModuleForms\Intro;
use App\View\Components\ModuleForms\Music;
use App\View\Components\ModuleForms\Video;
use App\Handlers\ConfirmationModuleHandler;
use App\View\Components\ModuleForms\Events;
use App\View\Components\ModuleForms\Galery;
use App\View\Components\Modules\InfoModule;
use App\View\Components\ModuleForms\History;
use App\View\Components\ModuleForms\Welcome;
use App\View\Components\Modules\CoverModule;
use App\View\Components\Modules\GiftsModule;
use App\View\Components\Modules\GuestModule;
use App\View\Components\Modules\IntroModule;
use App\View\Components\Modules\MusicModule;
use App\View\Components\Modules\VideoModule;
use App\View\Components\ModuleForms\SaveDate;
use App\View\Components\Modules\EventsModule;
use App\View\Components\Modules\GaleryModule;
use App\View\Components\Modules\HistoryModule;
use App\View\Components\Modules\WelcomeModule;
use App\View\Components\ModuleForms\Highlights;
use App\View\Components\Modules\SaveDateModule;
use App\View\Components\ModuleForms\FloatButton;
use App\View\Components\ModuleForms\Interactive;
use App\View\Components\ModuleForms\Suggestions;
use App\View\Components\ModuleForms\Confirmation;
use App\View\Components\ModuleForms\Foot;
use App\View\Components\Modules\HighlightsModule;
use App\View\Components\Modules\FloatButtonModule;
use App\View\Components\Modules\InteractiveModule;
use App\View\Components\Modules\SuggestionsModule;
use App\View\Components\Modules\ConfirmationModule;
use App\View\Components\Modules\FootModule;

class ModuleHandler {

    const INTRO = IntroModuleHandler::class;
    const MUSIC = MusicModuleHandler::class;
    const FLOAT_BUTTON = FloatButtonModuleHandler::class;
    const COVER = CoverModuleHandler::class;
    const WELCOME = WelcomeModuleHandler::class;
    const GUEST = GuestModuleHandler::class;
    const SAVE_DATE = SaveDateModuleHandler::class;
    const EVENTS = EventsModuleHandler::class;
    const HISTORY = HistoryModuleHandler::class;
    const INTERACTIVE = InteractiveModuleHandler::class;
    const VIDEO = VideoModuleHandler::class;
    const GALERY = GaleryModuleHandler::class;
    const INFO = InfoModuleHandler::class;
    const SUGGESTIONS = SuggestionsModuleHandler::class;
    const GIFTS = GiftsModuleHandler::class;
    const CONFIRMATION = ConfirmationModuleHandler::class;
    const HIGHLIGHTS = HighlightsModuleHandler::class;
    const FOOT = FootModuleHandler::class;


    public static function getHandlersByPlan(PlanTypeEnum $plan): array
    {
        return match($plan) {
            PlanTypeEnum::CLÁSICO => self::classicHandlers(),
            PlanTypeEnum::PLATINO => self::platinumHandlers(),
            PlanTypeEnum::GOLD => self::goldHandlers(),
        };
    }

    public static function availableModules(array $modules): array
    {
        $fullModules = ModuleTypeEnum::typesAndDisplayNames();

        $result = [];

        foreach($fullModules as $module){
            if(!in_array($module, $modules)){
                $result[] = $module;
            }
        }

        $newModules = array_column($result, 'type');
        $alwaysAvailable = [
            ['type' => ModuleTypeEnum::INFO, 'display_name' => ModuleTypeEnum::getDisplayName(ModuleTypeEnum::INFO)],
            ['type' => ModuleTypeEnum::HIGHLIGHTS, 'display_name' => ModuleTypeEnum::getDisplayName(ModuleTypeEnum::HIGHLIGHTS)],
            ['type' => ModuleTypeEnum::HISTORY, 'display_name' => ModuleTypeEnum::getDisplayName(ModuleTypeEnum::HISTORY)],
        ];

        foreach ($alwaysAvailable as $item) {
            if (!in_array($item['type'], $newModules)) {
                $result[] = $item;
                $newModules[] = $item['type'];
            }
        }
        return $result;
    }

    public static function classicHandlers(): array
    {
        return array_filter(self::values(), fn($handler) => $handler::PLAN === PlanTypeEnum::CLÁSICO->value || $handler::PLAN === 'default');
    }

    public static function platinumHandlers(): array
    {
        return array_filter(self::values(), fn($handler) => $handler::PLAN === PlanTypeEnum::CLÁSICO->value || $handler::PLAN === PlanTypeEnum::PLATINO->value || $handler::PLAN === 'default');
    }

    public static function goldHandlers(): array
    {
        return self::values();
    }    

    public static function values(): array
    {
        return array_values((new \ReflectionClass(self::class))->getConstants());
    }

    public static function getModuleForm(Module $module) {
        $form = match($module->type){
            ModuleTypeEnum::INTRO => new Intro($module),
            ModuleTypeEnum::MUSIC => new Music($module),
            ModuleTypeEnum::FLOAT_BUTTON => new FloatButton($module),
            ModuleTypeEnum::COVER => new Cover($module, $module->invitation?->host_names ?? ''),
            ModuleTypeEnum::GUEST => new Guest($module),
            ModuleTypeEnum::SAVE_DATE => new SaveDate($module),
            ModuleTypeEnum::WELCOME => new Welcome($module),
            ModuleTypeEnum::EVENTS => new Events($module),
            ModuleTypeEnum::HISTORY => new History($module),
            ModuleTypeEnum::INFO => new Info($module),
            ModuleTypeEnum::HIGHLIGHTS => new Highlights($module),
            ModuleTypeEnum::INTERACTIVE => new Interactive($module),
            ModuleTypeEnum::VIDEO => new Video($module),
            ModuleTypeEnum::SUGGESTIONS => new Suggestions($module),
            ModuleTypeEnum::GALERY => new Galery($module),
            ModuleTypeEnum::GIFTS => new Gifts($module),
            ModuleTypeEnum::CONFIRMATION => new Confirmation($module),
            ModuleTypeEnum::FOOT => new Foot($module),
        };

        return Blade::renderComponent($form);
    }

    public static function getModuleComponent(Module $module, Invitation $invitation) {

        $module = match($module->type->value){
            'INTRO' => new IntroModule($module, $invitation->style->value),
            'MUSIC' => new MusicModule($module),
            'FLOAT_BUTTON' => new FloatButtonModule(
                $module,
                $invitation->modules()->where('type', ModuleTypeEnum::CONFIRMATION->value)->first(),
                $invitation->color,
            ),
            'COVER' => new CoverModule($module, $invitation->host_names, $invitation->meta_title, $invitation->color, $invitation->background_color),
            'GUEST' => new GuestModule($module),
            'SAVE_DATE' => new SaveDateModule(
                $module,
                $invitation->calendar_title,
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
            'FOOT' => new FootModule(
                $module,
            ),
        };

        return Blade::renderComponent($module);
    }

    public static function getModuleRequestRules(Module $module): array
    {
        $rules = match($module->type->value){
            'INTRO' => [
                'stamp_image' => [
                    'nullable',
                    File::image()
                        ->types(['jpeg', 'png', 'jpg'])
                        ->max(2048)
                ]
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
                'date_text' => 'nullable|string',
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
                'civil_month' => 'nullable|string',
                'civil_time' => 'nullable|string',
                'civil_hr_translation' => 'nullable|string',
                'civil_name' => 'nullable|string',
                'civil_detail' => 'nullable|string',
                'civil_button_url' => 'nullable|string',
                'civil_button_text' => 'nullable|string',
                'civil_use_image' => 'nullable|boolean',
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
                'ceremony_month' => 'nullable|string',
                'ceremony_time' => 'nullable|string',
                'ceremony_hr_translation' => 'nullable|string',
                'ceremony_name' => 'nullable|string',
                'ceremony_detail' => 'nullable|string',
                'ceremony_button_url' => 'nullable|string',
                'ceremony_button_text' => 'nullable|string',
                'ceremony_use_image' => 'nullable|boolean',
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
                'party_month' => 'nullable|string',
                'party_time' => 'nullable|string',
                'party_hr_translation' => 'nullable|string',
                'party_name' => 'nullable|string',
                'party_detail' => 'nullable|string',
                'party_button_url' => 'nullable|string',
                'party_button_text' => 'nullable|string',
                'party_use_image' => 'nullable|boolean',
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
                'dresscode_use_image' => 'nullable|boolean',
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
                /*'button_icon' => 'nullable|string',
                'button_text' => 'nullable|string',
                'button_url' => 'nullable|string',*/
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
                /*'button_icon' => 'nullable|string',
                'button_text' => 'nullable|string',
                'button_url' => 'nullable|string',*/
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

                'hashtag_active' => 'nullable|boolean',
                'hashtag_icon' => 'nullable|string',
                'hashtag_order' => 'nullable|string',
                'hashtag_tittle' => 'nullable|string',
                'hashtag_text' => 'nullable|string',
                'hashtag_button_icon' => 'nullable|string',
                'hashtag_button_text' => 'nullable|string',
                'hashtag_button_url' => 'nullable|string',

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
                'suggestion_9' => 'nullable|string', 'link_9' => 'nullable|string',
                'suggestion_10' => 'nullable|string', 'link_10' => 'nullable|string',
                'suggestion_11' => 'nullable|string', 'link_11' => 'nullable|string',
                'suggestion_12' => 'nullable|string', 'link_12' => 'nullable|string',
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
                'text' => 'nullable|string',
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
                //'button_icon' => 'nullable|string',
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
                'card_button_url' => 'nullable|string',
                'form_active' => 'nullable|boolean',
                'form_type' => 'nullable|string',
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
            ],
            'FOOT' => [
                'foot_text' => 'required|string',
            ],
        };

        return $rules;
    }
    

    public static function updateModuleHandle(Module $module, array $data): array
    {
        $updateMediaTask = function (array $collections, array $data) use ($module) {
            foreach($collections as $key => $collection){
                $module->media($collection)->each(function ($media) {
                    $media->delete();
                });

                if(isset($data[$key])){
                    if(is_array($data[$key])){
                        foreach($data[$key] as $media){
                            $module->addMedia($media, $collection);
                        }
                    }else{
                        $module->addMedia($data[$key], $collection);
                    }
                    $module->refresh();
                }
            }
        };

        return match($module->type->value){
            'INTRO' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'stamp_image' => $module->media($module->media_collections['stamp_image'])->first()?->getMediaUrl()
                ];
            })(),
           'MUSIC' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'song' => $module->media($module->media_collections['song'])->first()?->getMediaUrl()
                ];
            })(),
            'FLOAT_BUTTON' => [
                'type_button' => $data['type_button'],
                'url_button' => $data['url_button'],
                'icon_button' => $data['icon_button']
            ],
           'COVER' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'desktop_images' => $module->media($module->media_collections['desktop_images']?? '')?->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray() ?? [],
                    'mobile_images' => $module->media($module->media_collections['mobile_images']?? '')?->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray() ?? [],
                    'desktop_video' => $module->media($module->media_collections['desktop_video']?? '')?->first()?->getMediaUrl(),
                    'mobile_video' => $module->media($module->media_collections['mobile_video']?? '')?->first()?->getMediaUrl(),
                    'desktop_design' => $module->media($module->media_collections['desktop_design']?? '')?->first()?->getMediaUrl(),
                    'mobile_design' => $module->media($module->media_collections['mobile_design']?? '')?->first()?->getMediaUrl(),
                    'logo_cover' => $module->media($module->media_collections['logo_cover']?? '')?->first()?->getMediaUrl(),
                    'central_image_cover' => $module->media($module->media_collections['central_image_cover']?? '')?->first()?->getMediaUrl(),
                    'active_header' => $data['active_header'],
                    'active_logo' => $data['active_logo'],
                    'active_central' => $data['active_central'],
                    'format' => $data['format'],
                    'names' => $data['names'],
                    'tittle' => $data['tittle'],
                    'detail' => $data['detail'],
                    'text_color_cover' => $data['text_color_cover'],
                ];
            })(),
            'GUEST' => [
                'tittle' => $data['tittle'],
                'icon' => $data['icon'],
                'signs' => $data['signs']
            ],
            'SAVE_DATE' => [
                'tittle' => $data['tittle'],
                'icon' => $data['icon'],
                'text_button' => $data['text_button'],
                'is_countdown' => $data['is_countdown'] ? true : false,
                'days_tanslation' => $data['days_tanslation'],
                'hr_tanslation' => $data['hr_tanslation'],
                'min_translation' => $data['min_translation'],
                'sec_translation' => $data['sec_translation'],
                'date_text' => $data['date_text'],
            ],
            'WELCOME' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'image' => $module->media($module->media_collections['image'] ?? '')?->first()?->getMediaUrl()
                ];
            })(),
            'EVENTS' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                $moduleData = [
                    'civil' => [],
                    'ceremony' => [],
                    'party' => [],
                    'dresscode' => [],
                ]; 

                $moduleData['civil']['active'] = $data['civil_active'] ?? false;
                $moduleData['civil']['event'] = $data['civil_event'] ?? '';
                $moduleData['civil']['icon'] = $data['civil_icon'] ?? '';
                $moduleData['civil']['order'] = $data['civil_order'] ?? '';
                $moduleData['civil']['date'] = $data['civil_date'] ?? '';
                $moduleData['civil']['month'] = $data['civil_month'] ?? '';
                $moduleData['civil']['time'] = $data['civil_time'] ?? '';
                $moduleData['civil']['hr_translation'] = $data['civil_hr_translation'] ?? '';
                $moduleData['civil']['name'] = $data['civil_name'] ?? '';
                $moduleData['civil']['detail'] = $data['civil_detail'] ?? '';
                $moduleData['civil']['button_url'] = $data['civil_button_url'] ?? '';
                $moduleData['civil']['button_text'] = $data['civil_button_text'] ?? '';
                $moduleData['civil']['use_image'] = $data['civil_use_image'] ?? false;
                $moduleData['civil']['image'] = $module->media($module->media_collections['civil_image']?? '')?->first()?->getMediaUrl();
                $moduleData['ceremony']['active'] = $data['ceremony_active'] ?? false;
                $moduleData['ceremony']['event'] = $data['ceremony_event'] ?? '';
                $moduleData['ceremony']['icon'] = $data['ceremony_icon'] ?? '';
                $moduleData['ceremony']['order'] = $data['ceremony_order'] ?? '';
                $moduleData['ceremony']['date'] = $data['ceremony_date'] ?? '';
                $moduleData['ceremony']['month'] = $data['ceremony_month'] ?? '';
                $moduleData['ceremony']['time'] = $data['ceremony_time'] ?? '';
                $moduleData['ceremony']['hr_translation'] = $data['ceremony_hr_translation'] ?? '';
                $moduleData['ceremony']['name'] = $data['ceremony_name'] ?? '';
                $moduleData['ceremony']['detail'] = $data['ceremony_detail'] ?? '';
                $moduleData['ceremony']['button_url'] = $data['ceremony_button_url'] ?? '';
                $moduleData['ceremony']['button_text'] = $data['ceremony_button_text'] ?? '';
                $moduleData['ceremony']['use_image'] = $data['ceremony_use_image'] ?? false;
                $moduleData['ceremony']['image'] = $module->media($module->media_collections['ceremony_image']?? '')?->first()?->getMediaUrl();
                $moduleData['party']['active'] = $data['party_active'] ?? false;
                $moduleData['party']['event'] = $data['party_event'] ?? '';
                $moduleData['party']['icon'] = $data['party_icon'] ?? '';
                $moduleData['party']['order'] = $data['party_order'] ?? '';
                $moduleData['party']['date'] = $data['party_date'] ?? '';
                $moduleData['party']['month'] = $data['party_month'] ?? '';
                $moduleData['party']['time'] = $data['party_time'] ?? '';
                $moduleData['party']['hr_translation'] = $data['party_hr_translation'] ?? '';
                $moduleData['party']['name'] = $data['party_name'] ?? '';
                $moduleData['party']['detail'] = $data['party_detail'] ?? '';
                $moduleData['party']['button_url'] = $data['party_button_url'] ?? '';
                $moduleData['party']['button_text'] = $data['party_button_text'] ?? '';
                $moduleData['party']['use_image'] = $data['party_use_image'] ?? false;
                $moduleData['party']['image'] = $module->media($module->media_collections['party_image']?? '')?->first()?->getMediaUrl();
                $moduleData['dresscode']['active'] = $data['dresscode_active'] ?? false;
                $moduleData['dresscode']['event'] = $data['dresscode_event'] ?? '';
                $moduleData['dresscode']['icon'] = $data['dresscode_icon'] ?? '';
                $moduleData['dresscode']['order'] = $data['dresscode_order'] ?? '';
                $moduleData['dresscode']['name'] = $data['dresscode_name'] ?? '';
                $moduleData['dresscode']['detail'] = $data['dresscode_detail'] ?? '';
                $moduleData['dresscode']['button_url'] = $data['dresscode_button_url'] ?? '';
                $moduleData['dresscode']['button_text'] = $data['dresscode_button_text'] ?? '';
                $moduleData['dresscode']['use_image'] = $data['dresscode_use_image'] ?? false;
                $moduleData['dresscode']['image'] = $module->media($module->media_collections['dresscode_image']?? '')?->first()?->getMediaUrl();

                uasort($moduleData, function ($a, $b) {
                    return ($a['order'] ?? PHP_INT_MAX) <=> ($b['order'] ?? PHP_INT_MAX);
                });
                return $moduleData;
            })(),
            'HISTORY' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'image' => $module->media($module->media_collections['image']?? '')?->first()?->getMediaUrl()
                ];
            })(),
            'INFO' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    'on_t_right' => $data['on_t_right'],
                    /*'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_url' => $data['button_url'],*/
                    'image' => $module->media($module->media_collections['image']?? '')?->first()?->getMediaUrl()
                ];
            })(),
            'HIGHLIGHTS' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                return [
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon'],
                    'text' => $data['text'],
                    /*'button_icon' => $data['button_icon'],
                    'button_text' => $data['button_text'],
                    'button_url' => $data['button_url'],*/
                    'image' => $module->media($module->media_collections['image']?? '')?->first()?->getMediaUrl()
                ];
            })(),
            'INTERACTIVE' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);

                $moduleData = [
                    'spotify' => [],
                    'hashtag' => [],
                    'ig' => [],
                    'link' => [],
                ]; 

                $moduleData['spotify']['active'] = $data['spotify_active'] ?? false;
                $moduleData['spotify']['icon'] = $data['spotify_icon'] ?? '';
                $moduleData['spotify']['order'] = $data['spotify_order'] ?? '';
                $moduleData['spotify']['tittle'] = $data['spotify_tittle'] ?? '';
                $moduleData['spotify']['text'] = $data['spotify_text'] ?? '';
                $moduleData['spotify']['button_icon'] = $data['spotify_button_icon'] ?? '';
                $moduleData['spotify']['button_text'] = $data['spotify_button_text'] ?? '';
                $moduleData['spotify']['button_url'] = $data['spotify_button_url'] ?? '';

                $moduleData['hashtag']['active'] = $data['hashtag_active'] ?? false;
                $moduleData['hashtag']['icon'] = $data['hashtag_icon'] ?? '';
                $moduleData['hashtag']['order'] = $data['hashtag_order'] ?? '';
                $moduleData['hashtag']['tittle'] = $data['hashtag_tittle'] ?? '';
                $moduleData['hashtag']['text'] = $data['hashtag_text'] ?? '';
                $moduleData['hashtag']['button_icon'] = $data['hashtag_button_icon'] ?? '';
                $moduleData['hashtag']['button_text'] = $data['hashtag_button_text'] ?? '';
                $moduleData['hashtag']['button_url'] = $data['hashtag_button_url'] ?? '';

                $moduleData['ig']['active'] = $data['ig_active'] ?? false;
                $moduleData['ig']['icon'] = $data['ig_icon'] ?? '';
                $moduleData['ig']['order'] = $data['ig_order'] ?? '';
                $moduleData['ig']['tittle'] = $data['ig_tittle'] ?? '';
                $moduleData['ig']['text'] = $data['ig_text'] ?? '';
                $moduleData['ig']['button_icon'] = $data['ig_button_icon'] ?? '';
                $moduleData['ig']['button_text'] = $data['ig_button_text'] ?? '';
                $moduleData['ig']['button_url'] = $data['ig_button_url'] ?? '';

                $moduleData['link']['active'] = $data['link_active'] ?? false;
                $moduleData['link']['icon'] = $data['link_icon'] ?? '';
                $moduleData['link']['order'] = $data['link_order'] ?? '';
                $moduleData['link']['tittle'] = $data['link_tittle'] ?? '';
                $moduleData['link']['text'] = $data['link_text'] ?? '';
                $moduleData['link']['button_icon'] = $data['link_button_icon'] ?? '';
                $moduleData['link']['button_text'] = $data['link_button_text'] ?? '';
                $moduleData['link']['button_url'] = $data['link_button_url'] ?? '';


                uasort($moduleData, function ($a, $b) {
                    return ($a['order'] ?? PHP_INT_MAX) <=> ($b['order'] ?? PHP_INT_MAX);
                });

                return $moduleData;
            })(),
            'VIDEO' => [
                'pre_tittle' => $data['pre_tittle'],
                'tittle' => $data['tittle'],
                'video_id' => $data['video_id'],
                'type_video' => $data['type_video'],
                'format' => $data['format'],
            ],
            'SUGGESTIONS' => [
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
                    ['suggestion_9' => $data['suggestion_9'], 'link_9' => $data['link_9']],
                    ['suggestion_10' => $data['suggestion_10'], 'link_10' => $data['link_10']],
                    ['suggestion_11' => $data['suggestion_11'], 'link_11' => $data['link_11']],
                    ['suggestion_12' => $data['suggestion_12'], 'link_12' => $data['link_12']],
                ]
            ],
            'GALERY' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);
 
                return [
                    'galery_images' => $module->media($module->media_collections['galery_images']?? '')?->get()?->map(function ($media) {
                        return $media->getMediaUrl();
                    })->toArray() ?? [],
                    'pre_tittle' => $data['pre_tittle'],
                    'tittle' => $data['tittle'],
                    'icon' => $data['icon']
                ];
             })(),
            'GIFTS' => (function () use ($module, $updateMediaTask, $data){
                $updateMediaTask($module->media_collections, $data);


                return [
                    'icon' => $data['icon'],
                    'pre_tittle' => $data['pre_tittle'],
                    'text' => $data['text'],
                    'background_image' => $module->media($module->media_collections['background_image']?? '')?->first()?->getMediaUrl(),
                    'module_image' => $module->media($module->media_collections['module_image']?? '')?->first()?->getMediaUrl(),
                    //'button_icon' => $data['button_icon'],
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
                        'product_image_1' => $module->media($module->media_collections['list_product_image_1']?? '')?->first()?->getMediaUrl(),
                        'product_2' => $data['list_product_2'],
                        'product_url_2' => $data['list_product_url_2'],
                        'product_price_2' => $data['list_product_price_2'],
                        'product_image_2' => $module->media($module->media_collections['list_product_image_2']?? '')?->first()?->getMediaUrl(),
                        'product_3' => $data['list_product_3'],
                        'product_url_3' => $data['list_product_url_3'],
                        'product_price_3' => $data['list_product_price_3'],
                        'product_image_3' => $module->media($module->media_collections['list_product_image_3']?? '')?->first()?->getMediaUrl(),
                        'product_4' => $data['list_product_4'],
                        'product_url_4' => $data['list_product_url_4'],
                        'product_price_4' => $data['list_product_price_4'],
                        'product_image_4' => $module->media($module->media_collections['list_product_image_4']?? '')?->first()?->getMediaUrl(),
                        'product_5' => $data['list_product_5'],
                        'product_url_5' => $data['list_product_url_5'],
                        'product_price_5' => $data['list_product_price_5'],
                        'product_image_5' => $module->media($module->media_collections['list_product_image_5']?? '')?->first()?->getMediaUrl(),
                        'product_6' => $data['list_product_6'],
                        'product_url_6' => $data['list_product_url_6'],
                        'product_price_6' => $data['list_product_price_6'],
                        'product_image_6' => $module->media($module->media_collections['list_product_image_6']?? '')?->first()?->getMediaUrl(),
                    ],
                ];
            })(),
            'CONFIRMATION' => $data,
            'FOOT' => $data,
        };
    }
}