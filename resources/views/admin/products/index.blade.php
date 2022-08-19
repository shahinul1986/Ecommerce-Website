<x-backend.layout.master>

    <x-slot:title>
        Product
        </x-slot>

        <x-slot:pageTitle>
            PRODUCT
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL PRODUCTS
                                <a class="btn btn-success waves-effect pull-right" href="{{ route('admin.products.create') }}">
                                    <i class="material-icons">add</i>
                                    <span>Add New Product</span>
                                </a>
                            </h2><br>
                            <x-alerts.message id="productId" class="text-white" type="success" :message="session('message')" />
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Summary</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Summary</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ Str::limit($product->summary, 20) }}</td>
                                            @if (file_exists('storage/products/'.$product->image))
                                                <td class="align-center"><img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->title }}" width="50" height="50"></td>
                                            @else
                                                <td class="align-center"><img src="{{ $product->image }}" alt="{{ $product->title }}" width="50" height="50"></td>
                                            @endif

                                            <td>{{ $product->price }}</td>
                                            <td><span class="badge {{ $product->is_active ? 'bg-green' : 'bg-pink' }}">{{ $product->is_active ? 'Active' : 'Inactive' }}</span></td>
                                            <td class="text-center" style="white-space:nowrap;">
                                                <x-utilities.link-show href="{{ route('admin.products.show', $product->id) }}" text="SHOW" />
                                                <x-utilities.link-edit href="{{ route('admin.products.edit', $product->id) }}" text="EDIT" />
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-forms.button onclick="return confirm('Are you sure want to delete ?')" data-toggle="tooltip" data-placement="top" title="DELETE" icon="delete" color="danger" />
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @push('css')
            {{-- JQuery DataTable Css --}}
            <link href="{{ asset('ui/backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
            @endpush

            @push('js')
            {{-- Jquery DataTable Plugin Js --}}
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
            {{-- Jquery DataTable --}}
            <script src="{{ asset('ui/backend/assets/js/pages/tables/jquery-datatable.js') }}"></script>

            {{-- Show Tooltop on Buttons --}}
            <script>
                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>

            @endpush

</x-backend.layout.master>