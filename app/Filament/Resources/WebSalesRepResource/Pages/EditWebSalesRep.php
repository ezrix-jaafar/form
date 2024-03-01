<?php

namespace App\Filament\Resources\WebSalesRepResource\Pages;

use App\Filament\Resources\WebSalesRepResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebSalesRep extends EditRecord
{
    protected static string $resource = WebSalesRepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
