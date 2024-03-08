<?php

class Settings
{
    
    public static function getSettings()
    {
        return parse_ini_file(__DIR__ . '/../config/settings.ini');
    }
}