<?php

namespace App\Filament\Resources\RightNowItems\Pages;

use App\Filament\Resources\RightNowItems\RightNowItemsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageRightNowItems extends ManageRecords
{
    protected static string $resource = RightNowItemsResource::class;
}
