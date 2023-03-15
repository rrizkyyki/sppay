<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spp as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->year}}</td>
                <td>Rp. {{$get->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>