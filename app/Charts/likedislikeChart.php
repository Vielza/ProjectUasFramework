<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Like;

class likedislikeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $likes = Like::where('like', true)->count();
        $dislikes = Like::where('like', false)->count();

        return $this->chart->pieChart()
            ->setTitle('Likes and Dislikes')
            ->setSubtitle('Current Statistics')
            ->setDataset([$likes, $dislikes])
            ->setLabels(['Likes', 'Dislikes']);
    }
}
