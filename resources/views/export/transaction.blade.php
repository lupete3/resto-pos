<table class="w-full">
    <thead>
        <tr>
            <th>Code</th>
            <th>Date vente</th>
            <th>Client</th>
            <th>Prix</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ $item->customer->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description}}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>
