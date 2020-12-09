<thead>
    <tr class="bg-dark text-white">
        <th>{{ __('Name') }}</th>
        <th>{{ __('Surname') }}</th>
        <th>{{ __('Age') }}</th>
        <th>{{ __('Tel') }}</th>
        <th>{{ __('Email') }}</th>
    </tr>
</thead>

<tbody>
    @forelse ($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->surname }}</td>
            <td>{{ $client->age }}</td>
            <td>{{ $client->tel }}</td>
            <td>{{ $client->email }}</td>
    @empty
        <tr>
            <td>{{ 'No hay datos' }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</tbody>
