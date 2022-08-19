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
                                ADD NEW SLIDER
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="title"
                                                    value="{{ old('title',$slider->title) }}"
                                                    class=" @error('title') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="sub_title" text="sub title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('sub_title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="sub_title"
                                                    value="{{ old('sub_title',$slider->sub_title) }}"
                                                    class=" @error('sub_title') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="sub_title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="content_position" text="content position" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('content_position') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="content_position"
                                                    value="{{ old('content_position',$slider->content_position) }}"
                                                    class=" @error('content_position') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="content_position" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="btn_text" text="btn text" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('btn_text') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="btn_text"
                                                    value="{{ old('btn_text',$slider->btn_text) }}"
                                                    class=" @error('btn_text') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="btn_link" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="btn_link" text="btn link" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('btn_link') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="btn_link"
                                                    value="{{ old('btn_link',$slider->btn_link) }}"
                                                    class=" @error('btn_link') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="btn_text" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="image" text="image" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('image') ? 'focused error' : '' }}">

                                                <x-forms.input type="file" name="image"
                                                    class=" @error('image') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="image" message="message" />

                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_active" text="is active" checked="" />

                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                        <x-utilities.link-list href="{{ route('admin.sliders.index') }}"
                                            color="danger" text="back" />

                                        <x-forms.button class="m-t-15" color="primary" text="update" />

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>
