@extends('layout.client.index')

@section('title')
    Chi tiết
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">home</a></li>
                        <li><a href="#">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="menu_details mt_100 xs_mt_75 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-10 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100"
                                        src="{{ asset('storage/' . $dish_detail->anh_mon_an) }}" alt="product"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_details_text">
                        <h2>{{ $dish_detail->ten_mon_an }}</h2>
                        <h3 class="price">
                            {{ number_format($dish_detail->gia_mon_an, 0, ',', '.') }} đ
                        </h3>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <p class="short_description">
                            {{ $dish_detail->mo_ta }}
                        </p>

                        <div class="details_quentity">
                            <h5>select quentity</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                    <input type="text" placeholder="1">
                                    <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3>$320.00</h3>
                            </div>
                        </div>
                        <ul class="details_button_area d-flex flex-wrap">
                            <li><a class="common_btn" href="#">add to cart</a></li>
                            <li><a class="common_btn" href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    <p>Ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur
                                        ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis
                                        voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto.
                                        Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo
                                        cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem!
                                        Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo
                                        itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore. vero
                                        veritatis reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate
                                        tempora ea incidunt iste, corporis, quo cumque facere doloribus possimus nostrum
                                        sed magni quasi</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit Doloribus.</li>
                                        <li>Dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt.</li>
                                        <li>Corporis quo cumque facere doloribus possimus nostrum sed magni quasi.</li>
                                        <li>Incidunt iste corporis quo cumque facere doloribus possimus nostrum sed.
                                        </li>
                                        <li>Incidunt iste corporis quo cumque facere doloribus possimus nostrum sed.
                                        </li>
                                        <li>Architecto Debitis nesciunt inventore voluptate tempora ea.</li>
                                        <li>Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur.</li>
                                        <li>Laudantium placeat sed velit aspernatur nobis quos quibusdam distinctio.
                                        </li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt
                                        dolor laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio
                                        voluptatum officia vel sapiente enim, reprehenderit impedit beatae molestias
                                        dolorum. A laborum consectetur sed quis exercitationem optio consequatur, unde
                                        neque est odit, pariatur quae incidunt quasi dolorem nihil aliquid ut veritatis
                                        porro eaque cupiditate voluptatem vel ad! Asperiores, praesentium. sit amet
                                        consectetur adipisicing elit. Doloribus consectetur ullam in? Beatae, dolorum ad
                                        ea deleniti ratione voluptatum similique omnis voluptas tempora optio soluta</p>

                                    <ul>
                                        <li>Reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit Doloribus.</li>
                                        <li>Dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt.</li>
                                        <li>Corporis quo cumque facere doloribus possimus nostrum sed magni quasi.</li>
                                        <li>Incidunt iste corporis quo cumque facere doloribus possimus nostrum sed.
                                        </li>
                                        <li>Incidunt iste corporis quo cumque facere doloribus possimus nostrum sed.
                                        </li>
                                    </ul>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur
                                        ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis
                                        voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto.
                                        Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo
                                        cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem!
                                        Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo
                                        itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 reviews</h4>
                                            <div class="comment pt-0 mt_20">
                                                <div class="single_comment m-0 border-0">
                                                    <img src="images/client_1.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_2.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_3.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_4.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>

                                                <div class="pagination mt_30">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <nav aria-label="...">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-left"></i></a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">1</a></li>
                                                                    <li class="page-item active"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="post_review">
                                                <h4>write a Review</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="related_menu mt_90 xs_mt_60">
                <h2>related item</h2>
                <div class="row related_product_slider">
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="images/menu2_img_1.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">Biryani</a>
                                <a class="title" href="menu_details.html">Hyderabadi biryani</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>24</span>
                                </p>
                                <h5 class="price">$65.00 <del>$90.00</del></h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="images/menu2_img_2.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">Chicken</a>
                                <a class="title" href="menu_details.html">Daria Shevtsova</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>30</span>
                                </p>
                                <h5 class="price">$80.00</h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="images/menu2_img_3.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">burger</a>
                                <a class="title" href="menu_details.html">Spicy Burger</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>17</span>
                                </p>
                                <h5 class="price">$100.00 <del>$110.00</del></h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="images/menu2_img_4.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">dressert</a>
                                <a class="title" href="menu_details.html">Fried Chicken</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>22</span>
                                </p>
                                <h5 class="price">$99.00</h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="images/menu2_img_5.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">kabab</a>
                                <a class="title" href="menu_details.html">Mozzarella Sticks</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>72</span>
                                </p>
                                <h5 class="price">$75.00</h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
