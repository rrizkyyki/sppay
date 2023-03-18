<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Spp</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->nisn}}</td>
                <td>{{$get->nis}}</td>
                <td>{{$get->name}}</td>
                <td>{{$get->email}}</td>
                @if ($get->gender == 'male')
                    <td>Laki-laki</td>
                @else
                    <td>Perempuan</td>
                @endif
                <td>{{$get->grade->grade}}</td>
                <td>{{$get->skill->skill}}</td>
                <td>{{$get->phone_number}}</td>
                <td>{{$get->address}}</td>
                <td>Rp. {{$get->spp->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>