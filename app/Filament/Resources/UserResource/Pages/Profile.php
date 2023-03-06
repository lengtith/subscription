<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use RyanChandler\FilamentProfile\Pages\Profile as BaseProfile;

class Profile extends BaseProfile
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.profile';
}
