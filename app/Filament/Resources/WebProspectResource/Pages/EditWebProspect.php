<?php

namespace App\Filament\Resources\WebProspectResource\Pages;

use App\Filament\Resources\WebProspectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebProspect extends EditRecord
{
    protected static string $resource = WebProspectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
