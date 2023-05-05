<x-layout>

    <div class="container w-50 my-5 pb-5">
        <h3 class="my-5 text-danger text-center">Oturum Aç</h3>
        <form method="POST" action="/login" class="needs-validation text-secondary mb-5 pb-5">
            @csrf
            @error('auth_failure')
                <div class="py-2 text-danger text-center">{{ $message }}</div>
            @enderror
            <div class="col-12">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Ör: sen@örnek.com">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 my-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"
                    required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-danger mb-3" type="submit">Oturum Aç</button>
            <a href="/signup" class="w-100 btn btn-outline-danger">Hesabınız yok mu?</a>
        </form>
    </div>
</x-layout>
