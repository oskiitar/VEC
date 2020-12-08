<thead>
    <tr class="bg-dark text-white">
        <th>{{ __('Reserves') }}</th>
        <th>{{ __('Date') }}</th>
        <th>{{ __('Total') }}</th>
        <th>{{ __('Download') }}</th>
    </tr>
</thead>

<tbody>
    @forelse ($reserves as $reserve)
        <tr>
            <td>{{ $reserve->id }}</td>
            <td>{{ $reserve->reserve_date }}</td>
            <td>{{ $reserve->pay->total }}</td>
            <td>
            <a href="/reservas/pdf/{{ $reserve->id }}" class="btn btn-primary btn-sm mt-n1">
                    <i class="fas fa-file-download mr-2"></i>PDF
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td>{{ 'No hay reservas' }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</tbody>
<tfoot>

</tfoot>
