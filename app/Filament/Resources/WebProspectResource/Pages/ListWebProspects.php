<?php

namespace App\Filament\Resources\WebProspectResource\Pages;

use App\Filament\Resources\WebProspectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebProspects extends ListRecords
{
    protected static string $resource = WebProspectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
