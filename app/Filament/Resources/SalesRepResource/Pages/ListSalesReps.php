<?php

namespace App\Filament\Resources\SalesRepResource\Pages;

use App\Filament\Resources\SalesRepResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesReps extends ListRecords
{
    protected static string $resource = SalesRepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
