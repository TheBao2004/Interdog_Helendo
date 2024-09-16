
@if (!empty($edit) && !empty($checked))

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @forelse ($images as $image)
                <div class="item_choose_image">
                    <div class="img_choose_image" style="background-image: url('{{ asset('storage/'.$image) }}')"></div>
                    <div class="hr"></div>
                    <div class="form-check text-center">
                        @if ($radio)
                        <input class="form-check-input" @checked(!empty(old($name)) ? old($name) == $image : $checked == $image) style="float: none" type="radio" value="{{ $image }}" name="{{ $name }}">
                        @else
                        @php
                            $arr = json_decode($checked, true);
                        @endphp
                        <input class="form-check-input" @checked(!empty(old($name)) ? in_array($image, old($name)) : in_array($image, $arr)) style="float: none" type="checkbox" value="{{ $image }}" name="{{ $name }}[]">
                        @endif
                    </div>
                </div>
            @empty

            @endforelse

        </div>
      </div>
    </div>
  </div>

@else

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @forelse ($images as $image)
                <div class="item_choose_image">
                    <div class="img_choose_image" style="background-image: url('{{ asset('storage/'.$image) }}')"></div>
                    <div class="hr"></div>
                    <div class="form-check text-center">
                        @if ($radio)
                        <input class="form-check-input" @checked(!empty(old($name)) ? old($name) == $image : false) style="float: none" type="radio" value="{{ $image }}" name="{{ $name }}">
                        @else
                        <input class="form-check-input" @checked(!empty(old($name)) ? in_array($image, old($name)) : false) style="float: none" type="checkbox" value="{{ $image }}" name="{{ $name }}[]">
                        @endif
                    </div>
                </div>
            @empty

            @endforelse

        </div>
      </div>
    </div>
  </div>

@endif


