<?php

namespace App\Handlers;

use App\Models\InvitationModule;
use App\Models\Module;
use App\Models\TemplateModule;

class GenericModuleHandler{

    const DATA = [];

    static function getMediaCollections(string $rootFolder, string $moduleFolder): array{
        return [];
    }

    static function cloneMedia($fromModule, $toModule) {
        $collections = $fromModule->media_collections;

        
        foreach($collections as $key => $collection) {

            if($toModule->type == GaleryModuleHandler::TYPE || $toModule->type == CoverModuleHandler::TYPE){
                if(is_array($toModule->data[$key])) {
                    $data = $toModule->data;
                    $data[$key] = [];
                    $toModule->data = $data;
                    $toModule->save();
                }
            }

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

    static function cloneDataWithTemplate(TemplateModule $tModule, InvitationModule $oldModule, InvitationModule $newModule) {
        $newData = self::mergePriorityFirst($oldModule->data, $tModule->data);
        $newModule->data = $newData;
        $newModule->save();
    }

    static function mergePriorityFirst(array $oldData, array $tData): array {
        foreach ($tData as $key => $value) {
            if (array_key_exists($key, $oldData)) {
                if (is_array($oldData[$key]) && is_array($value)) {
                    $oldData[$key] = self::mergePriorityFirst($oldData[$key], $value);
                } elseif ($oldData[$key] === null || $oldData[$key] === '') {
                    $oldData[$key] = $value;
                }
            } else {
                $oldData[$key] = $value;
            }
        }
        return $oldData;
    }
}