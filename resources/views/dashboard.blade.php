@extends('layouts.user_template')

@section('content')

<div class="container p-4 text-center">
    <h1>Welcome, {{ session('user')->name }}!</h1>

</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card p-3 shadow-sm" style="max-width: 450px; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<div class="col-md-6">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card text-white" style="background-color:#2C8975;">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2>{{ $usercount }}</h2>
                </div>
            </div>
        </div>

    <div class="col-12">
        <div class="card text-white" style="background-color:#6BB2A0;">
            <div class="card-body">
                <h5>My Shopping List </h5>
                <h2>{{ $todocount }}</h2>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Users', 'Shopping List'],
            datasets: [{
                label: 'System Data',
                data: [{{ $usercount }}, {{ $todocount }}],
                backgroundColor: ['#2C8975', '#6BB2A0'],
            }]
        }
    });
</script>
@endsection