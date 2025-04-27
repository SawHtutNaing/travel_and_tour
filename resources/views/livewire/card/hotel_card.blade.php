<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Carousel</title>

    <style>
        .carousel-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            flex: 0 0 100%;
            width: 100%;
        }

        /* For screens md and above, show multiple slides */
        @media (min-width: 768px) {
            .carousel-slide {
                flex: 0 0 50%;
                width: 50%;
            }
        }

        @media (min-width: 1024px) {
            .carousel-slide {
                flex: 0 0 33.333333%;
                width: 33.333333%;
            }
        }

        .carousel-dots .dot {
            transition: all 0.3s ease;
        }

        .carousel-dots .dot.active {
            width: 1.5rem;
            background-color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">

    <div class="container mx-auto  px-4">


        <!-- Carousel Container -->
        <div class="carousel-container rounded-2xl">
            <!-- Carousel Track -->
            <div class="carousel-track">
                <!-- Destination Cards -->

                @foreach ($hotels as $hotel)

                <div class="carousel-slide p-2"  onclick="redirect('{{ route('user.hotel_booking', $hotel->id) }}')">
                    <div class="overflow-hidden shadow-lg destination-card group rounded-2xl">
                        <div class="relative overflow-hidden">
                            <img src="
                            {{ $hotel->image }}
                            "
                                alt="Santorini" class="object-cover w-full h-64 transition duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                            <div class="absolute text-white bottom-4 left-4">
                                <h3 class="text-xl font-bold">{{ $hotel->name }}</h3>
                                <p class="text-sm">{{ $hotel->location }}</p>
                                <p class="text-sm">{{ $hotel->amount_per_day }}</p>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach


            </div>

            <!-- Navigation Arrows -->
            <button class="carousel-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md transition-all z-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>

            <button class="carousel-next absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-md transition-all z-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>

        {{-- <div class="carousel-dots flex justify-center mt-4 space-x-2">
            @foreach ($hotels as $index => $hotel)
                <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all {{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div> --}}

    </div>

    <script>




function redirect(url) {
    window.location.href = url;
}
        document.addEventListener('DOMContentLoaded', function() {




            // Carousel elements
            const track = document.querySelector('.carousel-track');
            const slides = document.querySelectorAll('.carousel-slide');
            const prevButton = document.querySelector('.carousel-prev');
            const nextButton = document.querySelector('.carousel-next');
            const dots = document.querySelectorAll('.carousel-dots .dot');
            const container = document.querySelector('.carousel-container');

            let currentIndex = 0;
            let slideWidth = 100; // Percentage
            let slidesToShow = 1;
            let autoplayInterval;
            const autoplayDelay = 5000; // 5 seconds

            // Update slidesToShow based on screen width
            function updateSlidesToShow() {
                if (window.innerWidth >= 1024) {
                    slidesToShow = 3;
                } else if (window.innerWidth >= 768) {
                    slidesToShow = 2;
                } else {
                    slidesToShow = 1;
                }

                // Update slide width
                slideWidth = 100 / slidesToShow;
                slides.forEach(slide => {
                    slide.style.flex = `0 0 ${slideWidth}%`;
                    slide.style.width = `${slideWidth}%`;
                });

                // Move to current slide (adjust for new slidesToShow)
                goToSlide(currentIndex);
            }

            // Initialize slidesToShow
            updateSlidesToShow();

            // Listen for window resize
            window.addEventListener('resize', updateSlidesToShow);

            // Function to go to a specific slide
            function goToSlide(index) {
                // Ensure index is within bounds
                const totalSlides = slides.length;
                const maxIndex = totalSlides - slidesToShow;

                if (index < 0) {
                    index = maxIndex;
                } else if (index > maxIndex) {
                    index = 0;
                }

                currentIndex = index;

                // Move the track
                track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                // Update dots
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === currentIndex);
                });
            }

            // Next slide
            function nextSlide() {
                goToSlide(currentIndex + 1);
            }

            // Previous slide
            function prevSlide() {
                goToSlide(currentIndex - 1);
            }

            // Set up event listeners
            prevButton.addEventListener('click', prevSlide);
            nextButton.addEventListener('click', nextSlide);

            // Set up dot navigation
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => goToSlide(i));
            });

            // Set up autoplay
            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, autoplayDelay);
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            // Start autoplay
            startAutoplay();

            // Pause on hover
            container.addEventListener('mouseenter', stopAutoplay);
            container.addEventListener('mouseleave', startAutoplay);

            // Initialize first slide
            goToSlide(0);
        });
    </script>
</body>
</html>
