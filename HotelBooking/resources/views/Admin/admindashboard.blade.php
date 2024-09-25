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
                <h2 class="text-xl font-semibold mb-4">Number of hotelsdata</h2>
                <canvas id="flightsChart" width="400" height="200"></canvas>
            </div>
            <!-- Chart for Number of Booked Flights -->
            <div class="w-1/3 p-4">
                <h2 class="text-xl font-semibold mb-4">Number of Booked Hotels</h2>
                <canvas id="bookedFlightsChart" width="400" height="200"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Get data from Laravel
                const userCount = @json($userCount);
                const hotelCount = @json($hotelCount);
                const bookedhotelCount = @json($bookedhotelCount);

                // Function to create a doughnut chart
                const createDoughnutChart = (ctx, label, data, backgroundColors) => {
                    return new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [label, 'Others'],
                            datasets: [{
                                label: label,
                                data: [data, 10 - data],
                                backgroundColor: backgroundColors,
                                borderColor: backgroundColors.map(color => color.replace('0.2',
                                    '1')),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                };

                // Initialize doughnut charts
                createDoughnutChart(
                    document.getElementById('usersChart').getContext('2d'),
                    'Number of Users',
                    userCount,
                    ['rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 0.1)']
                );

                createDoughnutChart(
                    document.getElementById('flightsChart').getContext('2d'),
                    'Number of Hotel Deals',
                    hotelCount,
                    ['rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.1)']
                );

                createDoughnutChart(
                    document.getElementById('bookedFlightsChart').getContext('2d'),
                    'Number of Booked Hotels',
                    bookedhotelCount,
                    ['rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.1)']
                );
            });
        </script>


    </div>
@endsection
