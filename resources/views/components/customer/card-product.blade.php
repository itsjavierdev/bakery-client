@props(['image', 'name', 'price'])

<div
    class="bg-white w-60 rounded-md shadow-card mx-6 mb-9 transition-transform duration-400 ease-in-out transform hover:translate-y-[-1%] hover:shadow-card-hover cursor-pointer max-w-250px ">
    <img width="240" class="rounded-t-md" src="{{ asset('storage/' . $image) }}" alt="">
    <div class="py-4 flex flex-col justify-between items-center" style="height:158px">
        <div>
            <h5 class="tracking-widest text-xl text-center uppercase">{{ $name }}</h5>
        </div>

        <h5>Bs {{ $price }}</h5>
        <div class="flex flex-col items-center gap-3">
            {{ $slot }}
        </div>

    </div>
</div>
