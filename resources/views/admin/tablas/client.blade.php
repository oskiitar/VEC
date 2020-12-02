    <caption>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddClient">
            Nuevo<i class="fas fa-address-book ml-2"></i>
        </button>
    </caption>

    <thead>
        <tr class="bg-dark text-white">
            <th>{{ __('Name') }}</th>
            <th>{{ __('Surname') }}</th>
            <th>{{ __('Birthday') }}</th>
            <th>{{ __('Tel') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Address') }}</th>
            <th></th>
            <th></th>
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
                <td>{{ $client->client->address }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditClient" onclick="editClient({{ $client }})">
                        <i class="fas fa-user-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="deleteUser('client', {{ $client->id }})">
                        <i class="fas fa-user-times"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ 'No hay datos' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforelse
    </tbody>
