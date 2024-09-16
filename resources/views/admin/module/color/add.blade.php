

    <div class="card mb-3">
        <div class="card-header">Add color</div>
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


                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>
                </div>

            </form>


        </div>
    </div>
