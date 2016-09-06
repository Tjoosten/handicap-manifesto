<table>
    <tbody>
        <tr>
            <th>#</th>
            <th>Naam:</th>
            <th>Email:</th>
            <th>Geboortedatum:</th>
            <th>Getekend op:</th>
        </tr>
    </tbody>
    <tbody>
        @foreach($signatures as $signature)
            <tr>
                <td>{{ $signature->id }}</td>
                <td>{{ $signature->naam }}</td>
                <td>{{ $signature->email }}</td>
                <td>{{ $signature->geboortedatum }}</td>
                <td>{{ $signature->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>