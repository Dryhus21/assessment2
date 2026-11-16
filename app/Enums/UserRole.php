<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Warga = 'warga';
    
    public function label(): string
    {
        return match ($this) {
            self::Admin => 'admin',
            self::Warga => 'warga',
        };
    }
    public function badgeClass(): string
    {
        return match ($this) {
            self::Admin => 'text-bg-primary',
            self::Warga => 'text-bg-secondary',
        };
    }
}
