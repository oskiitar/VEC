<thead>
    <tr class="bg-dark text-white">
        <th>{{ __('Name') }}</th>
        <th>{{ __('Surname') }}</th>
        <th>{{ __('Birthday') }}</th>
        <th>{{ __('Tel') }}</th>
        <th>{{ __('Email') }}</th>
        <th>{{ __('Address') }}</th>
        <th>{{ __('Total') }}</th>
    </tr>
</thead>

<tbody>
    @forelse ($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->surname }}</td>
            <td>{{ $client->birthday }}</td>
            <td>{{ $client->tel }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->address }}</td>
            <td>{{ $client->total }}</td>
    @empty
        <tr>
            <td>{{ 'No hay datos' }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</tbody>
