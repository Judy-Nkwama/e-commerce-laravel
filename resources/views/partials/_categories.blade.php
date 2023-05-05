@php
    $categories = [
        [
            'title' => 'Kadın',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Erkek',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Çocuk',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Bebek',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Aksesuar',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Popüler',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Liputa',
            'image' => 'https://picsum.photos/200/300',
        ],
        [
            'title' => 'Bazön',
            'image' => 'https://picsum.photos/200/300',
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
