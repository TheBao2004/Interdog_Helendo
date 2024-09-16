

<div class="card mb-3">
    <div class="card-header">Add product</div>
    <div class="card-body">

        @include('admin.component.alert-form-error')
        @include('admin.component.alert')

        <form method="post" class="row">

            @csrf

            <div class="col-xs-12 col-sm-11">
                <div class="mb-3">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-1 text-end">
                <div class="mb-3">
                    <label class="mb-2">Active</label>
                    <div class="form-check form-switch text-end">
                        <input @checked(old('active')) name="active" value="1" class="form-check-input" style="float: none" type="checkbox" role="switch">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <label class="mb-2">Weight</label>
                    <input type="text" name="weight" class="form-control" value="{{ old('weight') }}">
                    @error('weight')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <label class="mb-2">Dimensions</label>
                    <input type="text" name="dimensions" class="form-control" value="{{ old('dimensions') }}">
                    @error('dimensions')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="mb-3">
                    <select name="category" data-placeholder="Choose categories" multiple data-multi-select>
                        @foreach ($category as $item)
                            <option @selected(!empty(old('category')) ? in_array($item->id, old('category')) : false) value="{{ $item->id }}">{{ $item->name }}</option>
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
                        @foreach ($keyword as $item)
                            <option @selected(!empty(old('keyword')) ? in_array($item->id, old('keyword')) : false) value="{{ $item->id }}">{{ $item->name }}</option>
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
                        {{ old('description') }}
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
                        'radio' => true
                    ])

                    <label class="mb-2">Thumbnail</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#choose_thumbnail">Choose thumbnail</button>
                    <div class="box_image"></div>
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
                        {{ old('detail') }}
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
                        'radio' => true
                    ])

                    <label class="mb-2">Image detail</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#choose_image_detail">Choose image detail</button>
                    <div class="box_image"></div>
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
                        @empty(!old('feature'))
                            @foreach (old('feature') as $item)
                                <div class="item_feature">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $item }}" name="feature[]">
                                        <button class="btn_delete_feature btn btn-danger" type="button"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @endempty
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
                        'radio' => true
                    ])

                    <label class="mb-2">Image feature</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#choose_image_feature">Choose image feature</button>
                    <div class="box_image"></div>
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
                        'radio' => false
                    ])

                    <label class="mb-2">Album</label><br>
                    <button type="button" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#choose_album">Choose album</button>
                    <div class="box_image"></div>
                    @error('album')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="text-end col-12">
                <button type="submit" class="btn btn-primary">
                    Add
                </button>
            </div>
        </form>


    </div>
</div>
