<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Productos';
    protected static ?string $modelLabel = 'Producto';
    protected static ?string $pluralModelLabel = 'Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Aquí luego podemos agregar el formulario si habilitamos edición
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->size(250),
                Tables\Columns\TextColumn::make('name')->weight('bold')->wrap(),
                Tables\Columns\TextColumn::make('price')->money('USD')->color('primary'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')->trueLabel('Solo Activos'),
            ])
            ->defaultSort('name')
            ->paginated(false)
            ->recordUrl(null)
            ->actions([
                Tables\Actions\Action::make('add_to_cart')
                    ->label('Agregar al carrito')
                    ->icon('heroicon-m-shopping-cart')
                    ->color('primary')
                    ->action(function (Product $record) {
                        session()->push('cart', $record->id);
                        Notification::make()
                            ->title("{$record->name} agregado al carrito")
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getTableLayout(): ?string
    {
        return 'grid';
    }
}
