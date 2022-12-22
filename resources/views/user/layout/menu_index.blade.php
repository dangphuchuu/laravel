<section class="hero">
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
									Loại Sản Phẩm
								</p>
								<p class="item-show_item-content">
									@foreach($cat['Subcategories'] as $sub)
									@if($sub['active'] == 1)
									<a href="/subcategories/{!! $sub['id'] !!}">{!! $sub['name'] !!}</a>
									@endif
									@endforeach
								</p>
							</div>
						</div>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="hero__search">
					<div class="hero__search__form">
						<form action="/search">
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
				<div class="hero__item set-bg bannerslideshow">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							@foreach($banners as $value)
							@if($value['id'] == 1)
							<div class="carousel-item active">
								<img class="d-block w-100" src="user_asset/images/banners/{!! $value['image'] !!}" alt="First slide" style="height: 450px">
							</div>
							@else
							<div class="carousel-item">
								<img class="d-block w-100" src="user_asset/images/banners/{!! $value['image'] !!}" alt="First slide" style="height: 450px">
							</div>
							@endif
							@endforeach
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
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