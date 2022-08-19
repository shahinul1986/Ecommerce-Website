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
                                ADD NEW COURSE
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="title" value="{{ old('title') }}" class=" @error('title') is-invalid @enderror" />

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
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="number" name="batch_no" value="{{ old('batch_no') }}" class=" @error('batch_no') is-invalid @enderror" />

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

                                                <x-forms.input type="date" name="class_start_date" value="{{ old('class_start_date') }}" class=" @error('class_start_date') is-invalid @enderror" />

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

                                                <x-forms.input type="date" name="class_end_date" value="{{ old('class_end_date') }}" class=" @error('class_end_date') is-invalid @enderror" />

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

                                                <x-forms.input type="text" name="instructor_name" value="{{ old('instructor_name') }}" class=" @error('instructor_name') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="instructor_name" message="message" />

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

                                            {{--  <x-forms.select name="course_type">
                                                <x-slot:option>
                                                    <option value="" selected disabled>Select Course Type</option>
                                                    <option value="Physical">Physical</option>
                                                    <option value="Virtual">Virtual</option>
                                                </x-slot:option>
                                            </x-forms.select>  --}}
                                            <select class="form-control show-tick" data-live-search="true" name="course_type" id="courseType">
                                                <option value="" selected disabled>Select Course Type</option>
                                                <option value="Physical">Physical</option>
                                                <option value="Virtual">Virtual</option>
                                            </select>

                                            <x-alerts.error name="course_type" message="message" />

                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_active" text="is active" checked="" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                        <x-utilities.link-list href="{{ route('admin.courses.index') }}" color="danger" text="back" />

                                        <x-forms.button class="m-t-15" color="primary" text="submit" />

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