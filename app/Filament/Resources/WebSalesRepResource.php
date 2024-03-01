<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebSalesRepResource\Pages;
use App\Filament\Resources\WebSalesRepResource\RelationManagers;
use App\Models\WebSalesRep;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebSalesRepResource extends Resource
{
    protected static ?string $model = WebSalesRep::class;

    protected static ?string $navigationGroup = 'Website Form';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Sales Rep Details')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('whatsapp')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(2),
                    ])->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('prospects_count')
                    ->label('Number of Leads')
                    ->getStateUsing(function (WebSalesRep $websalesRep) {
                        return $websalesRep->webprospects()->count();
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebSalesReps::route('/'),
            'create' => Pages\CreateWebSalesRep::route('/create'),
            'edit' => Pages\EditWebSalesRep::route('/{record}/edit'),
        ];
    }
}
