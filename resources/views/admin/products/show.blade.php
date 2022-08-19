<x-backend.layout.master>

    <x-slot:title>
        Product
        </x-slot>

        <x-slot:pageTitle>
            PRODUCT
            </x-slot>

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-center">Show Product</h3>
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
                                            Product - {{ $product->title }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->description }}</h5>
                                            <div>
                                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->title }}" height="200px;">
                                            </div>
                                            {{--  <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Go to List</a>  --}}
                                            <x-utilities.link-list href="{{ route('admin.products.index') }}" color="info" text="Go to List" />
                                        </div>
                                        <div class="card-footer text-muted m-t-15">
                                            Created At - {{ $product->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-backend.layout.master>