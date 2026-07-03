<?php

namespace App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics;

use App\Filament\Resources\RedirectedUrls\RedirectedUrlResource;
use App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Pages\ListRedirectedStatistics;
use App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Tables\RedirectStatisticsTable;
use App\Models\RedirectStatistics;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RedirectStatisticsResource extends Resource
{
    protected static ?string $model = RedirectStatistics::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = RedirectedUrlResource::class;

    protected static ?string $recordTitleAttribute = 'Redirect statistics';

    protected static ?string $pluralLabel = 'Статистика переходов';

    public static function table(Table $table): Table
    {
        return RedirectStatisticsTable::configure($table);
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
            'index' => ListRedirectedStatistics::route('/'),
        ];
    }
}
