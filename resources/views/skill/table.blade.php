<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skills as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->skill}}</td>
            </tr>
        @endforeach
    </tbody>
</table>