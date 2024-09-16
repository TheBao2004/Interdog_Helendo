<div class="card mb-3">
    <div class="card-header">Add variant ( {{ $product->name }} )</div>
    <div class="card-body">

        @include('admin.component.alert-form-error')
        @include('admin.component.alert')

        <form class="row" method="post">

            @csrf

            <div class="col-12 text-end">
                <div class="mb-3">
                    <div class="form-check form-switch text-end">
                        <input @checked(old('active')) name="active" value="1" class="form-check-input" style="float: none" type="checkbox" role="switch">
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="mb-3">
                    {{-- <label class="mb-2">Price</label> --}}
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price ...">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-3">
                <div class="mb-3">
                    {{-- <label class="mb-2">Choose color</label> --}}
                    <select class="form-select" name="color_id">
                        <option value="">choose color</option>
                        @foreach ($colors as $item)
                            <option @selected(old('color_id') ? old('color_id') == $item->id : false) value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-3">
                <div class="mb-3">
                    {{-- <label class="mb-2">Choose size</label> --}}
                    <select class="form-select" name="size_id">
                        <option value="">choose size</option>
                        @foreach ($sizes as $item)
                            <option @selected(old('size_id') ? old('size_id') == $item->id : false) value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('size_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-2">
                <div class="mb-3 text-end">
                   <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>

        </form>
    </div>
</div>
