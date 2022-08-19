<x-backend.layout.master>

    <x-slot:title>
        Color
        </x-slot>

        <x-slot:pageTitle>
            COLOR
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL COLORS

                                <x-utilities.link-create href="{{ route('admin.colors.create') }}" class="pull-right" btnType="success" text="Add New Color" icon="add" />

                            </h2><br>

                            <x-alerts.message id="colorId" class="text-white" type="success" :message="session('message')" />
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $color->title }}</td>
                                            <td>{{ $color->color_code }}</td>
                                            <td><button class="btn btn-lg btn-block waves-effect" type="button" style="background-color: {{ $color->color_code }};"></button></td>
                                            <td class="text-center" style="white-space:nowrap;">
                                                <x-utilities.link-show href="{{ route('admin.colors.show', $color->id) }}" text="SHOW" />
                                                <x-utilities.link-edit href="{{ route('admin.colors.edit', $color->id) }}" text="EDIT" />
                                                <form action="{{ route('admin.colors.destroy', $color->id) }}" method="POST" style="display:inline">
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

            {{-- Bootstrap Latest compiled and minified JavaScript --}}



            {{-- Show Tooltop on Buttons --}}
            <script>
                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>

            @endpush

</x-backend.layout.master>