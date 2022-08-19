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
                                EDIT COURSE
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="title" value="{{ old('title', $course->title) }}" class=" @error('title') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="batchNo" text="Batch No" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('batch_no') ? 'focused error' : '' }}">

                                                <x-forms.input type="number" name="batch_no" value="{{ old('batch_no', $course->batch_no) }}" class=" @error('batch_no') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="batch_no" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="classStartDate" text="Class Start Date" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('class_start_date') ? 'focused error' : '' }}">

                                                <x-forms.input type="date" name="class_start_date" value="{{ old('class_start_date', $course->class_start_date) }}" class=" @error('class_start_date') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="class_start_date" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="classEndDate" text="Class End Date" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('class_end_date') ? 'focused error' : '' }}">

                                                <x-forms.input type="date" name="class_end_date" value="{{ old('class_end_date', $course->class_end_date) }}" class=" @error('class_end_date') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="class_end_date" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="instructorName" text="Instructor" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('instructor_name') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="instructor_name" value="{{ old('instructor_name', $course->instructor_name) }}" class=" @error('instructor_name') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="instructor_name" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <img src="{{ asset('storage/courses/'.$course->banner) }}" alt="{{ $course->title }}" height="200px;">

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="image" text="image" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('banner') ? 'focused error' : '' }}">

                                                <x-forms.input type="file" name="banner" class=" @error('banner') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="banner" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="courseType" text="Course Type" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">

                                            <x-forms.select name="course_type">
                                                <x-slot:option>
                                                    <option value="" disabled>Select Course Type</option>
                                                    <option value="Physical" {{ $course->course_type == 'Physical' ? 'selected' : '' }}>Physical</option>
                                                    <option value="Virtual" {{ $course->course_type == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                                </x-slot:option>
                                            </x-forms.select>

                                            <x-alerts.error name="course_type" message="message" />

                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_active" text="is active" checked="{{ $course->is_active ? 'checked' : '' }}" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                        <x-utilities.link-list href="{{ route('admin.courses.index') }}" color="danger" text="back" />

                                        <x-forms.button class="m-t-15" color="primary" text="update" />

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@push('css')
{{-- Bootstrap Select Css --}}
<link href="{{ asset('ui/backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@push('js')
{{-- Select Plugin Js --}}
<script src="{{ asset('ui/backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush

</x-backend.layout.master>