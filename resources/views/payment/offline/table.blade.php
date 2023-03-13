<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Petugas</th>
            <th>NISN</th>
            <th>Siswa</th>
            <th>Tanggal</th>
            <th>Spp</th>
            <th>Jumlah Bayar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offlinePayments as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->user->name}}</td>
                <td>{{$get->student->nisn}}</td>
                <td>{{$get->student->name}}</td>
                <td>{{$get->pay_date}}</td>
                <td>Rp. {{$get->student->spp->amount}}</td>
                <td>Rp. {{$get->amount}}</td>
                @if ($get->student->payment_status == 2)
                    <td>Lunas</td>
                @else
                    <td>Belum Lunas</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>