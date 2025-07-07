<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class CoverModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::COVER;
    const ACTIVE = true;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
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

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [
            'desktop_images' => $rootFolder . '/' . $moduleFolder . '/desktop_images',
            'mobile_images' => $rootFolder . '/' . $moduleFolder . '/mobile_images',
            'desktop_design' => $rootFolder . '/' . $moduleFolder . '/desktop_design',
            'mobile_design' => $rootFolder . '/' . $moduleFolder . '/mobile_design',
            'desktop_video' => $rootFolder . '/' . $moduleFolder . '/desktop_video',
            'mobile_video' => $rootFolder . '/' . $moduleFolder . '/mobile_video',
            'logo_cover' => $rootFolder . '/' . $moduleFolder . '/logo_cover',
            'central_image_cover' => $rootFolder . '/' . $moduleFolder . '/central_image_cover',
        ];
    }
}