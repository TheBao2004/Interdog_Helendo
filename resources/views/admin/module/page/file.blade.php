@extends('layout.admin')


@section('root')

    <div class="card mb-3">
        <div class="card-header">Operation</div>
        <div class="card-body">

            @include('admin.component.alert')

            <form action="{{ route('admin.file.upload') }}" method="post" class="text-end d-flex" enctype="multipart/form-data">
                @csrf
                <input type="file" name="files[]" class="form-control" multiple>
                <div class="mx-3"></div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

        </div>
    </div>



    <div class="card">
        <div class="card-header">List file</div>
        <div class="card-body">

            @forelse ($files as $item)
                <div class="item_choose_image">
                    <div class="text-end">
                        <a href="{{ route('admin.file.delete', ['path' => $item]) }}" onclick="return confirm('Confirm')" class="text-danger"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="hr"></div>
                    <div class="img_choose_image" style="background-image: url('{{ asset('storage/'.$item) }}')"></div>
                </div>
            @empty

            @endforelse



        </div>
    </div>


@endsection
