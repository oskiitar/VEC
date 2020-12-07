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
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #ae1010;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        img{
            max-height: 1cm;
            width: auto;
        }

        table{
            margin-top: 2cm;
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
        <h1>Mi Reserva</h1>
    </header>

    <main>
        <div class="m-min">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                <div class="card">
                    <div class="card-header p-4">
                        <div class="pt-2 d-inline-block"><img src="{{asset('img/vec.png')}}"></div>
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
                        <div class="table mt-4">
                            <table class="table table-condensed text-center">
                                <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Nombre</th>
                                        <th>Description</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        <th class="right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentings as $renting)
                                        <tr>
                                            <td>{{ $renting->id }}</td>
                                            <td>{{ $renting->name }}</td>
                                            <td>{{ $renting->description }}</td>
                                            <td>{{ $renting->start }}</td>
                                            <td>{{ $renting->end }}</td>
                                            <td class="right">{{ number_format($renting->price, 2) }}€</td>
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
                                            <span>{{ number_format($subtotal, 2) }}€</span>
                                            </td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark">IVA (21%)</strong>
                                            <span>{{ number_format($iva, 2) }}€</span>
                                            </td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong class="text-dark mr-1">Total</strong>
                                            <span>{{ number_format($total, 2) }}€</span>
                                            </td>
                                            <td class="right">
                                                <strong class="text-dark"></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
