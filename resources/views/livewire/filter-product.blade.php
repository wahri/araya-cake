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

            <div class="accordion" id="accordionFilterCategory">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            Cake
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionFilterCategory">
                        <div class="card-body">
                            Some placeholder content for the first accordion panel. This panel is shown by default,
                            thanks to the <code>.show</code> class.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            Roti
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFilterCategory">
                        <div class="card-body">
                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            Donat
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionFilterCategory">
                        <div class="card-body">
                            And lastly, the placeholder content for the third and final accordion panel. This panel is
                            hidden by default.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
