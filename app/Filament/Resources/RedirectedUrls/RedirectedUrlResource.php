<?php

namespace App\Filament\Resources\RedirectedUrls;

use App\Filament\Resources\RedirectedUrls\Pages\CreateRedirectedUrl;
use App\Filament\Resources\RedirectedUrls\Pages\ListRedirectedUrls;
use App\Filament\Resources\RedirectedUrls\Schemas\RedirectedUrlForm;
use App\Filament\Resources\RedirectedUrls\Tables\RedirectedUrlsTable;
use App\Models\RedirectedUrl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RedirectedUrlResource extends Resource
{
    protected static ?string $model = RedirectedUrl::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Redirected url';

    public static function form(Schema $schema): Schema
    {
        return RedirectedUrlForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RedirectedUrlsTable::configure($table);
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
            'index' => ListRedirectedUrls::route('/'),
            'create' => CreateRedirectedUrl::route('/create'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}
