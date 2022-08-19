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
                                EDIT COLOR
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.colors.update',  $color->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                               <x-forms.input type="text" name="title" value="{{ old('title', $color->title) }}" class=" @error('title') is-invalid @enderror" />

                                            </div>
                                            
                                            <x-alerts.error name="title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        
                                        <x-forms.label for="colorCode" text="select color code" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('color_code') ? 'focused error' : '' }}">
                                            
                                                <x-forms.input type="color" name="color_code" value="{{ old('color_code') ?? $color->color_code }}" class=" @error('color_code') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="color_code" message="message" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <x-utilities.link-list href="{{ route('admin.colors.index') }}" color="danger" text="back" />
                                        <x-forms.button class="m-t-15" color="primary" text="update" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>