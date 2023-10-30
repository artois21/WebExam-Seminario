@extends('crud.layout')

@section('content')
    <!--Datos del usuario-->
    <h1>Hola {{$usuario->name}}</h1>
    <h2>{{$usuario->email}}</h2>
    <h2>RFC: {{$usuario->RFC}}</h2>
    <h2>Edad: {{$usuario->edad}}</h2>
    <h2>Telefono: {{$usuario->telefono}}</h2>
    <h2>Fecha de Alta: {{$usuario->created_at}}</h2>

    <!--Errores de formulario-->
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>
                {{$e}}
            </div>
        @endforeach
    @endif
    <!--Datos si el usuario tiene unprestamo-->
    @if($bandera)
        <!--Formulario-->
        <br>
        <hr>
        <br>
        <form action="{{ route('prestamo.store') }}" method="post"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
            @csrf <!-- ayuda a que la peticion sea segura-->
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" value="{{old('cantidad','0')}}">
            <label for="">Periodo</label>
            <input type="number" name="periodo" value="{{old('periodo','0')}}">
            <label for="">Interes</label>
            <input type="number" name="interes" value="{{old('interes','0')}}">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Crear nuevo Prestamo</button>
        </form>
    @else
        <!--Datos si el usuario tiene un prestamo-->
        <!--Formulario-->
        <br>
        <hr>
        <br>
        <form action="{{ route('prestamo.update',$prestamo->id) }}" method="post" enctype="multipart/form-data"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
            @csrf <!-- ayuda a que la peticion sea segura-->
            @method("PUT")
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" value="{{ old('cantidad', $prestamo->cantidad) }}">
            <label for="">Periodo</label>
            <input type="number" name="periodo" value="{{ old('cantidad', $prestamo->periodo) }}">
            <label for="">Interes</label>
            <input type="number" name="interes" value="{{ old('cantidad', $prestamo->interes) }}">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Editar Prestamo</button>
        </form>
        <!--Tabla con calculos-->
        <br>
        <hr>
        <br>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Cuota</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Interes</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Capital</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @for ($i = 0; $i < $prestamo->periodo; $i++)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap bg-blue-500 bg-opacity-10">{{ $i+1 }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap bg-blue-500 bg-opacity-10">{{ $cuota }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap bg-blue-500 bg-opacity-10">{{ $interes }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap bg-blue-500 bg-opacity-10">{{ $cuota-$interes }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap bg-blue-500 bg-opacity-10">{{ $total-$cuota }}</td>
                        @php
                            $total -= $cuota; // Actualiza el saldo restando la cuota
                        @endphp
                    </tr>
                @endfor
            </tbody>
        </table>
    @endif

@endsection