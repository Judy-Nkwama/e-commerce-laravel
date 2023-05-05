<x-layout>

    <div class="container w-50 my-5 pb-5">
        <h3 class="my-5 text-danger text-center">Hesap Oluştur</h3>
        <form method="POST" action="/signup" class="needs-validation text-secondary mb-5 pb-5">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Ad</label>
                    <input type="text" class="form-control" name="firstname" id="firstName" placeholder="" value="{{old("firstname")}}" required>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Soyad</label>
                    <input type="text" class="form-control" name="lastname" id="lastName" placeholder="" value="{{old("lastName")}}" required>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{old("address")}}" placeholder="Örnek: 43 Malta Mah. Hasan Sok. İzmit Kocaeli" required>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 w-50">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select w-100" name="city" value="{{old("city")}}" id="state" required>
                        <option value="">Choose...</option>
                        <option value="Kocaeli">Kocaeli</option>
                        <option value="İstanbul">İstanbul</option>
                        <option value="Manisa">Manisa</option>
                        <option value="İzmit">İzmit</option>
                    </select>
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 w-50">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control w-100" value="{{old("zip")}}" name="zip" id="zip" placeholder="Ör: 41000" required>
                    @error('zip')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="col-12">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old("email")}}" placeholder="Ör: sen@örnek.com">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 my-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" name="password" id="password" value="{{old("password")}}" placeholder="En az 4 karakter içermeli" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-danger mb-3" type="submit">Hesap Oluştur</button>
            <a href="/login" class="w-100 btn btn-outline-danger">Hesabınız var mı?</a>
        </form>
    </div>
</x-layout>
