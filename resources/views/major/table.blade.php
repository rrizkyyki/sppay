<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($majors as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->major}}</td>
            </tr>
        @endforeach
    </tbody>
</table>