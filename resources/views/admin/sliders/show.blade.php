<x-backend.layout.master>

    <x-slot:title>
        Slider
        </x-slot>

        <x-slot:pageTitle>
            SLIDERS
            </x-slot>

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-center">Show Slider</h3>
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
                                            Slider - {{ $slider->title }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $slider->description }}</h5>
                                            {{--  <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Go to List</a>  --}}
                                            <div><img src="{{ asset('storage/sliders/'.$slider->image_uri) }}" alt="{{ $slider->title }}" height="200px;"></div>
                                            <x-utilities.link-list href="{{ route('admin.sliders.index') }}" color="info" text="Go to List" />
                                        </div>
                                        <div class="card-footer text-muted m-t-15">
                                            Created At - {{ $slider->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>