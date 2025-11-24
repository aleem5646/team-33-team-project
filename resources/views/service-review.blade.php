@extends('layouts.customer-layout')
@section('title','Service Review')
@section('content')

<section class="max-w-7xl mx-auto px-4 py-12">

    <div class="mb-8 text-center">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
            Review Our Service
        </h1>
        <p class="mt-2 text-gray-600">
            Leave a review! How was our service?
        </p>
    </div>

    @if(session()->has('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-2xl p-6 sm:p-8">
        <form action="{{ route('service-review.sub') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-2x1 font-bold text-gray-600 mb-1">
                    Rate us!
                </label>

                <div id="star-rating" class="flex items-center gap-2" role="radiogroup" aria-label="Service rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <input
                            type="radio"
                            name="rating"
                            id="star{{ $i }}"
                            value="{{ $i }}"
                            class="sr-only"
                            {{ old('rating') == $i ? 'checked' : '' }}
                            required
                        >
                        <label
                            for="star{{ $i }}"
                            data-star="{{ $i }}"
                            class="star cursor-pointer text-3xl sm:text-4xl select-none text-gray-300 transition"
                            title="{{ $i }} star{{ $i > 1 ? 's' : '' }}"
                        >
                            ★
                        </label>
                    @endfor
                </div>
            </div>

            <div>
                <label for="review" class="block text-sm font-semibold text-gray-700 mb-2">
                    Your Review
                </label>
                <textarea
                    id="review"
                    name="review"
                    rows="12" 
                    maxlength="1000"
                    placeholder="Tell us what you liked, or what we need to work on..."
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition"
                    required
                >{{ old('review') }}</textarea>

                <div class="flex justify-between mt-2 text-xs text-gray-500">
                    <span>Your review helps us to improve our service!</span>
                    <span id="char-count"> 0 / 1000 </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between pt-2">
                <button
                    type="submit"
                    class="inline-flex justify-center rounded-xl bg-[#9aa07b] px-6 py-3 text-white font-semibold shadow hover:bg-[#858b67] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#9aa07b] transition"
                >
                    Submit Review
                </button>

                <a href="{{ route('home') }}" class="text-sm font-semibold text-[#9aa07b] hover:text-[#858b67] text-center transition">
                    Back to Home
                </a>
            </div>
        </form>
    </div>
</section>
<script>
    const rating = document.getElementById('star-rating');
    const stars = Array.from(rating.querySelectorAll('.star'));
    const svals = Array.from(rating.querySelectorAll('input[name="rating"]'));
    let lockedRating = svals.find(r => r.checked)?.value || 0;
    function paintStars(value) {
        stars.forEach(star => {
            const starVal = Number(star.dataset.star);
            if (starVal <= value) {
                star.classList.add('text-amber-400');
                star.classList.remove('text-gray-300');
            } else {
                star.classList.add('text-gray-300');
                star.classList.remove('text-amber-400');
            }
        });
    }
    paintStars(lockedRating);
    stars.forEach(star => {
        const starVal = Number(star.dataset.star);
        star.addEventListener('mouseenter', () => {
            paintStars(starVal);
        });
        star.addEventListener('click', () => {
            lockedRating = starVal;
            const sval = sval.find(r => Number(r.value) === starVal);
            if (sval) sval.checked = true;
            paintStars(lockedRating);
        });
    });
    rating.addEventListener('mouseleave', () => {
        paintStars(lockedRating);
    });
    const review = document.getElementById('review');
    const count = document.getElementById('char-count');
    const updateCount = () => {
        count.textContent = `${review.value.length} / 1000`;
    };
    updateCount();
    review.addEventListener('input', updateCount);
</script>

@endsection
