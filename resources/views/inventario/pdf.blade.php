<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Inventario</li>
                    </ol>
                </div>
            </div>
        </div>
    @endsection
    @section('content')        
    <div class="row mt-2">
        <div class="col-12">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header text-center">
                    <h3>Lista de Productos</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        
                        <div wire:ignore>
                            <table id="tablaProductos" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>                                        
                                        <th>Nombre</th>
                                        <th>Medida</th>
                                        <th>Valor de compra</th>
                                        <th>Valor de venta</th>
                                        <th>Cantidad en inventario</th>                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->categoria->nombre }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->unidad_medida }}</td>
                                            <td>{{ $producto->valor_compra }}</td>
                                            <td>{{ $producto->valor_venta }}</td>
                                            <td>{{ $producto->cantidad }}</td>                                                                                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>               
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                       
                   
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('#tablaProductos').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "scrollX": true,
                    dom :'Bfrtilp',
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        titleAttr: 'Exportar a PDF',
                        className :'btn bg-gradient-navy',
                        title:'producto',
                    }],     
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                    }
                });
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
    @endpush
</x-app-layout>