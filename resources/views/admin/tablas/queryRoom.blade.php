<thead>
    <tr class="bg-dark text-white">
        <th>{{ __('Type') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Description') }}</th>
        <th>{{ __('Total') }}</th>
    </tr>
</thead>

<tbody>
    @forelse ($rooms as $room)
        <tr>
            <td>{{ $room->type }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->description }}</td>
            <td>{{ number_format($room->total, 2) }}€</td>
    @empty
        <tr>
            <td>{{ 'No hay datos' }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</tbody>
