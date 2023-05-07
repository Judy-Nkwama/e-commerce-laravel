@php
    $sepet_items = auth()
        ->user()
        ->sepet()
        ->get();
    $nbr_of_items = count($sepet_items);
    
    $toplam = 0;
    for ($i = 0; $i < $nbr_of_items; $i++) {
        $toplam += $sepet_items[$i]->number * $sepet_items[$i]->product()->first()->price;
    }
@endphp

<x-layout>
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-lg-5 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-danger">Sepetim</span>
                        <span class="badge bg-danger rounded-pill">{{ $nbr_of_items }}</span>
                    </h4>
                    <ul class="list-group border rounded mb-3">

                        @foreach ($sepet_items as $item)
                            @php
                                $product = $item->product()->first();
                            @endphp

                            <div>
                                <li class="d-flex justify-content-between flex-nowrap p-2">
                                    <div class="d-flex flex-grow-1">
                                        <div class="adm-prod-sm-img-wrapper rounded shadow-sm border overflow-hidden">
                                            <img src="{{ asset("storage/$product->bg_image_link") }}" alt=""
                                                class="img-fluid w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center text-secondary px-3">
                                            <span class="text-nowrap pe-1 overflow-hidden"
                                                style="max-width: 150px; text-overflow: ellipsis;">{{ $product->title }}</span>
                                            <span class="fw-bold">{{ $product->price }}₺</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-0 align-items-center ">
                                        <div class="btn-group btn-group-sm me-2 text-danger" role="group"
                                            aria-label="Basic outlined">
                                            <button type="button" class="btn btn-sm btn-outline-danger px-2">-</button>
                                            <div
                                                class="d-flex align-items-center border-top border-bottom border-danger w-100 px-3">
                                                {{ $item->number }}
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger px-2">+</button>
                                        </div>
                                        <form method="POST" action="/sepet">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                            <button type="button" class="btn btn-sm btn-danger px-3">x</button>
                                        </form>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between border-0 border-top ">
                            <span>Toplam (Turk Lirası)</span>
                            <strong>₺{{ $toplam }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2"
                                    placeholder="Apartment or suite">
                            </div>

                            <div class="col-md-5">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address">Shipping address is the same as my
                                billing
                                address</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">Save this information for next
                                time</label>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                    checked required>
                                <label class="form-check-label" for="credit">Credit card</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                    required>
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                    required>
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</x-layout>
