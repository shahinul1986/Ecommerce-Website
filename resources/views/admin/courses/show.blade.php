<x-backend.layout.master>

    <x-slot:title>
        Course
        </x-slot>

        <x-slot:pageTitle>
            COURSE
            </x-slot>

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-center">Show Course</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div class="card text-center">
                                        <div class="card-header">
                                            Course - {{ $course->title }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->course_type }}</h5>
                                            <div class="row clearfix">
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-1 col-md-offset-1">
                                                    <div class="form-group">

                                                        <img src="{{ asset('storage/courses/'.$course->banner) }}" alt="{{ $course->title }}" height="200px;">

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a class="btn btn-primary" href="{{ route('admin.courses.index') }}">Go to List</a> --}}
                                            <x-utilities.link-list href="{{ route('admin.courses.index') }}" color="info" text="Go to List" />
                                        </div>
                                        <div class="card-footer text-muted m-t-15">
                                            Created At - {{ $course->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>