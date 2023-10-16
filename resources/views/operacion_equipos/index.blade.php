  <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Serie</th>
                            <th class="text-center">Cod. Patrimonial</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operacion_equipos as $key => $oquipos)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $oquipos->serie }}</td>
                                <td>{{ $oquipos->cod_patrimonial }}</td>
                                <td>{{ $oquipos->cat }}</td>
                                <td>{{ $oquipos->nombre }}</td>
                                
                                <td>
                                    <form action="{{route('operacion_equipos.destroy',$oquipos->id )}}" method="POST" style="display: inline-block;" onsubmit="return confirm('Esta Seguro de Elimiar el Pago?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" rel="tooltip">
                                            <i i class="fas fa-trash" ></i>
                                        </button>
                                        </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->




@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

    
@endpush
