<x-backend.layout.master>

    <x-slot:title>
        Color
        </x-slot>

        <x-slot:pageTitle>
            COLOR
            </x-slot>

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-center">Show Color</h3>
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
                                            <b>Color- {{ $color->title }}</b><br>
                                            <b>Color Code- {{ $color->color_code }}</b>
                                        </div>
                                        <div class="card-body m-5">
                                            <button class="btn btn-lg btn-block waves-effect" type="button" style="background-color: {{ $color->color_code }};"></button>
                                            <x-utilities.link-list href="{{ route('admin.colors.index') }}" color="info" text="Go to List" />
                                        </div>
                                        <div class="card-footer text-muted m-t-15">
                                            Created At - {{ $color->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>