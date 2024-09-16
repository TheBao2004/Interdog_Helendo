<ul class="bg-dark list-group list-group-flush sidebar">
    <li class="list-group-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_category">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_category">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_category" aria-expanded="false"
                        aria-controls="body_category">
                        Category
                    </button>
                </h2>
                <div id="body_category" class="accordion-collapse collapse"
                    aria-labelledby="head_category" data-bs-parent="#box_category">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.category.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_keyword">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_keyword">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_keyword" aria-expanded="false"
                        aria-controls="body_keyword">
                        Keyword
                    </button>
                </h2>
                <div id="body_keyword" class="accordion-collapse collapse"
                    aria-labelledby="head_keyword" data-bs-parent="#box_keyword">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.keyword.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_color">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_color">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_color" aria-expanded="false"
                        aria-controls="body_color">
                        Color
                    </button>
                </h2>
                <div id="body_color" class="accordion-collapse collapse"
                    aria-labelledby="head_color" data-bs-parent="#box_color">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.color.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_size">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_size">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_size" aria-expanded="false"
                        aria-controls="body_size">
                        Size
                    </button>
                </h2>
                <div id="body_size" class="accordion-collapse collapse"
                    aria-labelledby="head_size" data-bs-parent="#box_size">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.size.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_product">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_product">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_product" aria-expanded="false"
                        aria-controls="body_product">
                        Product
                    </button>
                </h2>
                <div id="body_product" class="accordion-collapse collapse"
                    aria-labelledby="head_product" data-bs-parent="#box_product">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.product.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="accordion accordion-flush" id="box_variant">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="head_variant">
                    <button class="accordion-button collapsed p-0 text-light bg-dark" type="button"
                        data-bs-toggle="collapse" data-bs-target="#body_variant" aria-expanded="false"
                        aria-controls="body_variant">
                        Variant
                    </button>
                </h2>
                <div id="body_variant" class="accordion-collapse collapse"
                    aria-labelledby="head_variant" data-bs-parent="#box_variant">
                    <div class="accordion-body p-0">
                        <ul class="bg-dark list-group list-group-flush sidebar">
                            <li class="list-group-item"><a href="{{ route('admin.variant.index') }}">List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item"><a href="{{ route('admin.file.index') }}">File</a></li>
</ul>
