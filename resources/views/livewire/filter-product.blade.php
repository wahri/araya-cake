<div class="col-lg-3 col-md-12 mb-60">
    <div class="card">
        <div class="card-header bg-araya text-light">
            <h4 class="header-title">Filters</h4>
        </div>
        <div class="card-body">

            <h5 class="font-size-16">Kategori Produk</h5>

            @foreach ($categoryProduct as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>