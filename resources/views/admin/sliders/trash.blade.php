<x-backend.layout.master>
    <x-slot:title>
        Slider
    </x-slot:title>

    <x-slot:pageTitle>
        Sliders
    </x-slot:pageTitle>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Slider Trash List
            <a class="btn btn-sm btn-primary" href="{{ route('admin.sliders.index') }}">List</a>
        </div>
        <div class="card-body">

            {{-- @if ($errors->any())
                <x-admin.alerts.errors />
            @endif --}}

            <x-alerts.message type="success" :message="session('message')" />

            <table class="table">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Button Text</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->sub_title }}</td>
                            <td>{{ $slider->btn_text }}</td>
                            <td class="align-center"><img src="{{ asset('storage/sliders/' . $slider->image_uri) }}"
                                    alt="{{ $slider->title }}" width="50" height="50">
                            </td>
                            <td>

                                <form method="post"
                                    action="{{ route('admin.sliders.restore', ['id' => $slider->id]) }}"
                                    style="display:inline">
                                    @csrf
                                    @method('patch')
                                    <x-forms.button color="warning"
                                        onclick="return confirm('Are you sure want to restore?')" text="Restore" />
                                </form>


                                <form method="post" action="{{ route('admin.sliders.delete', ['id' => $slider->id]) }}"
                                    style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <x-forms.button color="danger"
                                        onclick="return confirm('Are you sure want to delete permanently?')"
                                        text="Delete" />
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $sliders->links() }}

        </div>
    </div>

    {{-- page specific css --}}
    @push('css')
    @endpush

    {{-- page specific js --}}
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('ui/backend') }}/js/datatables-simple-demo.js"></script>
    @endpush

</x-backend.layout.master>
