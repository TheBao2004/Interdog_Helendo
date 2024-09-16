<div class="card mb-3">
    <div class="card-header">Edit product ( {{ $detail->name }} )</div>
    <div class="card-body">

        @include('admin.component.alert-form-error')
        @include('admin.component.alert')

        <form method="post" class="row">

            @csrf
            @method('PUT')

            <div class="col-xs-12 col-sm-11">
                <div class="mb-3">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $detail->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-1 text-end">
                <div class="mb-3">
                    <label class="mb-2">Active</label>
                    <div class="form-check form-switch text-end">
                        <input @checked(old('active') ? old('active') : $detail->active) name="active" value="1" class="form-check-input"
                            style="float: none" type="checkbox" role="switch">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <label class="mb-2">Weight</label>
                    <input type="text" name="weight" class="form-control"
                        value="{{ old('weight') ?? $detail->weight }}">
                    @error('weight')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <label class="mb-2">Dimensions</label>
                    <input type="text" name="dimensions" class="form-control"
                        value="{{ old('dimensions') ?? $detail->dimensions }}">
                    @error('dimensions')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <select name="category" data-placeholder="Choose categories" multiple data-multi-select>
                        @php
                            $arr = json_decode($detail->category, true);
                        @endphp
                        @foreach ($category as $item)
                            <option @selected(!empty(old('category')) ? in_array($item->id, old('category')) : in_array($item->id, $arr)) value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <select name="keyword" data-placeholder="Choose keywords" multiple data-multi-select>
                        @php
                            $arr = json_decode($detail->keyword, true);
                        @endphp
                        @foreach ($keyword as $item)
                            <option @selected(!empty(old('keyword')) ? in_array($item->id, old('keyword')) : in_array($item->id, $arr)) value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('keyword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="mb-3">
                    <label class="mb-2">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">
                        {{ old('description') ?? $detail->description }}
                    </textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="mb-3">

                    @include('admin.component.modal-choose-image', [
                        'images' => $files,
                        'title' => 'Choose thumbnail',
                        'id' => 'choose_thumbnail',
                        'name' => 'thumbnail',
                        'radio' => true,
                        'edit' => true,
                        'checked' => $detail->thumbnail,
                    ])

                    <label class="mb-2">Thumbnail</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal"
                        data-bs-target="#choose_thumbnail">Choose thumbnail</button>
                    <div class="box_image">
                        <img src="{{ asset('storage/' . $detail->thumbnail) }}" width="95%" alt="Error">
                    </div>
                    @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="col-xs-12 col-sm-8">
                <div class="mb-3">
                    <label class="mb-2">Detail</label>
                    <textarea name="detail" class="form-control" cols="30" rows="10">
                        {{ old('detail') ?? $detail->detail }}
                    </textarea>
                    @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="mb-3">

                    @include('admin.component.modal-choose-image', [
                        'images' => $files,
                        'title' => 'Choose image detail',
                        'id' => 'choose_image_detail',
                        'name' => 'image_detail',
                        'radio' => true,
                        'edit' => true,
                        'checked' => $detail->image_detail,
                    ])

                    <label class="mb-2">Image detail</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal"
                        data-bs-target="#choose_image_detail">Choose image detail</button>
                    <div class="box_image">
                        <img src="{{ asset('storage/' . $detail->image_detail) }}" width="95%" alt="Error">
                    </div>
                    @error('image_detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="col-xs-12 col-sm-8">
                <div class="mb-3">

                    <div class="row mb-3">
                        <div class="col-8">
                            <label class="mb-2">Features</label>
                        </div>
                        <div class="col-4 text-end">
                            <span class="btn btn-success" id="btn_add_feature"><i class="fa fa-plus"></i> feature</span>
                        </div>
                    </div>


                    <div class="box_feature">
                        @if (!empty(old('feature')))
                            @foreach (old('feature') as $item)
                                <div class="item_feature">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $item }}"
                                            name="feature[]">
                                        <button class="btn_delete_feature btn btn-danger" type="button"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @php
                                $arr = json_decode($detail->feature, true);
                            @endphp
                            @foreach ($arr as $item)
                                <div class="item_feature">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $item }}"
                                            name="feature[]">
                                        <button class="btn_delete_feature btn btn-danger" type="button"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    @error('feature')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="mb-3">

                    @include('admin.component.modal-choose-image', [
                        'images' => $files,
                        'title' => 'Choose image feature',
                        'id' => 'choose_image_feature',
                        'name' => 'image_feature',
                        'radio' => true,
                        'edit' => true,
                        'checked' => $detail->image_feature,
                    ])

                    <label class="mb-2">Image feature</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal"
                        data-bs-target="#choose_image_feature">Choose image feature</button>
                    <div class="box_image">
                        <img src="{{ asset('storage/' . $detail->image_feature) }}" width="95%" alt="Error">
                    </div>
                    @error('image_feature')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="col-12">
                <div class="mb-3">

                    @include('admin.component.modal-choose-image', [
                        'images' => $files,
                        'title' => 'Choose album',
                        'id' => 'choose_album',
                        'name' => 'album',
                        'radio' => false,
                        'edit' => true,
                        'checked' => $detail->album,
                    ])

                    <label class="mb-2">Album</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal"
                        data-bs-target="#choose_album">Choose album</button>
                    <div class="box_image">
                        @if (!empty(old('album')))
                            @foreach (old('album') as $item)
                                <div class="item_choose_image">
                                    <div class="img_choose_image"
                                        style="background-image: url('{{ asset('storage/' . $item) }}')"></div>
                                </div>
                            @endforeach
                        @else
                            @php
                                $album = json_decode($detail->album, true);
                            @endphp
                            @foreach ($album as $item)
                                <div class="item_choose_image">
                                    <div class="img_choose_image"
                                        style="background-image: url('{{ asset('storage/' . $item) }}')"></div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    @error('album')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="text-end col-12">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>


    </div>
</div>
