<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($grades as $key => $get)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$get->grade}}</td>
            </tr>
        @endforeach
    </tbody>
</table>