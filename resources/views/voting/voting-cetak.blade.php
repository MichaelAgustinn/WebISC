<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kode Voting</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        .print-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5mm;
            width: 100%;
        }

        .code-box {
            position: relative; /* untuk pseudo-element */
            border: 2px solid #333;
            width: 6cm;
            height: 3cm;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 16pt;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;

            break-inside: avoid;
            overflow: hidden; /* jaga supaya bg tidak keluar */
        }

        /* Background transparan sebagai pseudo-element */
        .code-box::before {
            content: "";
            position: absolute;
            inset: 0; /* isi penuh kotak */
            background-image: url('{{ asset('LogoIsc.png') }}');
            background-size: contain;   /* proporsional */
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.2; /* atur transparansi hanya background */
            z-index: 0;
        }

        /* Pastikan teks di atas background */
        .code-box span {
            position: relative;
            z-index: 1;
            color: #000; /* biar jelas */
        }

        .print-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        @media print {
            body>*:not(.print-container) {
                display: none;
            }

            body>.print-container {
                display: flex;
            }

            body {
                margin: 0;
            }

            @page {
                size: A4;
                margin: 1cm;
            }

            .code-box::before {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

    <button onclick="window.print()" class="print-button">🖨️ Cetak Halaman Ini</button>

    <div class="print-container">
        @forelse ($votings as $voting)
            <div class="code-box">
                <span>{{ $voting->code }}</span>
            </div>
        @empty
            <p>Tidak ada kode untuk dicetak.</p>
        @endforelse
    </div>

</body>

</html>
