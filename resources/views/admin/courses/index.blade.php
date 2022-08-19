<x-backend.layout.master>

    <x-slot:title>
        Course
        </x-slot>

        <x-slot:pageTitle>
            COURSE
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL COURSES
                                {{-- <a class="btn btn-success waves-effect pull-right" href="{{ route('admin.courses.create') }}">
                                <i class="material-icons">add</i>
                                <span>Add New Course</span>
                                </a> --}}
                                <x-utilities.link-create href="{{ route('admin.courses.trash') }}" class="pull-right" btnType="info" text="Trash" icon="delete" />
                                <x-utilities.link-create href="{{ route('admin.courses.create') }}" class="pull-right m-r-5" btnType="success" text="Add New Course" icon="add" />

                            </h2><br>
                            {{-- @if(request()->session()->has('message'))
                                <div class="alert alert-success m-5" role="alert">
                                    {{ session('message') }}
                        </div>
                        @endif --}}
                        <x-alerts.message id="cateroryId" class="text-white" type="success" :message="session('message')" />
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Batch No</th>
                                        <th>Course Type</th>
                                        <th>Class Start Date</th>
                                        <th>Class End Date</th>
                                        <th>Instructor Name</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Batch No</th>
                                        <th>Course Type</th>
                                        <th>Class Start Date</th>
                                        <th>Class End Date</th>
                                        <th>Instructor Name</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->batch_no }}</td>
                                        <td>{{ $course->course_type }}</td>
                                        <td>{{ Carbon\Carbon::parse($course->course_start_date)->format('d-m-Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($course->course_end_date)->format('d-m-Y') }}</td>
                                        <td>{{ $course->instructor_name }}</td>
                                        <td class="align-center"><img src="{{ asset('storage/courses/'.$course->banner) }}" alt="{{ $course->title }}" width="50" height="50"></td>
                                        <td><span class="badge {{ $course->is_active ? 'bg-green' : 'bg-pink' }}">{{ $course->is_active ? 'Active' : 'Inactive' }}</span></td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            <x-utilities.link-show href="{{ route('admin.courses.show', $course->id) }}" text="SHOW" />
                                            <x-utilities.link-edit href="{{ route('admin.courses.edit', $course->id) }}" text="EDIT" />
                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <x-forms.button onclick="return confirm('Are you sure want to delete ?')" data-toggle="tooltip" data-placement="top" title="TRASH" icon="delete" color="danger" />
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