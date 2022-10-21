<section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($brands as $br)
                    @if(isset($br['image']))
                    <div class="col-lg-3">
                        <div class="categories__item set-bg">
                        <img src="user_asset/images/brands/{!! $br['image'] !!}" alt="" style="width:60%"> 
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>