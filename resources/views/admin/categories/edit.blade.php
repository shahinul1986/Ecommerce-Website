<x-backend.layout.master>

    <x-slot:title>
        Category
        </x-slot>

        <x-slot:pageTitle>
            CATEGORY
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT CATEGORY
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.categories.update',  $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="title" value="{{ old('title', $category->title) }}" class=" @error('title') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <img src="{{ asset('storage/categories/'.$category->image) }}" alt="{{ $category->title }}" height="200px;">

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

                                                <x-forms.input type="file" name="image" class=" @error('image') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="image" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="description" text="description" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('description') ? 'focused error' : '' }}">

                                                <x-forms.textarea class="@error('description') is-invalid @enderror" name="description" value="{{ old('description', $category->description) }}" />

                                            </div>

                                            <x-alerts.error name="description" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_active" text="is active" checked="{{ $category->is_active ? 'checked' : '' }}" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <x-utilities.link-list href="{{ route('admin.categories.index') }}" color="danger" text="back" />
                                        <x-forms.button class="m-t-15" color="primary" text="update" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>