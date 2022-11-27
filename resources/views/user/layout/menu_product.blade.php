<section class="hero hero-normal">
    <div class="container">
        <div class="row">
        <div class="col-lg-3">
				<div class="hero__categories">
					<div class="hero__categories__all">
						<i class="fa fa-bars"></i>
						<span>All Categories</span>
					</div>
					<ul class="submenu-list">
						@foreach($categories as $cat)
						<li class="submenu-list_item"><a href="/categories/{!! $cat['id'] !!}">{!! $cat['name'] !!}</a></li>
						<div class="item-show">

							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									@foreach($brands as $br)
									<a href="#">{!! $br['name'] !!}</a>
									@endforeach
								</p>
							</div>

							<div class="item-show_item">
								<p class="item-show_item-head">
									Loại Sản Phẩm
								</p>
								<p class="item-show_item-content">
									@foreach($cat['Subcategories'] as $sub)
									@if($sub['active'] == 1)
									<a href="#">{!! $sub['name'] !!}</a>
									@endif
									@endforeach
								</p>
							</div>

							<div class="item-show_item">
								<p class="item-show_item-head">
									Giá bán
								</p>
								<p class="item-show_item-content">
									<a href="#">Dưới 2 triệu</a>
									<a href="#">2-5 triệu</a>
									<a href="#">trên 5 triệu</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Phụ kiện
								</p>
								<p class="item-show_item-content">
									<a href="#">Dây chuyền</a>
									<a href="#">Túi đeo</a>
									<a href="#">bao cao su</a>
								</p>
							</div>
							<!-- <div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div>
							<div class="item-show_item">
								<p class="item-show_item-head">
									Thuong hieu
								</p>
								<p class="item-show_item-content">
									<a href="#">wkk</a>
									<a href="#">skms</a>
									<a href="#">sksm</a>
								</p>
							</div> -->
						</div>
						@endforeach
					</ul>
				</div>
			</div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="/search" >
                        <a href="/all_products">
                            <div class="hero__search__categories">
                                -> All Products <-
                            </div>
                        </a>
                            <input type="search" name="search" value="{!! Request::get('search') !!}" placeholder="Search...">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{!! ($about!=null)?$about['phone']:'' !!}</h5>
                            <span>{!! ($about!=null)?$about['worktime']:'' !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	var listItems = document.querySelectorAll('.submenu-list_item');
	var itemShows = document.querySelectorAll('.item-show');

	// listItem.addEventListener('mouseenter', function(){
	// 	itemShow.classList.add('active');
	// })

	listItems.forEach((item, index) => {
		const itemShow = itemShows[index];

		item.addEventListener('mouseenter', function() {
			if (document.querySelector('.item-show.active') && document.querySelector('.submenu-list_item.active')) {
				document.querySelector('.item-show.active').classList.remove('active');
				document.querySelector('.submenu-list_item.active').classList.remove('active');
			}
			itemShow.classList.add('active');
			item.classList.add('active');

		})

	})
</script>