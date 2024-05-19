<!--=============================
        FOOTER START
    ==============================-->
<footer style="background: url(images/footer_bg.jpg);">
    <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_20">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-between">
                <div class="col-xxl-4 col-lg-4 col-sm-9 col-md-7">
                    <div class="footer_content">
                        <a class="footer_logo" href="index.html">
                            <img src="{{ asset('images/footer_logo.png') }}" alt="RegFood" class="img-fluid w-100">
                        </a>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta facere delectus qui
                            placeat inventore consectetur repellendus optio debitis.</span>
                        <ul class="social_link d-flex flex-wrap">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-2 col-sm-5 col-md-5">
                    <div class="footer_content">
                        <h3>Short Link</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Our Service</a></li>
                            <li><a href="#">gallery</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-2 col-sm-6 col-md-5 order-md-4">
                    <div class="footer_content">
                        <h3>Help Link</h3>
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-9 col-md-7 order-lg-4">
                    <div class="footer_content">
                        <h3>contact us</h3>
                        <p class="info"><i class="fas fa-phone-alt"></i> +44 (0) 20 9994 7740</p>
                        <p class="info"><i class="fas fa-envelope"></i> themefaxbd@gmail.com</p>
                        <p class="info"><i class="far fa-map-marker-alt"></i> Blackwell Street,Dry Creek,Alaska</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom d-flex flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer_bottom_text">
                        <p>Copyright ©<b> RegFood</b> 2023. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=============================
        FOOTER END
    ==============================-->


<!--=============================
        SCROLL BUTTON START
    ==============================-->
<div class="scroll_btn"><i class="fas fa-hand-pointer"></i></div>
<!--=============================
        SCROLL BUTTON END
    ==============================-->


</body>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/gh/lelinh014756/fui-toast-js@master/assets/js/toast@1.0.1/fuiToast.min.js"></script>

