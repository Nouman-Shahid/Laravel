@extends('layouts.main')
@section('title', 'Admin')
@extends('components.sidebar')

@section('content')
    <div class="flex flex-col w-[82vw] bg-slate-100 h-auto mt-20 items-center">

        <div class="flex w-[94%] mb-10 justify-between items-center">
            <p class="text-[3vh] font-bold">Admin Dashboard</p>
        </div>

        <div class="w-full flex justify-around">
            <!-- Chart for Number of Users -->
            <div class="w-1/3 p-4">
                <h2 class="text-xl font-semibold mb-4">Number of Users</h2>
                <canvas id="usersChart" width="400" height="200"></canvas>
            </div>
            <!-- Chart for Number of Flights -->
            <div class="w-1/3 p-4">
                <h2 class="text-xl font-semibold mb-4">Number of Flight Deals</h2>
                <canvas id="flightsChart" width="400" height="200"></canvas>
            </div>
            <!-- Chart for Number of Booked Flights -->
            <div class="w-1/3 p-4">
                <h2 class="text-xl font-semibold mb-4">Number of Booked Flights</h2>
                <canvas id="bookedFlightsChart" width="400" height="200"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Get data from Laravel
                const userCount = @json($userCount);
                const flightCount = @json($flightCount);
                const bookedFlightCount = @json($bookedFlightCount);

                // Chart configuration
                const chartConfig = (ctx, label, data, backgroundColor) => {
                    return new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [label],
                            datasets: [{
                                label: label,
                                data: [data],
                                backgroundColor: backgroundColor,
                                borderColor: backgroundColor,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                };

                // Initialize charts
                chartConfig(
                    document.getElementById('usersChart').getContext('2d'),
                    'Number of Users',
                    userCount,
                    'rgba(255, 99, 132, 0.2)'
                );

                chartConfig(
                    document.getElementById('flightsChart').getContext('2d'),
                    'Number of Flight Deals',
                    flightCount,
                    'rgba(54, 162, 235, 0.2)'
                );

                chartConfig(
                    document.getElementById('bookedFlightsChart').getContext('2d'),
                    'Number of Booked Flights',
                    bookedFlightCount,
                    'rgba(75, 192, 192, 0.2)'
                );
            });
        </script>
    </div>
@endsection
