<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use App\Models\Post;
use Flowframe\Trend\TrendValue;

class PostChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Trend::model(Post::class)
            ->between(now()->subMonths(6), now())
            ->perMonth()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Posts',
                    'data' =>$data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#4F46E5',
                    'backgroundColor' => '#4F46E5',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
