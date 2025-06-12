@extends('user.dashboard')

@section('title', 'Solicitar Certificados')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

 <div class="contenedor">
    <h1>Solicitar certificados</h1>

    <div class="mb-3">
       <p>Seleccione el contrato que desea certificar</p>
      <input type="checkbox" id="selectAll" />
      <label for="selectAll"><strong>Seleccionar todo</strong></label>
    </div>

    <table id="certTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="background-color:rgb(4, 4, 110);">Seleccionar</th>
          <th style="background-color:rgb(4, 4, 110);">Documento </th>
          <th style="background-color:rgb(4, 4, 110);">Nombre</th>
         {{-- <th style="background-color:rgb(4, 4, 110);">Tipo</th>--}}
          <th style="background-color:rgb(4, 4, 110);">Fecha inicio</th>
          <th style="background-color:rgb(4, 4, 110);">Fecha finalización</th>
          <th style="background-color:rgb(4, 4, 110);">Motivo de solicitud</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contratos as $contrato)
        <tr>
            <td><input type="checkbox" class="casilla" name="seleccionados[]" value="{{$contrato->id_contrato}}"
            {{in_array($contrato->id_contrato,$solicitudesRecientes) ? 'disabled':''}}/></td>
            <td>{{ $contrato->usuario->doc_usuario }}</td>
            <td>{{ $contrato->usuario->pri_nombre }} {{ $contrato->usuario->pri_apellido }}</td>
            <td>{{ $contrato->fec_ingreso->format('d/m/Y') }}</td>
            <td>{{ $contrato->fec_finalizacion ? $contrato->fec_finalizacion->format('d/m/Y') : 'N/A' }}</td>
            <td>
                <textarea name="motivo_{{$contrato->id_contrato}}" class="motivoSolicitud"
                    style="resize: none; overflow: auto; height: 70px; width: 200px;font-size:12px"
                    placeholder="Escriba el motivo de la solicitud..." required></textarea>
            </td>
        </tr>
        @endforeach
      </tbody>
         <tfoot>
        <tr>
            <td colspan="6" style="text-align: right">
            <form action="{{route('usuario.solicitar')}}" method="POST" id="formSolicitar">
                @csrf
                <input type="hidden" name="contratos_seleccionados" id="contratosSeleccionados">
                <input type="hidden" name="motivos" id="motivosSeleccionados">
            <button type="submit" id="solicitarBtn" style="background-color: rgb(4, 4, 110); color: white; border: none; padding: 8px 16px; border-radius: 4px;">SOLICITAR</button>
            </td>
        </tr>
    </tfoot>
    </table>
  </div>
@push('scripts')

  <!-- JS: jQuery + DataTables -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="{{asset('js/solicitar.js')}}"></script>

@endpush
@endsection
