@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>{{ __('BP Analysis') }}</h3>
        </div>
        <div class="card-body">
            <canvas id="canvas" height="280" width="600"></canvas>
            {{ $days }}
            {{ $rates }}
            {{ $systolic }}
            {{ $diastolic }}
            {{--@foreach($bp as $key => $p)
                {{ __('Day: ') . $key }}
                {{ __('Count: ') . $p->count() }}
                <hr>
            @endforeach--}}
        </div>
        <div class="card-footer">
            {{ __('Good') }}
        </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
    <script>
        let days = {!! $days !!};
        let rates = {{ $rates }};
        let barChartData = {
            labels: days,
            datasets: [{
                label: 'Rates',
                backgroundColor: "pink",
                data: rates
            }]
        };
        window.onload = function() {
            let ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Daily Heart Rate'
                    }
                }
            });
        };
    </script>

@endpush
