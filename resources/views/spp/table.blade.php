<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Berawal</th>
            <th>Berakhir</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spp as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->start_period}}</td>
                <td>{{$get->end_period}}</td>
                <td>Rp. {{$get->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>