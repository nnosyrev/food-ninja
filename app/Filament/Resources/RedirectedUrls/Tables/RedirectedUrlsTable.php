<?php

namespace App\Filament\Resources\RedirectedUrls\Tables;

use App\Filament\Resources\RedirectedUrls\Resources\RedirectStatistics\Pages\ListRedirectedStatistics;
use App\Models\RedirectedUrl;
use App\Services\UrlShortener\UrlShortenerInterface;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class RedirectedUrlsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orig_url')
                    ->searchable(),
                TextColumn::make('hash')
                    ->state(fn (RedirectedUrl $redirectedUrl, UrlShortenerInterface $urlShortener): string => $urlShortener->generateShortUrlByHash($redirectedUrl->hash))
                    ->label('Short url')
                    ->url(fn (RedirectedUrl $redirectedUrl, UrlShortenerInterface $urlShortener): string => $urlShortener->generateShortUrlByHash($redirectedUrl->hash))
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('redirectstatistics_count')
                    ->label('Number of redirects')
                    ->counts('redirectstatistics'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                Action::make('Statistics')
                    ->color('success')
                    ->icon(Heroicon::NumberedList)
                    ->url(
                        fn (RedirectedUrl $record): string => ListRedirectedStatistics::getUrl(['redirected_url' => $record->id])
                    ),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
