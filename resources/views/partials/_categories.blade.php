@php
    $categories = [
        [
            'title' => 'Kadın',
            'image' => '7.png',
        ],
        [
            'title' => 'Erkek',
            'image' => '5.png',
        ],
        [
            'title' => 'Çocuk',
            'image' => '6.png',
        ],
        [
            'title' => 'Bebek',
            'image' => '6.png',
        ],
        [
            'title' => 'Aksesuar',
            'image' => '2.png',
        ],
        [
            'title' => 'Popüler',
            'image' => '1.png',
        ],
        [
            'title' => 'Liputa',
            'image' => '8.png',
        ],
        [
            'title' => 'Bazön',
            'image' => '4.png',
        ],
    ];
@endphp

<div class="container marketing my-5">
    <h2 class="text-center text-danger mb-5">Kategoriler</h2>
    <div class="row">
        @foreach ($categories as $category)
            @php
                $category = (object) $category;
            @endphp
            <x-category image="{{ $category->image }}" title="{{ $category->title }}" />
        @endforeach
    </div>
</div>
