<x-backend.layout.master>

    <x-slot:title>
        Districts
        </x-slot>

        <x-slot:pageTitle>
            DISTRICT
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DISTRICT
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.districts.update',  $district->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="name" text="name" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">

                                               <x-forms.input type="text" name="name" value="{{ old('name', $district->name) }}" class=" @error('name') is-invalid @enderror" />

                                            </div>
                                            
                                            <x-alerts.error name="name" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <x-utilities.link-list href="{{ route('admin.districts.index') }}" color="danger" text="back" />
                                        <x-forms.button class="m-t-15" color="primary" text="update" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>