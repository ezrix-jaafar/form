<?php

namespace App\Filament\Resources\WebSalesRepResource\Pages;

use App\Filament\Resources\WebSalesRepResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebSalesReps extends ListRecords
{
    protected static string $resource = WebSalesRepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
