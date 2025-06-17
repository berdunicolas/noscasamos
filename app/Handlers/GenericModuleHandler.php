<?php

namespace App\Handlers;

class GenericModuleHandler{

    const DATA = [];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [];
    }

    static function cloneMedia($fromModule, $toModule) {
        $collections = $fromModule->media_collections;
        
        foreach($collections as $key => $collection) {
            $fromModule->media($collection)->get()->each(function ($media) use ($toModule, $key) {
                $file = $media->getFile();
                if ($file) {
                    $newMedia = $toModule->addMedia($file, $toModule->media_collections[$key]);

                    $data = $toModule->data;
                    if(isset($data[$key])){
                        if(is_array($data[$key])){
                            $data[$key][] = $newMedia->getMediaUrl();
                        }else{
                            $data[$key] = $newMedia->getMediaUrl();
                        }
                    }else{
                        $keys = explode('_', $key, 2);
                        $data[$keys[0]][$keys[1]] = $newMedia->getMediaUrl();
                    }

                    $toModule->data = $data;
                    $toModule->save();
                }
            });
        }
    }
}