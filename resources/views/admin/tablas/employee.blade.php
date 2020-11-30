    <caption>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddEmployee">
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
            <th>{{ __('Contract_start') }}</th>
            <th>{{ __('Contract_end') }}</th>
            <th>{{ __('Is_Admin') }}</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->birthday }}</td>
                <td>{{ $employee->tel }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->employees->contract_start }}</td>
                <td>{{ $employee->employees->contract_end }}</td>
                <td>
                    @if ($employee->is_admin == 1)
                        <i class="fas fa-user-shield"></i>
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditEmployee" onclick="editEmployee({{ $employee }})">
                        <i class="fas fa-user-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="deleteUser('employee',{{ $employee->id }})">
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
                <td></td>
                <td></td>
            </tr>
        @endforelse
    </tbody>
