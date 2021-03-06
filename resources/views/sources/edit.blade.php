<x-app>
    <x-slot name="content">
        <div class="content-wrapper">
            <x-content-header name="Edit Source" :backUrl="route('sources.index')" />

            <section class="content">
                <div class="container-fluid">
                    @if (session()->has('success'))
                        <x-alert-success>{{ session()->get('success') }}</x-alert-success>
                    @endif
                    @if (session()->has('error'))
                        <x-alert-danger>{{ session()->get('error') }}</x-alert-danger>
                    @endif
                    @if ($errors->any())
                        <x-alert-danger>The given data is invalid.</x-alert-danger>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            @can('delete-sources')
                                <form action="{{ route('sources.destroy', $source) }}" method="POST" onsubmit="return confirm('Are you sure want to delete?')" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" id="btn-delete" style="display: none" />
                                </form>
                            @endcan
                            <form role="form" action="{{ route('sources.update', $source->id) }}" method="POST" autocomplete="off" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') ?? $source->name }}">
                                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <x-save-button />
                                        <x-cancel-button :url="route('sources.index')" />
                                        @can('delete-sources')
                                            <a href="javascript:void(0)" class="btn btn-outline-danger border-0" onclick="document.getElementById('btn-delete').click()">
                                                <i class="fas fa-trash-alt fa-fw"></i>
                                                <span>DELETE</span>
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </x-slot>
</x-app>
