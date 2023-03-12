<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->name}}</td>
                <td>{{$get->email}}</td>
                <td>{{$get->role}}</td>
            </tr>
        @endforeach
    </tbody>
</table>