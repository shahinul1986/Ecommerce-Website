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
                                UPDATE PRODUCT
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.products.update', $product->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="title" text="title" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="title"
                                                    value="{{ old('title', $product->title) }}"
                                                    class=" @error('title') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="title" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="categories" text="Categories" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        @foreach ($categories as $key => $category)
                                            <div class="form-group">
                                                <x-forms.checkbox name="category[]" text="{{ $category }}"
                                                    id="{{ $key }}" value="{{ $key }}"
                                                    checked="{{ in_array($key, $selectedCategories) ? 'checked' : '' }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="sizes" text="Sizes" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        @foreach ($sizes as $key => $size)
                                            <div class="form-group">
                                                <x-forms.checkbox name="size[]" text="{{ $size }}"
                                                    id="{{ $key }}" value="{{ $key }}"
                                                    checked="{{ in_array($key, $selectedSizes) ? 'checked' : '' }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="colors" text="Colors" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        @foreach ($colors as $key => $color)
                                            <div class="form-group">
                                                <x-forms.checkbox name="color[]" text="{{ $color }}"
                                                    id="{{ $key }}" value="{{ $key }}"
                                                    checked="{{ in_array($key, $selectedColors) ? 'checked' : '' }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="brand" text="Brand" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">

                                            <x-select-brand name="brand_id" text="brand" :selected="$product->brand_id" />

                                            <x-alerts.error name="brand" message="message" />

                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <img src="{{ asset('storage/products/' . $product->image) }}"
                                                alt="{{ $product->title }}" height="200px;">

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
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="price" text="price" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('price') ? 'focused error' : '' }}">

                                                <x-forms.input type="number" name="price"
                                                    value="{{ old('price', $product->price) }}"
                                                    class=" @error('price') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="price" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="discounted_price" text="discounted price" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div
                                                class="form-line {{ $errors->has('discounted_price') ? 'focused error' : '' }}">

                                                <x-forms.input type="number" name="discounted_price"
                                                    value="{{ old('discounted_price', $product->discounted_price) }}"
                                                    class=" @error('discounted_price') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="discounted_price" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="quantity" text="quantity" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div
                                                class="form-line {{ $errors->has('quantity') ? 'focused error' : '' }}">

                                                <x-forms.input type="number" name="quantity"
                                                    value="{{ old('quantity', $product->quantity) }}"
                                                    class=" @error('quantity') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="quantity" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="summary" text="summary" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div
                                                class="form-line {{ $errors->has('summary') ? 'focused error' : '' }}">

                                                <x-forms.textarea class="@error('summary') is-invalid @enderror"
                                                    name="summary" value="{{ old('summary', $product->summary) }}" />

                                            </div>

                                            <x-alerts.error name="summary" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="description" text="description" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div
                                                class="form-line {{ $errors->has('description') ? 'focused error' : '' }}">

                                                <x-forms.textarea class="@error('description') is-invalid @enderror"
                                                    name="description"
                                                    value="{{ old('description', $product->description) }}" />

                                            </div>

                                            <x-alerts.error name="description" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="in_stock" text="in stock"
                                                checked="{{ $product->in_stock ? 'checked' : '' }}" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_featured" text="is featured"
                                                checked="{{ $product->is_featured ? 'checked' : '' }}" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2">
                                        <div class="form-group">

                                            <x-forms.checkbox name="is_active" text="is active"
                                                checked="{{ $product->is_active ? 'checked' : '' }}" />

                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                        <x-utilities.link-list href="{{ route('admin.products.index') }}"
                                            color="danger" text="back" />

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
                <link href="{{ asset('ui/backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}"
                    rel="stylesheet" />
            @endpush

            @push('js')
                {{-- Select Plugin Js --}}
                <script src="{{ asset('ui/backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
            @endpush

</x-backend.layout.master>
