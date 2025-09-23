@extends('Admin.AdminLayout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Analytics</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-2">Application Volume by Scholarship Type</h2>
                <canvas id="applicationVolumeByTypeChart"></canvas>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-2">Application Volume by Course</h2>
                <canvas id="applicationVolumeByCourseChart"></canvas>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-2">Application Volume by Year Level</h2>
                <canvas id="applicationVolumeByYearChart"></canvas>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-2">Application Status Rates</h2>
                <canvas id="applicationStatusRatesChart"></canvas>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-2">Allowance Distribution</h2>
                <canvas id="allowanceDistributionChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Application Volume by Scholarship Type Chart
        const applicationVolumeByTypeCtx = document.getElementById('applicationVolumeByTypeChart').getContext('2d');
        const applicationVolumeByTypeChart = new Chart(applicationVolumeByTypeCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($applicationVolumeByType->pluck('title')) !!},
                datasets: [{
                    label: 'Number of Applications',
                    data: {!! json_encode($applicationVolumeByType->pluck('count')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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

        // Application Volume by Course Chart
        const applicationVolumeByCourseCtx = document.getElementById('applicationVolumeByCourseChart').getContext('2d');
        const applicationVolumeByCourseChart = new Chart(applicationVolumeByCourseCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($applicationVolumeByCourse->pluck('course')) !!},
                datasets: [{
                    label: 'Number of Applications',
                    data: {!! json_encode($applicationVolumeByCourse->pluck('count')) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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

        // Application Volume by Year Level Chart
        const applicationVolumeByYearCtx = document.getElementById('applicationVolumeByYearChart').getContext('2d');
        const applicationVolumeByYearChart = new Chart(applicationVolumeByYearCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($applicationVolumeByYear->pluck('year_level')) !!},
                datasets: [{
                    label: 'Number of Applications',
                    data: {!! json_encode($applicationVolumeByYear->pluck('count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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

        // Application Status Rates Chart
        const applicationStatusRatesCtx = document.getElementById('applicationStatusRatesChart').getContext('2d');
        const applicationStatusRatesChart = new Chart(applicationStatusRatesCtx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($applicationStatusRates->pluck('status')) !!},
                datasets: [{
                    label: 'Application Status',
                    data: {!! json_encode($applicationStatusRates->pluck('count')) !!},
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        // Allowance Distribution Chart
        const allowanceDistributionCtx = document.getElementById('allowanceDistributionChart').getContext('2d');
        const allowanceDistributionChart = new Chart(allowanceDistributionCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($allowanceDistribution->pluck('grant_amount')) !!},
                datasets: [{
                    label: 'Number of Scholarships',
                    data: {!! json_encode($allowanceDistribution->pluck('count')) !!},
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Grant Amount'
                        }
                    }
                }
            }
        });
    </script>
@endsection