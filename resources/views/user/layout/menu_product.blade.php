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

</style>
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