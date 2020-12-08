<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm 3cm;
        }

        header {
            position: fixed;
            top: 1.5cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: white;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        img {
            max-height: 1cm;
            width: auto;
        }

        table {
            text-align: left;
            margin-top: 2cm;
        }

        th, td{
            text-align: left;
            margin-bottom: 0.5cm; 
            border-bottom: 1px solid black;           
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #ae1010;
            color: white;
            text-align: center;
            line-height: 35px;
        }

    </style>
</head>

<body>
    <header>
        <img src="{{ asset('img/vec.png') }}">
    </header>

    <main>
        <div class="card">
            <div class="card-header p-4">
                <div class="float-right">
                    <h3 class="mb-0">Reserva num {{ $id }}</h3>
                    Fecha: {{ $reserve_date }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 ">
                        <h3 class="text-dark mb-1">{{ $name }} {{ $surname }}</h3>
                        <div>{{ $email }}</div>
                        <div>{{ $tel }}</div>
                        <div>{{ $address }}</div>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sala</th>
                                <th>Nombre</th>
                                <th>Description</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentings as $renting)
                                <tr>
                                    <td>{{ $renting->room_id }}</td>
                                    <td>{{ $renting->name }}</td>
                                    <td>{{ $renting->description }}</td>
                                    <td>{{ $renting->start }}</td>
                                    <td>{{ $renting->end }}</td>
                                    <td>{{ number_format($renting->price, 2) }}€</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">{{ number_format($subtotal, 2) }}€</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">IVA (21%)</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">{{ number_format($iva, 2) }}€</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark mr-1">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">{{ number_format($total, 2) }}€</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h1>www.virtualescapecoruna.com</h1>
    </footer>
</body>

</html>
