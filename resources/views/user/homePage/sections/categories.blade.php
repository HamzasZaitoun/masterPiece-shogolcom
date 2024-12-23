<section class="categories-section section-padding" id="categories-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5">Browse by <span>Categories</span></h2>
            </div>
            @foreach($categories as $category)
            <div class="col-lg-2 col-md-4 col-6">
                <div class="categories-block">
                    <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                        <img src="{{asset('uploads/categories/' . $category->category_picture) }}" width="50px" height="50px"  alt="">
                        <p class="categories-block-title">{{$category->category_name}}</p>

                        <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                            <span class="categories-block-number-text bg-slate-900">{{$category->category_id}}</span>
                        </div>
                    </a>
                </div>
                
            </div>
            @endforeach
            

            

            

            

        </div>
    </div>
</section>