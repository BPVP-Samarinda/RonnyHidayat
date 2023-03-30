<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->columnSpan('full'),
                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'nama')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('harga')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('stok')
                    ->columnSpan('full'),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpan('full'),
                Forms\Components\FileUpload::make('gambar')
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->wrap(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->size(150)
                    ->square(),
                Tables\Columns\TextColumn::make('kategori.nama'),
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR', true),
                Tables\Columns\TextColumn::make('stok'),
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
            'index' => Pages\ManageProduks::route('/'),
        ];
    }
}