<!--jquery library js-->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('js/Font-Awesome.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- isotop js -->
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<!-- counter up js -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.countup.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<!-- venobox js -->
<script src="{{ asset('js/venobox.min.js') }}"></script>
<!-- sticky sidebar js -->
<script src="{{ asset('js/sticky_sidebar.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- ex zoom js -->
<script src="{{ asset('js/jquery.exzoom.js') }}"></script>

<!--main/custom js-->
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.add-to-favorite').click(function(e) {
            e.preventDefault();

            var dishId = $(this).data('dish-id');

            $.ajax({
                url: '{{ route('client.favorite.store') }}',
                method: 'POST',
                data: {
                    id_mon_an: dishId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        FuiToast(response.success, {
                            style: {
                                backgroundColor: '#1DC071',
                                width: 'auto',
                            },
                            className: 'dark-mode'
                        });
                    }
                    if (response.error) {
                        FuiToast(response.error, {
                            style: {
                                backgroundColor: 'yellow',
                                width: 'auto',
                                color: "#000000"
                            },
                            className: 'dark-mode'
                        });
                    }
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.rm-to-favorite').click(function(e) {
            e.preventDefault();

            var fvr_id = $(this).data('fvr-id');

            $.ajax({
                url: '{{ route('client.favorite.remove') }}',
                method: 'POST',
                data: {
                    fvr_id: fvr_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        FuiToast(response.success, {
                            style: {
                                backgroundColor: '#1DC071',
                                width: 'auto',
                                color: "#ffffff",
                            },
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                    if (response.error) {
                        FuiToast(response.error, {
                            style: {
                                backgroundColor: 'yellow',
                                width: 'auto',
                                color: "#000000",
                            },
                        });
                    }
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.add_to_cart').on('click', function(e) {
            e.preventDefault()

            var dish_id = $(this).data('dish-id')
            var dish_name = $(this).data('dish-name')
            var dish_img = $(this).data('dish-img')
            var dish_price = $(this).data('dish-price')
            var dish_price = $(this).data('dish-price')
            total_cart_popup = parseInt(dish_price)
            dish_price = dish_price.toLocaleString('vi-VN');

            // alert(dish_id)
            // alert(dish_name)
            // alert(dish_img)
            // alert(dish_price)

            $('#cartModal #dish_id').text(dish_id)
            $('#cartModal .cart_popup_img img').attr('src', dish_img)
            $('#cartModal .cart_popup_text .title').text(dish_name)
            $('#cartModal .cart_popup_text .price').text(dish_price + ' VND')

            let sum_price_cart_popup = $('#sum_cart_popup')
            sum_price_cart_popup.text(dish_price + ' VND')

            let btn_minus = $('.quentity_btn .btn-danger')
            let btn_plus = $('.quentity_btn .btn-success')
            let input_quantity = $('.quentity_btn input')

            // nhap so luong
            input_quantity.off('input').on('input', function() {
                let value = $(this).val()
                value = parseInt(value)
                if (isNaN(value) || value === 0) {
                    $(this).val(1);
                    value = 1;
                }

                let new_total = update_total_price_cart_popup(total_cart_popup, value)
                sum_price_cart_popup.text(new_total.toLocaleString('vi-VN') + ' VND')
            })

            // giam so luong
            btn_minus.off('click').on('click', function() {
                let currentQuantity = parseInt(input_quantity.val())
                if (currentQuantity > 0) {
                    currentQuantity -= 1;
                    currentQuantity = currentQuantity < 1 ? 1 : currentQuantity;
                    input_quantity.val(currentQuantity);

                    let new_total = update_total_price_cart_popup(total_cart_popup,
                        currentQuantity);
                    sum_price_cart_popup.text(new_total.toLocaleString('vi-VN') + ' VND');
                }
            })

            // tang so luong
            btn_plus.off('click').on('click', function() {
                let currentQuantity = parseInt(input_quantity.val())
                currentQuantity += 1;
                input_quantity.val(currentQuantity)
                let new_total = update_total_price_cart_popup(total_cart_popup, currentQuantity)
                sum_price_cart_popup.text(new_total.toLocaleString('vi-VN') + ' VND')
            })

            sum_price_cart_popup.text()
        })

        $('#cartModal').on('hidden.bs.modal', function(e) {
            reset_cart_popup()
        })

        // cap nhat tong gia cua san pham gio hang 
        function update_total_price_cart_popup(price, quantity) {
            let sum_price_cart_popup = $('.sum_price_cart_popup')
            let newTotalPrice = price * quantity
            return newTotalPrice
        }

        function reset_cart_popup() {
            // khi thoat phan them gio hang, gia tri lai nhu ban dau
            var dish_id = $(this).data('dish-id')
            var dish_name = $(this).data('dish-name')
            var dish_img = $(this).data('dish-img')
            var dish_price = $(this).data('dish-price')

            $('#cartModal .cart_popup_img img').attr('src', dish_img)
            $('#cartModal .cart_popup_text .title').text(dish_name)
            $('#cartModal .cart_popup_text .price').text(dish_price + ' VND')

            $('.quentity_btn input').val(1)

            let sum_price_cart_popup = $('#sum_cart_popup')
            sum_price_cart_popup.text(dish_price + ' VND')
        }
    })
</script>

<script>
    $(document).ready(function() {
        let btn_add_cart = $('#cartModal .common_btn')
        btn_add_cart.on('click', function(e) {
            e.preventDefault()

            let dish_id = $('#dish_id').text()
            let quantity = $('.quentity_btn input')
                .val()

            $.ajax({
                url: '{{ route('client.cart.add') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dish_id': dish_id,
                    'quantity': quantity
                },
                success: function(response) {
                    if (response.success) {
                        FuiToast(response.success, {
                            style: {
                                backgroundColor: '#1DC071',
                                width: 'auto',
                                color: "#ffffff",
                            }
                        })
                    }
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        var so_luong = $('.quantity-input')
        var tong_tien = $('.pro_tk h6')
        var sub_total_cart = $('.subtotal span')
        var total_cart = $('.total span')

        let decrease_btn = $('.decrease-btn')
        let increase_btn = $('.increase-btn')

        decrease_btn.off('click').on('click', function(e) {
            e.preventDefault()
            var cart_id = $(this).data('cart-id')
            let currentQuantity = parseInt(so_luong.val())
            if (currentQuantity > 0) {
                currentQuantity -= 1
                currentQuantity = currentQuantity < 1 ? 1 : currentQuantity
                so_luong.val(currentQuantity)
                let price = $(".pro_status h6")
                let total_price = parseFloat(price.text().replace(/[^\d]/g, ''))
                let new_price = update(currentQuantity, total_price)
                // console.log('new_price:', new_price)
                tong_tien.text(new_price.toLocaleString('vi-VN') + ' VND')

                updateTotalItemsInCart()

                $.ajax({
                    url: '{{ route('client.cart.update') }}',
                    method: 'PUT',
                    data: {
                        cart_id: cart_id,
                        so_luong: currentQuantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            FuiToast(response.message, {
                                style: {
                                    backgroundColor: '#1DC071',
                                    width: 'auto',
                                    color: "#ffffff",
                                }
                            })
                        }
                    },
                })
            }
        })

        increase_btn.off('click').on('click', function(e) {
            e.preventDefault()
            var cart_id = $(this).data('cart-id')
            let currentQuantity = parseInt(so_luong.val())
            currentQuantity += 1
            so_luong.val(currentQuantity)
            let price = $(".pro_status h6")
            let total_price = parseFloat(price.text().replace(/[^\d]/g, ''))
            let new_price = update(currentQuantity, total_price)
            // console.log('new_price:', new_price)
            tong_tien.text(new_price.toLocaleString('vi-VN') + ' VND')

            updateTotalItemsInCart()

            $.ajax({
                url: '{{ route('client.cart.update') }}',
                method: 'PUT',
                data: {
                    cart_id: cart_id,
                    so_luong: currentQuantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        FuiToast(response.message, {
                            style: {
                                backgroundColor: '#1DC071',
                                width: 'auto',
                                color: "#ffffff",
                            }
                        })
                    }
                },
            })
        })

        function update(quantity, price) {
            let newTotalPrice = price * quantity
            return newTotalPrice
        }

        function updateTotalItemsInCart() {
            let tong_tien_elements = $(".pro_tk h6")
            let total_cart = 0

            $.each(tong_tien_elements, function() {
                let tong_tien = parseFloat($(this).text().replace(/[^\d]/g, ''))
                total_cart += tong_tien
            })

            $(".subtotal span").text(total_cart.toLocaleString('vi-VN') + ' VND')
            $(".total span").text(total_cart.toLocaleString('vi-VN') + ' VND')
        }
    })
</script>

</html>
