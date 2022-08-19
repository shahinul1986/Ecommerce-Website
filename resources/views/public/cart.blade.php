<x-frontend.layout.master>

    <x-slot:title>
        Cart
        </x-slot>

        <main class="main cart">
            <div class="page-content pt-7 pb-10">
                <div class="step-by pr-4 pl-4">
                    <h3 class="title title-simple title-step active"><a href="{{ route('public.cart') }}">1. Shopping Cart</a></h3>
                    <h3 class="title title-simple title-step"><a href="{{ route('orders.create') }}">2. Checkout</a></h3>
                    <h3 class="title title-simple title-step"><a href="{{ route('orders.index') }}">3. Order Complete</a></h3>
                </div>
                <div class="container mt-7 mb-2">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 pr-lg-4">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th><span>Product</span></th>
                                        <th></th>
                                        <th><span>Price</span></th>
                                        <th><span>quantity</span></th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItemsAll as $item)

                                    <tr>
                                        <td class="product-thumbnail">
                                            <figure>
                                                <a href="product-simple.html">
                                                    <img src="{{ asset('storage/products/' . $item->product->image) }}" width="100" height="100" alt="product">
                                                </a>
                                            </figure>
                                        </td>
                                        <td class="product-name">
                                            <div class="product-name-section">
                                                <a href="product-simple.html">{{ $item->product->title }}</a>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">${{ $item->unit_price }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="input-group">
                                                <button class="quantity-minus d-icon-minus qty-btn"></button>
                                                {{--  <input class="quantity form-control qty-input" value="{{ $item->qty }}" type="number" min="1" max="1000000">  --}}
                                                <input class="form-control qty-input" value="{{ $item->qty }}" type="number" min="1" max="1000000" style="font-weight: 700;">
                                                <button class="quantity-plus d-icon-plus qty-btn"></button>
                                            </div>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">${{ $item->total_price }}</span>
                                        </td>
                                        <td class="product-close">
                                            <a href="#" data-id="{{$item->id}}" class="product-remove remove-btn" title="Remove this product">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td class="product-thumbnail">
                                            <figure>
                                                <a href="product-simple.html">
                                                    <img src="{{ asset('ui/frontend/assets/images') }}/products/product19.jpg" width="100" height="100" alt="product">
                                    </a>
                                    </figure>

                                    </td>
                                    <td class="product-name">
                                        <div class="product-name-section">
                                            <a href="product-simple.html">Women Beautiful Headgear</a>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">$98.00</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <button class="quantity-minus d-icon-minus qty-btn"></button>
                                            <input class="quantity form-control qty-input" type="number" min="1" max="1000000">
                                            <button class="quantity-plus d-icon-plus qty-btn"></button>
                                        </div>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">$98.00</span>
                                    </td>
                                    <td class="product-close">
                                        <a href="#" class="product-remove remove-btn" title="Remove this product">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <div class="cart-actions mb-6 pt-4">
                                <a href="{{ route('public.shop') }}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
                                <button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded btn-disabled">Update
                                    Cart</button>
                            </div>
                            <div class="cart-coupon-box mb-8">
                                <h4 class="title coupon-title text-uppercase ls-m">Coupon Discount</h4>
                                <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4" id="coupon_code" value="" placeholder="Enter coupon code here...">
                                <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply
                                    Coupon</button>
                            </div>
                        </div>
                        <aside class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                                <div class="summary mb-4">
                                    <h3 class="summary-title text-left">Cart Totals</h3>
                                    <table class="shipping">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td>
                                                {{-- <p id="subTotal" class="summary-subtotal-price">$426.99</p>  --}}
                                                <p id="subTotal" class="summary-subtotal-price">$0.00</p>
                                            </td>
                                        </tr>
                                        <tr class="sumnary-shipping shipping-row-last">
                                            <td colspan="2">
                                                <h4 class="summary-subtitle">Calculate Shipping</h4>
                                                <ul>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat_rate" name="shipping" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="flat_rate">Flat
                                                                rate</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                            <label class="custom-control-label" for="free-shipping">Free
                                                                shipping</label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="local_pickup" name="shipping" class="custom-control-input">
                                                            <label class="custom-control-label" for="local_pickup">Local
                                                                pickup</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="shipping-address">
                                        <label>Shipping to <strong>CA.</strong></label>
                                        <div class="select-box">
                                            <select name="country" class="form-control">
                                                <option value="us" selected>United States (US)</option>
                                                <option value="uk"> United Kingdom</option>
                                                <option value="fr">France</option>
                                                <option value="aus">Austria</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select name="country" class="form-control">
                                                <option value="us" selected>California</option>
                                                <option value="uk">Alaska</option>
                                                <option value="fr">Delaware</option>
                                                <option value="aus">Hawaii</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="code" placeholder="Town / City" />
                                        <input type="text" class="form-control" name="code" placeholder="ZIP" />
                                        <a href="#" class="btn btn-md btn-dark btn-rounded btn-outline">Update
                                            totals</a>
                                    </div>
                                    <table class="total">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td>
                                                {{-- <p id="grandTotal" class="summary-total-price ls-s">$426.99</p>  --}}
                                                <p id="grandTotal" class="summary-total-price ls-s">$0.00</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('orders.create') }}" class="btn btn-dark btn-rounded btn-checkout">Proceed to
                                        checkout</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

        </main>

        @push('css')

        @endpush

        @push('js')
        <script>
            init();

            function init() {
                //setTotalItemCount();
                setGrandTotal();
            }

            const removeBtn = document.querySelectorAll('.remove-btn');
            removeBtn.forEach((btn) => {
                console.log(btn);
                btn.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    removeFromCart(itemId);
                    this.parentElement.parentElement.remove()
                    //setTotalItemCount();
                    setGrandTotal();
                });
            })

            const qtyInput = document.querySelectorAll('.qty-input');
            qtyInput.forEach((input) => {
                input.addEventListener('change', function() {
                    // used substring to remove $ sign
                    const unitPrice = this.parentElement.parentElement.previousElementSibling.children[0].innerText.substring(1);
                    const qty = this.value;
                    const totalPriceElement = this.parentElement.parentElement.nextElementSibling.children[0];
                    const updatePrice = parseFloat(unitPrice) * parseInt(qty);
                    //console.log(updatePrice);
                    // used math function to round number to 2 decimal
                    totalPriceElement.innerText = '$' + (Math.round((updatePrice + Number.EPSILON) * 100) / 100).toFixed(2);;
                    setGrandTotal();
                });
            })

            const qtyBtn = document.querySelectorAll('.qty-btn');
            qtyBtn.forEach((btn) => {
                btn.addEventListener('click', function() {
                    //console.log(this.className);
                    //if(btn.classList.contains("quantity-plus")){alert('hiiiii')};
                    // used substring to remove $ sign
                    const unitPrice = this.parentElement.parentElement.previousElementSibling.children[0].innerText.substring(1);
                    let qty = 1;
                    if (btn.classList.contains("quantity-plus")) {
                        qty = this.previousElementSibling.value;
                        //console.log(qty);
                    } else {
                        qty = this.nextElementSibling.value;
                        //console.log(qty);
                    }
                    const totalPriceElement = this.parentElement.parentElement.nextElementSibling.children[0];
                    const updatePrice = parseFloat(unitPrice) * parseInt(qty);
                    //console.log(updatePrice);
                    // used math function to round number to 2 decimal
                    totalPriceElement.innerText = '$' + (Math.round((updatePrice + Number.EPSILON) * 100) / 100).toFixed(2);
                    setGrandTotal();
                });
            })

            function setGrandTotal() {
                const tbodyElement = document.querySelector('tbody');
                //console.log(tbodyElement.children);
                let totalPrice = 0;
                for (let i = 0; i < tbodyElement.children.length; i++) {
                    const item = tbodyElement.children[i];
                    const price = item.children[4].innerText;
                    totalPrice += parseFloat(price.substring(1));
                }
                document.querySelector('#subTotal').innerText = '$' + (Math.round((totalPrice + Number.EPSILON) * 100) / 100).toFixed(2);
                document.querySelector('#grandTotal').innerText = '$' + (Math.round((totalPrice + Number.EPSILON) * 100) / 100).toFixed(2);
            }

            function setTotalItemCount() {
                const tbodyElement = document.querySelector('tbody');
                const totalItemCount = document.querySelector('#totalItem');
                totalItemCount.innerText = tbodyElement.children.length;
            }

            async function removeFromCart(id) {
                const res = await fetch(`cart-items/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    method: 'delete'
                });
                const result = await res.json();
                if (result.status) {
                    const cartItemCountElement = document.querySelector('#cartItemCount');
                    cartItemCountElement.innerText = parseInt(cartItemCountElement.innerText) - 1;
                    alert(result.message)
                }
            }
        </script>

        @endpush

</x-frontend.layout.master>