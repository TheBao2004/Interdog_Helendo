@php
    use App\Models\Category;
    use App\Models\Keyword;
@endphp


@extends('layout.admin')

@section('root')

    @if (empty($detail))
        @include('admin.module.product.add')
    @else
        @include('admin.module.product.edit', ['detail' => $detail])
    @endif

    <div class="card">
        <div class="card-header">List product</div>
        <div class="card-body">

            @include('admin.component.alert-table')

            <div class="mb-3 text-end">
                <a href="{{ route('admin.product.index') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>

            <table class="table table-bordered" id="table_seven">

                <thead>
                    <tr class="text-light bg-primary">
                        <th width="5%">Id</th>
                        <th>Information</th>
                        <th width="17%">Thumbnail</th>
                        <th width="15%">Categories</th>
                        <th width="15%">Keywords</th>
                        <th width="10%">Active</th>
                        <th width="15%">Operation</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <span>Name: {{ $item->name }}</span><br>
                                <span>Slug: {{ $item->slug }}</span><br>
                                <span>SKU: {{ $item->id }}</span>
                            </td>
                            <td>
                                <img width="95%" src="{{ asset('storage/'.$item->thumbnail) }}" alt="Error">
                            </td>
                            <td>
                                @php
                                    $category = json_decode($item->category, true);
                                @endphp
                                @foreach ($category as $badge)
                                    @php
                                        $detail = Category::find($badge);
                                    @endphp
                                    <span class="badge text-bg-primary">{{ $detail->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @php
                                    $keyword = json_decode($item->keyword, true);
                                @endphp
                                @foreach ($keyword as $badge)
                                    @php
                                        $detail = Keyword::find($badge);
                                    @endphp
                                    <span class="badge text-bg-primary">{{ $detail->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($item->active == 1)
                                    <span class="text-success">yes</span>
                                @else
                                    <span class="text-danger">no</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.product.index', ['id' => $item->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                |
                                <form method="post" class="d-inline-block" action="{{ route('admin.product.delete', ['id' => $item->id]) }}">
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
