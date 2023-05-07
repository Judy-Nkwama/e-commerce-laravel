<x-admin-layout title="Yeni Ürün Ekle">
    <div class="container">
        <form method="POST" action="/products" enctype="multipart/form-data" class="needs-validation text-secondary">
            @csrf
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="title" class="form-label">Ürün adı</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder=""
                        value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Ürün tanıtan metin.."
                        value="{{ old('description') }}"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="price" class="form-label">Fiyat</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Ör: 237"
                        value="{{ old('price') }}" required>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="price" class="form-label">Mevcut Stok</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Ör: 10"
                        value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="tags_string" class="form-label">Etiketler</label>
                    <input type="text" class="form-control" name="tags_string" id="tags_string" placeholder="Ör: Çocuk,kadın,Aksesuar"
                        value="{{ old('tags_string') }}" required>
                    @error('tags_string')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="bg_image_link" class="form-label">Ürün resimi</label>
                    <input type="file" class="form-control" name="bg_image_link" id="bg_image_link"
                        required>
                    @error('bg_image_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr class="my-4">
            <button class="w-100 btn btn-danger mb-3" type="submit">Ürün Ekle</button>
        </form>
    </div>
</x-admin-layout>
