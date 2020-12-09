<thead>
    <tr class="bg-dark text-white">
        <th>{{ __('Reserves') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Subtotal') }}</th>
        <th>{{ __('IVA') }}</th>
        <th>{{ __('Total') }}</th>
        <th>{{ __('Totales') }}</th>
    </tr>
</thead>

<tbody>
    @forelse ($reserves as $reserve)
        <tr>
            <td>{{ $reserve->reserve }}</td>
            <td>{{ $reserve->price }}€</td>
            <td>{{ $reserve->subtotal }}€</td>
            <td>{{ $reserve->iva }}€</td>
            <td>{{ $reserve->total }}€</td>
            <td>{{ $reserve->totales }}€</td>
    @empty
        <tr>
            <td>{{ 'No hay datos' }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</tbody>
