<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - AmikomEventHub</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#4f46e5;
            margin:0;
            padding:40px 20px;
            color:#ffffff;
        }

        .container{
            max-width:500px;
            margin:auto;
        }

        .header-text{
            text-align:center;
            margin-bottom:30px;
        }

        .header-text h1{
            margin:0;
            font-size:28px;
        }

        .header-text p{
            margin-top:10px;
            color:#e0e7ff;
        }

        .ticket-card{
            background:#ffffff;
            color:#111827;
            border-radius:20px;
            overflow:hidden;
        }

        .ticket-body{
            padding:30px;
        }

        .grid{
            display:flex;
            flex-wrap:wrap;
            justify-content:space-between;
        }

        .grid-item{
            width:48%;
            margin-bottom:20px;
        }

        .label{
            font-size:12px;
            color:#6b7280;
            margin-bottom:5px;
        }

        .value{
            font-size:16px;
            font-weight:bold;
            color:#111827;
        }

        .qr-section{
            text-align:center;
            background:#f3f4f6;
            padding:20px;
            border-radius:15px;
            margin-top:20px;
        }

        .footer{
            text-align:center;
            margin-top:20px;
            font-size:12px;
            color:#e5e7eb;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header-text">
        <h1>Pembayaran Berhasil!</h1>
        <p>Tiket Anda telah berhasil diterbitkan.</p>
    </div>

    <div class="ticket-card">

        <div class="ticket-body">

            <div class="grid">

                <div class="grid-item">
                    <div class="label">Nama Pembeli</div>
                    <div class="value">{{ $transaction->customer_name }}</div>
                </div>

                <div class="grid-item">
                    <div class="label">Event</div>
                    <div class="value">{{ $transaction->event->title }}</div>
                </div>

                <div class="grid-item">
                    <div class="label">Tanggal & Waktu</div>
                    <div class="value">
                        {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y, H:i') }}
                    </div>
                </div>

                <div class="grid-item">
                    <div class="label">Lokasi</div>
                    <div class="value">{{ $transaction->event->location }}</div>
                </div>

                <div class="grid-item">
                    <div class="label">Order ID</div>
                    <div class="value">{{ $transaction->order_id }}</div>
                </div>

            </div>

            <div class="qr-section">

                <p><strong>Scan QR untuk Check-in</strong></p>

                <img
                    src="https://api.qrserver.com/v1/create-qrcode/?size=180x180&data={{ urlencode($transaction->order_id) }}"
                    alt="QR Code">

                <p style="margin-top:15px;">
                    <strong>{{ $transaction->order_id }}</strong>
                </p>

            </div>

        </div>

    </div>

    <div class="footer">
        <p>Mohon tunjukkan E-Ticket ini saat memasuki area acara.</p>
        <p>&copy; {{ date('Y') }} AmikomEventHub</p>
    </div>

</div>

</body>
</html>