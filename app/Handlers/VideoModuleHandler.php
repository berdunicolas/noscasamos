<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class VideoModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::VIDEO;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
        'pre_tittle' => 'Video',
        'tittle' => '',
        'video_id' => '',
        'type_video' => '',
        'format' => '',
    ];
}