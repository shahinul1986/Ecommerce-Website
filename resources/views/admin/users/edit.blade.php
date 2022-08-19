<x-backend.layout.master>

    <x-slot:title>
        User
        </x-slot>

        <x-slot:pageTitle>
            USER
            </x-slot>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT USER
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="name" text="name" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="name" value="{{ old('name', $user->name) }}" class=" @error('name') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="name" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="email" text="email" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line {{ $errors->has('email') ? 'focused error' : '' }}">

                                                <x-forms.input type="text" name="email" value="{{ old('email', $user->email) }}" class=" @error('email') is-invalid @enderror" />

                                            </div>

                                            <x-alerts.error name="email" message="message" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                        <x-forms.label for="role" text="Role" />

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">

                                            {{-- <x-forms.select name="role_id">
                                                <x-slot:option>
                                                    <option value="" disabled selected>Select Role Type</option>
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{ $role->role }}</option>
                                                    @endforeach
                                                </x-slot:option>
                                            </x-forms.select> --}}

                                            <x-select-role name="role_id" text="role" :selected="$user->role_id"/>

                                            <x-alerts.error name="role" message="message" />

                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

                                        <x-utilities.link-list href="{{ route('admin.users.index') }}" color="danger" text="back" />

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