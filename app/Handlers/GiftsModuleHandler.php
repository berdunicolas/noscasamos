<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class GiftsModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::GIFTS;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::CLÁSICO->value;

    const DATA = [
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

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'background_image' => $rootFolder . '/' . $moduleFolder . '/background_image',
            'module_image' => $rootFolder . '/' . $moduleFolder . '/module_image',
            'list_product_image_1' => $rootFolder . '/' . $moduleFolder . '/list_product_image_1',
            'list_product_image_2' => $rootFolder . '/' . $moduleFolder . '/list_product_image_2',
            'list_product_image_3' => $rootFolder . '/' . $moduleFolder . '/list_product_image_3',
            'list_product_image_4' => $rootFolder . '/' . $moduleFolder . '/list_product_image_4',
            'list_product_image_5' => $rootFolder . '/' . $moduleFolder . '/list_product_image_5',
            'list_product_image_6' => $rootFolder . '/' . $moduleFolder . '/list_product_image_6',
        ];
    }
}