<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Spp</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($studentPaymentStatus as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->name}}</td>
                <td>{{$get->grade->grade}}</td>
                <td>{{$get->major->major}}</td>
                <td>{{$get->address}}</td>
                <td>{{$get->phone_number}}</td>
                <td>Rp. {{$get->spp->amount}}</td>
                @if ($get->payment_status == 1)
                    <td>Belum Lunas</td>
                @else
                    <td>Lunas</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>