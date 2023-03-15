<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Spp</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->name}}</td>
                <td>{{$get->email}}</td>
                <td>{{$get->nisn}}</td>
                <td>{{$get->nis}}</td>
                <td>{{$get->grade->grade}}</td>
                <td>{{$get->major->major}}</td>
                <td>{{$get->address}}</td>
                <td>{{$get->phone_number}}</td>
                <td>Rp. {{$get->spp->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>