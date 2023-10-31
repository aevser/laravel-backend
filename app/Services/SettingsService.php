<?php

namespace App\Services\SettingsService;
use Spatie\Valuestore\Valuestore;

class SettingsService{
    
    private $data;

    public function __construct($data){

        $this->data = $data;

        $valuestore = Valuestore::make(storage_path('app/settings.json'));

    }

}