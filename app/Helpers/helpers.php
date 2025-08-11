<?php

use App\Enums\FontTypeEnum;
use App\Models\Font;

if (!function_exists("isMobile")) {
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}

if (!function_exists("getFont")) {
    function getFont($font): Font {
        $font = Font::where('font_name', $font)->first();
        if(!$font) {
            $font = new Font(['font_name' => '', 'font_url' => '']);
        }
        return $font;
    }
}

if (!function_exists("randomToken")) {
    function randomToken($length = 8): string
    {
        $charts = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_!?';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $token .= $charts[random_int(0, strlen($charts) - 1)];
        }

        return $token;
    }
}

if(!function_exists("urlParser")) {
    function urlParser(string $url): string
    {
        if (!preg_match('#^https?://#i', $url)) {
            return 'https://' . ltrim($url, '/');
        }

        return $url;
    }
}