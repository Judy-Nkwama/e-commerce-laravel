<x-admin-layout title="Ürünler">
    <div class="mb-5 text-end">
        <a href="/dashboard/products/new" class="btn btn-sm btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            <span class="ms-1">Yeni Ürün Ekle</span>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Ürün</th>
                    <th>Price</th>
                    <th>Stok</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="fw-bold">#üru{{ $product->id }}</td>
                        <td class="px-3">
                            <div class="adm-prod-sm-img-wrapper rounded shadow-sm border overflow-hidden">
                                <img src="{{ asset("storage/$product->bg_image_link") }}" alt="{{ $product->title }}" class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="fw-semibold fs-5">{{ $product->title }}</div>
                            <div class="limit-lines-3">{{ $product->description }}</div>
                            <div class="mt-2">
                                @foreach (explode(',', $product->tags_string) as $tag)
                                    <div class="bg-danger-ligth rounded-pill fs-7 d-inline-block me-1 px-2 py-1">
                                        {{ $tag }}
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>{{ $product->price }}₺</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <div class="d-flex align-items-center flex-nowrap">
                                <form method="POST" action="products/{{ $product->id }}/toggle-active" class="me-2">
                                    @csrf
                                    <input type="submit"
                                        class="btn btn-sm btn-{{ $product->is_active ? 'danger' : 'success' }}"
                                        value="{{ $product->is_active ? 'Satıştan kaldır' : 'Satışa koy' }}" />
                                </form>
                                <a href="/dashboard/products/edit/{{ $product->id }}" class="btn btn-sm btn-primary me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>

                                <a href="/products/{{ $product->id }}" class="btn btn-sm btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
