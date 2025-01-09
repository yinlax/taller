@extends('layouts.app')

@section('title', 'Reportes')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
            .report-container {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .filter-section {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-section input, .filter-section button {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .summary-section {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        flex: 1;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card h3 {
        margin-bottom: 10px;
        color: #555;
    }

    .card p {
        font-size: 1.5em;
        font-weight: bold;
        color: #000;
    }

    .chart-section {
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    table th {
        background-color: #2c3e50;
        color: #fff;
    }

    </style>
@endsection
@section('content')
<main class="main-content" id="main-content">
    <div class="card">
        <h3>Reportes</h3>

            <div class="filter-section">
                <label for="date-range">Rango de fechas:</label>
                <input type="date" id="start-date">
                <input type="date" id="end-date">
                <button onclick="applyFilters()">Filtrar</button>
            </div>

            <div class="summary-section">
                <div class="card">
                    <h3>Insumo Más Usado</h3>
                    <p id="most-used">...</p>
                </div>
                <div class="card">
                    <h3>Total Usado</h3>
                    <p id="total-used">...</p>
                </div>
                <div class="card">
                    <h3>Insumo Menos Usado</h3>
                    <p id="least-used">...</p>
                </div>
            </div>

            <div class="chart-section">
                <canvas id="usage-chart"></canvas>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad Usada</th>
                        <th>Unidad</th>
                        <th>Última Actualización</th>
                    </tr>
                </thead>
                <tbody id="usage-table">
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    const ctx = document.getElementById('usage-chart').getContext('2d');
const usageChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Insumo A', 'Insumo B', 'Insumo C'], 
        datasets: [{
            label: 'Cantidad Usada',
            data: [30, 50, 20], 
            backgroundColor: ['#3498db', '#2ecc71', '#e74c3c']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: { callbacks: { label: (item) => `${item.raw} unidades` } }
        }
    }
});


function applyFilters() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    const data = [
        { nombre: 'Insumo A', cantidad: 30, unidad: 'kg', ultima: '2025-01-01' },
        { nombre: 'Insumo B', cantidad: 50, unidad: 'lt', ultima: '2025-01-02' },
        { nombre: 'Insumo C', cantidad: 20, unidad: 'kg', ultima: '2025-01-03' }
    ];

    const tableBody = document.getElementById('usage-table');
    tableBody.innerHTML = '';
    data.forEach(insumo => {
        const row = `<tr>
            <td>${insumo.nombre}</td>
            <td>${insumo.cantidad}</td>
            <td>${insumo.unidad}</td>
            <td>${insumo.ultima}</td>
        </tr>`;
        tableBody.innerHTML += row;
    });

    document.getElementById('most-used').textContent = data[1].nombre;
    document.getElementById('total-used').textContent = `${data.reduce((sum, i) => sum + i.cantidad, 0)} unidades`;
    document.getElementById('least-used').textContent = data[2].nombre;

    usageChart.data.labels = data.map(i => i.nombre);
    usageChart.data.datasets[0].data = data.map(i => i.cantidad);
    usageChart.update();
}

</script>
@endsection

