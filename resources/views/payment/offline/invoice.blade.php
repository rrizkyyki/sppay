<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Invoice Pembayaran</title>
</head>
<body>
    <center class="mb-5">
        <h1>INVOICE</h1>
    </center>

    <p style="margin-bottom: -2px;">Petugas : {{$offlinePayment->user->name}}</p>
    <p class="mb-4">Email : {{$offlinePayment->user->email}}</p>

    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">NISN</th>
            <th scope="col">Nama</th>
            <th scope="col">Spp</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah Bayar</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$offlinePayment->student->nisn}}</td>
                <td>{{$offlinePayment->student->name}}</td>
                <td>{{$student->spp->amount}}</td>
                <td>{{$offlinePayment->pay_date}}</td>
                <td>{{$offlinePayment->amount}}</td>
                @if ($offlinePayment->student->payment_status == 2)
                    <td><p class="badge badge-success">Lunas</p></td>
                @else
                    <td><p class="badge badge-danger">Belum Lunas</p></td>
                @endif
            </tr>
        </tbody>
    </table>
</body>
</html>