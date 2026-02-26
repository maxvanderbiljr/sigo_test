<?php

namespace App\Filament\Widgets;

use App\Models\Curriculo;
use App\Models\Curso;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $usersChart = $this->countByDay(User::class, 7);
        $curriculosChart = $this->countByDay(Curriculo::class, 7);
        $cursosChart = $this->countByDay(Curso::class, 7);

        return [
            Stat::make('users', User::count())
                ->label('Usuários')
                ->value(User::count())
                ->chart($usersChart)
                ->color('success'),
                // ->description('12% aumento em relação à semana passada'),

            Stat::make('Curriculo', Curriculo::count())
                ->label('Currículos')
                ->value(Curriculo::count())
                ->chart($curriculosChart)
                ->color('warning'),
                // ->description('8% diminuição em relação à semana passada'),

            Stat::make('Curso', Curso::count())
                ->label('Cursos')
                ->value(Curso::count())
                ->chart($cursosChart)
                ->color('info'),
                // ->description('5% aumento em relação à semana passada'),
        ];
    }

    /**
     * @param  class-string<Model>  $model
     * @return array<int, int>
     */
    private function countByDay(string $model, int $days): array
    {
        $start = Carbon::today()->subDays($days - 1);

        $rows = $model::query()
            ->whereDate('created_at', '>=', $start)
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');

        return collect(range(0, $days - 1))
            ->map(fn (int $i) => $rows[$start->copy()->addDays($i)->toDateString()] ?? 0)
            ->all();
    }
}
