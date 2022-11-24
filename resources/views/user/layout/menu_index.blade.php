<style>
	.submenu-medium {
		width: 200px !important;
	}

	.submenu-list {
		margin-right: 30px;
		background: #ffffff;
		width: 100% !important;
		border-radius: 10px;
	}

	.submenu-list_item {
		position: relative;
		color: #ffffff;
		min-height: 38px;
		display: flex;
		align-items: center;
		cursor: pointer;
		padding: 0 0 0 20px;
	}

	.submenu-list_item.active {
		background: red;
		height: 50px;
		padding-left: 30px !important;
		transition: all 0.3s ease-in-out;
		
	}

	.submenu-list_item.active a{
		color: #fff;
	} 


	.submenu-list_item:first-child {
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}

	.submenu-list_item:last-of-type {
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
	}

	/* .submenu-list_item:hover:after {}

	/* .submenu-list_item:hover{
background-color: red;
} */

	.submenu-list_item:hover .item-show {
		display: block;
	}

	.item-show {
		display: none;
		position: absolute;
		background-color: #ffffff;
		top: 10px;
		left: 100%;
		min-width: 800px;
		height: 400px;
		margin-left: 5px;
		border-radius: 8px;
		padding: 20px 0;
		color: #fff;
		flex-wrap: wrap;
		z-index: 1000;
	}

	.item-show.active {
		display: flex;
	}

	.item-show_item {
		margin: 0 20px;
		flex: auto;
	}

	p.item-show_item-head {
		color: #ff0000;
		font-size: 17px;
	}


	.item-show_item-content {
		display: flex;
		flex-direction: column;
	}

	.item-show_item-content a {
		line-height: 22px;
		text-decoration: none;
		color: #000;
	}

	.item-show_item-content a:hover {
		color: red;
	}

	.bannerslideshow {
		position: relative;

	}

	.prevbanner,
	.nextbanner {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto !important;
		padding: 16px;
		margin-top: -22px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
	}

	.nextbanner {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	.prevbanner:hover,
	.nextbanner:hover {
		background-color: rgba(0, 0, 0, 0.8);
	}

	.nextbanner {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	/* .mySlides {} */

	.fade {
		animation-name: fade;
		animation-duration: 1.5s;
	}

	@keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}
</style>
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
									Danh mục con
								</p>
								<p class="item-show_item-content">
									@foreach($cat['Subcategories'] as $sub)
									<a href="#">{!! $sub['name'] !!}</a>
									@endforeach
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
									All Products
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