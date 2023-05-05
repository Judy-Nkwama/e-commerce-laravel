@props(['image', 'title'])

<div class="col-lg-3 text-center pb-3">
    <a href="" class="text-decoration-none">
        <img src="{{ $image }}" class="bd-placeholder-img object-fit-cover rounded-circle border border-danger border-3" width="140" height="140" />
        <h4 class="fw-normal text-secondary  my-3">{{ $title }}</h4>
    </a>
</div>
