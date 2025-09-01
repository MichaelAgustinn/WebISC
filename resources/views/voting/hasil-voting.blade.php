<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Suara</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            padding: 30px 40px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .summary-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            /* Agar responsif di layar kecil */
        }

        .card {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            min-width: 150px;
            text-align: center;
        }

        .card h3 {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .card .count {
            font-size: 36px;
            font-weight: 700;
        }

        /* Warna spesifik untuk setiap pilihan */
        .card.kanif .count {
            color: #3498db;
            /* Biru */
        }

        .card.arma .count {
            color: #e74c3c;
            /* Merah */
        }

        .card.total .count {
            color: #2ecc71;
            /* Hijau */
        }

        .chart-container {
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
            /* Grafik di tengah */
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>📊 Hasil Perhitungan Suara</h1>

        <div class="summary-cards">
            <div class="card kanif">
                <h3>Total Suara Kanif</h3>
                <p class="count">{{ $totalKanif }}</p>
            </div>
            <div class="card arma">
                <h3>Total Suara Arma</h3>
                <p class="count">{{ $totalArma }}</p>
            </div>
            <div class="card total">
                <h3>Total Keseluruhan</h3>
                <p class="count">{{ $totalSuara }}</p>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="hasilChart"></canvas>
        </div>
    </div>

    <script>
        // Mengambil data dari variabel Blade yang dikirim Controller
        const totalKanif = {{ $totalKanif }};
        const totalArma = {{ $totalArma }};

        const ctx = document.getElementById('hasilChart').getContext('2d');

        const hasilChart = new Chart(ctx, {
            type: 'pie', // Tipe grafik adalah pie (lingkaran)
            data: {
                labels: ['Kanif', 'Arma'],
                datasets: [{
                    label: 'Jumlah Suara',
                    data: [totalKanif, totalArma],
                    backgroundColor: [
                        'rgba(52, 152, 219, 0.8)', // Warna Biru untuk Kanif
                        'rgba(231, 76, 60, 0.8)' // Warna Merah untuk Arma
                    ],
                    borderColor: [
                        'rgba(52, 152, 219, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Posisi legenda di atas
                    },
                    tooltip: {
                        callbacks: {
                            // Menampilkan persentase pada tooltip
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                const value = context.raw;
                                const total = context.chart.getDatasetMeta(0).total;
                                const percentage = ((value / total) * 100).toFixed(1) + '%';
                                label += value + ' suara (' + percentage + ')';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>
