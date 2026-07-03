<?php

namespace App\Filament\Resources\RedirectedUrls\Tables;

use App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Pages\ListRedirectedStatistics;
use App\Models\RedirectedUrl;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Webteractive\FilamentBrowserTimezone\BrowserTimezone;

class RedirectedUrlsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orig_url')
                    ->label('Оригинальный URL')
                    ->searchable(),
                TextColumn::make('hash')
                    ->state(fn(RedirectedUrl $redirectedUrl, UrlShortenerInterface $urlShortener): string => $urlShortener->generateShortUrlByHash($redirectedUrl->hash))
                    ->label('Короткий URL')
                    ->url(fn(RedirectedUrl $redirectedUrl, UrlShortenerInterface $urlShortener): string => $urlShortener->generateShortUrlByHash($redirectedUrl->hash))
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('redirectstatistics_count')
                    ->label('Количество переходов')
                    ->counts('redirectstatistics'),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->timezone(BrowserTimezone::get())
                    ->sortable(),
            ])
            ->filters([
            ])
            ->recordActions([
                Action::make('Statistics')
                    ->label('Статистика')
                    ->color('success')
                    ->icon(Heroicon::NumberedList)
                    ->url(
                        fn(RedirectedUrl $record): string => ListRedirectedStatistics::getUrl(['redirected_url' => $record->id])
                    ),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
