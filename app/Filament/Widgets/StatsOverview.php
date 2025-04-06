<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Application Overview';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', value: User::count())
                ->description('Total number of users in the system')
                ->icon('heroicon-o-users')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->color('success')
                ->chart([9, 10, 7, 11, 15, 20, 25, 30]),

            Stat::make('Total Authors', value: Author::count())
                ->description('Number of active users in the system')
                ->icon('heroicon-o-user-group')
                ->color('warning'),

            Stat::make(label: 'Total Posts', value: Post::count())
                ->description('Number of inactive users in the system')
                ->icon('heroicon-o-document-text')
                ->color('danger'),
        ];

    }
}
