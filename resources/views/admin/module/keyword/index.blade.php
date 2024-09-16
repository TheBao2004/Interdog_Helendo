
@extends('layout.admin')

@section('root')

    @if (empty($detail))
        @include('admin.module.keyword.add')
    @else
        @include('admin.module.keyword.edit', ['detail' => $detail])
    @endif

    <div class="card">
        <div class="card-header">List keyword</div>
        <div class="card-body">

            @include('admin.component.alert-table')

            <div class="mb-3 text-end">
                <a href="{{ route('admin.keyword.index') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>

            <table class="table table-bordered">

                <thead>
                    <tr class="text-light bg-primary">
                        <th width="10%">Id</th>
                        <th>Information</th>
                        <th width="10%">Active</th>
                        <th width="20%">Operation</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <span>Name: {{ $item->name }}</span>
                                <br>
                                <span>Slug: {{ $item->slug }}</span>
                            </td>
                            <td>
                                @if ($item->active == 1)
                                    <span class="text-success">yes</span>
                                @else
                                    <span class="text-danger">no</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.keyword.index', ['id' => $item->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                |
                                <form method="post" class="d-inline-block" action="{{ route('admin.keyword.index', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Confirm');" type="submit"><i class="fa fa-eraser"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>


@endsection
