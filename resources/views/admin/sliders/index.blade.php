<x-backend.layout.master>

    <x-slot:title>
        Slider
        </x-slot>

        <x-slot:pageTitle>
            SLIDER
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL SLIDER
                                <x-utilities.link-create href="{{ route('admin.sliders.trash') }}" class="pull-right" btnType="info" text="Trash" icon="delete" />
                                <x-utilities.link-create href="{{ route('admin.sliders.create') }}"
                                    class="pull-right m-r-5" btnType="success" text="Add New slider" icon="add" />
                            </h2><br>
                            <x-alerts.message id="sliderId" class="text-white" type="success" :message="session('message')" />
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Button Text</th>
                                            <th>image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Button Text</th>
                                            <th>image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->sub_title }}</td>
                                                <td>{{ $slider->btn_text }}</td>
                                                <td class="align-center">
                                                    <img src="{{ asset('storage/sliders/' . $slider->image_uri) }}"
                                                        alt="{{ $slider->title }}" width="50" height="50">
                                                </td>
                                                <td class="text-center" style="white-space:nowrap;">
                                                    <x-utilities.link-show
                                                        href="{{ route('admin.sliders.show', $slider->id) }}"
                                                        text="SHOW" />
                                                    <x-utilities.link-edit
                                                        href="{{ route('admin.sliders.edit', $slider->id) }}"
                                                        text="EDIT" />
                                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                        method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-forms.button
                                                            onclick="return confirm('Are you sure want to delete ?')"
                                                            data-toggle="tooltip" data-placement="top" title="TRASH"
                                                            icon="delete" color="danger" />
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
                <link
                    href="{{ asset('ui/backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
                    rel="stylesheet">
            @endpush

            @push('js')
                {{-- Jquery DataTable Plugin Js --}}
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}">
                </script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}">
                </script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}">
                </script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}">
                </script>
                <script src="{{ asset('ui/backend/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}">
                </script>
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
