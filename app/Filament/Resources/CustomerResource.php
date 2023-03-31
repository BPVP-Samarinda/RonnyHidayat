<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->columnSpan('full'),
                Forms\Components\Textarea::make('alamat')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('quantity')
                    ->columnSpan('full'),
                Forms\Components\DateTimePicker::make('order_date')
                    ->columnSpan('full')
                    ->displayFormat('d/m/Y'),
                Forms\Components\Select::make('status')
                    ->columnSpan('full')
                    ->options([
                        'Belum Selesai' => 'Belum Selesai',
                        'Sudah Selesai' => 'Sudah Selesai',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('alamat')
                    ->wrap(),
                Tables\Columns\TextColumn::make('order_date'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('status')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }
}
