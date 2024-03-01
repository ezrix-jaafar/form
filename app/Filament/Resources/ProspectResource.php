<?php

namespace App\Filament\Resources;

use App\Enums\Business;
use App\Enums\Role;
use App\Enums\Sale;
use App\Enums\State;
use App\Enums\Status;
use App\Filament\Resources\ProspectResource\Pages;
use App\Filament\Resources\ProspectResource\RelationManagers;
use App\Models\Prospect;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProspectResource extends Resource
{
    protected static ?string $model = Prospect::class;

    protected static ?string $navigationGroup = 'General Form';

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
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('state')
                                    ->options(State::toSelectArray()->toArray())
                                    ->required(),
                                Forms\Components\TextInput::make('brand_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('business_type')
                                    ->enum(Business::class)
                                    ->options(Business::toSelectArray())
                                    ->required(),
                                Forms\Components\Select::make('role')
                                    ->enum(Role::class)
                                    ->options(Role::class)
                                    ->required(),
                                Forms\Components\Select::make('last_30days_sales')
                                    ->label('Last 30 days sales')
                                    ->enum(Sale::class)
                                    ->options(Sale::toSelectArray())
                                    ->required(),
                            ])->columns(1),
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Internal Information')
                            ->schema([
                                Forms\Components\Select::make('sales_rep_id')
                                    ->relationship('salesRep', 'name'),
                                Forms\Components\Select::make('status')
                                    ->enum(Status::class)
                                    ->options(Status::class)
                                    ->required(),
                                Forms\Components\RichEditor::make('remarks')
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'bold',
                                        'bulletList',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ])
                                    ->columnSpan('full'),
                            ])->columns(1),
                    ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->wrap()
                    ->searchable()
                    ->description(fn (Prospect $record): string => $record->role),
                Tables\Columns\TextColumn::make('phone')
                    ->wrap()
                    ->label('Contact Info')
                    ->searchable()
                    ->description(fn (Prospect $record): string => $record->email),
                Tables\Columns\TextColumn::make('brand_name')
                    ->wrap()
                    ->searchable()
                    ->description(fn (Prospect $record): string => $record->business_type),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_30days_sales')
                    ->label('Sales')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Below RM10,000' => 'info',
                        'Above RM10,000' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'New' => 'heroicon-s-plus-circle',
                        'Negotiating' => 'heroicon-s-play-circle',
                        'Won' => 'heroicon-s-check-circle',
                        'Lost' => 'heroicon-s-x-circle',
                        'KIV' => 'heroicon-s-pause-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'New' => 'gray',
                        'Negotiating' => 'info',
                        'Won' => 'success',
                        'Lost' => 'danger',
                        'KIV' => 'warning',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('salesRep.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            'index' => Pages\ListProspects::route('/'),
            'create' => Pages\CreateProspect::route('/create'),
            //'edit' => Pages\EditProspect::route('/{record}/edit'),
        ];
    }
}
