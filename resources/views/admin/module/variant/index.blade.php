
@extends('layout.admin')

@section('root')

    <div class="card mb-3">
        <div class="card-header">Operation</div>
        <div class="card-body">
            <div class="mb-3 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (empty($product))
                            Choose product
                        @else
                            {{ $product->name }}
                        @endif
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.variant.index') }}">No product</a></li>
                        @foreach ($products as $item)
                            <li><a class="dropdown-item" href="{{ route('admin.variant.index', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($product))

        @if (empty($detail))
            @include('admin.module.variant.add')
        @else
            @include('admin.module.variant.edit', ['detail' => $detail])
        @endif

        <div class="card">
            <div class="card-header">List variant ( {{ $product->name }} )</div>
            <div class="card-body">

                @include('admin.component.alert-table')

                <div class="mb-3 text-end">
                    <a href="{{ route('admin.variant.index', ['id' => $product->id]) }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
                </div>

                <table class="table table-bordered">

                    <thead>
                        <tr class="text-light bg-primary">
                            <th width="10%">Id</th>
                            <th>Price</th>
                            <th width="15%">Color</th>
                            <th width="15%">Size</th>
                            <th width="10%">Active</th>
                            <th width="20%">Operation</th>
                        </tr>
                    </thead>

                    <tbody>
                        @empty(!$list)
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->color->name }}</td>
                                    <td>{{ $item->size->name }}</td>
                                    <td>
                                        @if ($item->active == 1)
                                            <span class="text-success">yes</span>
                                        @else
                                            <span class="text-danger">no</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.variant.index', ['id' => $product->id, 'ma' => $item->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        |
                                        <form method="post" class="d-inline-block" action="{{ route('admin.variant.delete', ['id' => $product->id, 'ma' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Confirm');" type="submit"><i class="fa fa-eraser"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endempty
                    </tbody>

                </table>

            </div>
        </div>

    @endif




@endsection
