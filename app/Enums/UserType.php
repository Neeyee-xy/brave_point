<?php

namespace App\Enums;

Enum UserType: string implements Base
{
    case ADMIN = 'Admin';
    case CLIENT = 'Client';
  

    public function title(): string
    {
        return match($this){
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
           
        };
    }

    public function icon(): string
    {
        return match($this){
            self::ADMIN => '',
            self::CLIENT => '',
           
        };
    }

    public function description(): string
    {
        return match($this){
            self::ADMIN => '',
            self::CLIENT => '',
     
        };
    }
}
