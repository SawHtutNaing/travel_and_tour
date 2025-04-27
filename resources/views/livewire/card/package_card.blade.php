<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages Carousel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Carousel Styles */
        .carousel-container {
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .carousel-slide {
            flex: 0 0 100%;
            min-width: 100%;
            padding: 0 1rem;
            box-sizing: border-box;
        }
        
        @media (min-width: 768px) {
            .carousel-slide {
                flex: 0 0 50%;
                min-width: 50%;
            }
        }
        
        @media (min-width: 1024px) {
            .carousel-slide {
                flex: 0 0 33.333333%;
                min-width: 33.333333%;
            }
        }
        
        .carousel-dots .dot {
            transition: all 0.3s ease;
        }
        
        .carousel-dots .dot.active {
            width: 1.5rem;
            background-color: #14b8a6; /* teal-500 */
        }
        
        /* Progress bar */
        .carousel-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background-color: #14b8a6; /* teal-500 */
            width: 0;
            transition: width 0.1s linear;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-white">
    <section id="packages" class="py-20 bg-slate-50 dark:bg-slate-800/50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">Our Tour Packages</h2>
                <p class="text-slate-600 dark:text-slate-300">Choose your perfect travel experience</p>
            </div>
            
            <!-- Carousel Container -->
            <div class="carousel-container relative">
                <!-- Progress Bar -->
                <div class="carousel-progress"></div>
                
                <!-- Carousel Track -->
                <div class="carousel-track">
                    <!-- Package 1 -->
                    @foreach ($packages as $package)
                        
                    <div class="carousel-slide" >

                        <div class="overflow-hidden bg-white shadow-lg dark:bg-slate-800 rounded-2xl h-full">
                            <img src="{{$package->image}}"
                                alt="Cultural Package" class="object-cover w-full h-48">
                            <div class="p-6">
                                <h3 class="mb-2 text-2xl font-bold text-slate-900 dark:text-white">{{ $package->name }}</h3>
                                <p class="mb-4 text-slate-600 dark:text-slate-300">{{ $package->description }}</p>
                                <ul class="mb-6 space-y-3">
                                    <li class="flex items-center text-slate-600 dark:text-slate-300">
                                        <i class="mr-2 text-teal-500 fas fa-check"></i>
                                         {{ $package->start_location }} 
                                    </li>
                                    <li class="flex items-center text-slate-600 dark:text-slate-300">
                                        <i class="mr-2 text-teal-500 fas fa-check"></i>
                                        {{ $package->end_location }} 
                                    </li>
                                  
                                    
                                </ul>
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-3xl font-bold text-slate-900 dark:text-white">$
                                        {{ $package->total_amount }} 


                                    </span>
                                    <span class="text-slate-600 dark:text-slate-300">per person</span>
                                </div>
                                <a href="{{ route('user.package_register' ,$package->id) }}"
                                
                                    class="block w-full px-6 py-3 font-medium text-center text-white transition-colors bg-teal-500 rounded-full hover:bg-teal-600">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                            
                </div>
                
                <!-- Navigation Arrows -->
                {{-- <button class="carousel-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 dark:bg-slate-700/80 hover:bg-white dark:hover:bg-slate-700 text-slate-800 dark:text-white p-3 rounded-full shadow-md transition-all z-10">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <button class="carousel-next absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 dark:bg-slate-700/80 hover:bg-white dark:hover:bg-slate-700 text-slate-800 dark:text-white p-3 rounded-full shadow-md transition-all z-10">
                    <i class="fas fa-chevron-right"></i>
                </button> --}}
            </div>

        </div>
    </section>

    <script>

function redirect(url) {
    window.location.href = url;
}



        document.addEventListener('DOMContentLoaded', function() {
            // Carousel elements
            const track = document.querySelector('.carousel-track');
            const slides = Array.from(document.querySelectorAll('.carousel-slide'));
            const prevButton = document.querySelector('.carousel-prev');
            const nextButton = document.querySelector('.carousel-next');
            const dots = Array.from(document.querySelectorAll('.carousel-dots .dot'));
            const container = document.querySelector('.carousel-container');
            const progressBar = document.querySelector('.carousel-progress');
            
            let currentSlide = 0;
            let slidesToShow = 1;
            let autoplayInterval;
            const autoplayDelay = 5000; // 5 seconds
            let autoplayProgress = 0;
            let progressInterval;
            let isAutoPlaying = true;
            
            // Initialize carousel
            function initCarousel() {
                updateSlidesToShow();
                updateDots();
                goToSlide(currentSlide);
                startAutoplay();
            }
            
            // Update number of slides to show based on screen width
            function updateSlidesToShow() {
                if (window.innerWidth >= 1024) {
                    slidesToShow = 3;
                } else if (window.innerWidth >= 768) {
                    slidesToShow = 2;
                } else {
                    slidesToShow = 1;
                }
                
                // Update slide width
                const slideWidth = 100 / slidesToShow;
                slides.forEach(slide => {
                    slide.style.flex = `0 0 ${slideWidth}%`;
                    slide.style.minWidth = `${slideWidth}%`;
                });
                
                // Recalculate current slide to prevent empty space
                const maxSlide = Math.max(0, slides.length - slidesToShow);
                if (currentSlide > maxSlide) {
                    currentSlide = maxSlide;
                }
                
                goToSlide(currentSlide);
            }
            
            // Go to specific slide
            function goToSlide(index) {
                const maxSlide = Math.max(0, slides.length - slidesToShow);
                
                if (index < 0) {
                    index = maxSlide;
                } else if (index > maxSlide) {
                    index = 0;
                }
                
                currentSlide = index;
                const translateX = -currentSlide * (100 / slidesToShow);
                track.style.transform = `translateX(${translateX}%)`;
                
                updateDots();
                resetProgressBar();
            }
            
            // Next slide
            function nextSlide() {
                goToSlide(currentSlide + 1);
            }
            
            // Previous slide
            function prevSlide() {
                goToSlide(currentSlide - 1);
            }
            
            // Update dots
            function updateDots() {
                const totalDots = Math.ceil(slides.length / slidesToShow);
                const activeDot = Math.floor(currentSlide / slidesToShow);
                
                dots.forEach((dot, index) => {
                    if (index < totalDots) {
                        dot.style.display = 'block';
                        dot.classList.toggle('active', index === activeDot);
                    } else {
                        dot.style.display = 'none';
                    }
                });
            }
            
            // Progress bar functions
            function startProgressBar() {
                resetProgressBar();
                
                progressInterval = setInterval(() => {
                    autoplayProgress += (100 / (autoplayDelay / 100));
                    progressBar.style.width = `${Math.min(autoplayProgress, 100)}%`;
                    
                    if (autoplayProgress >= 100) {
                        nextSlide();
                    }
                }, 100);
            }
            
            function resetProgressBar() {
                clearInterval(progressInterval);
                autoplayProgress = 0;
                progressBar.style.width = '0%';
                
                if (isAutoPlaying) {
                    startProgressBar();
                }
            }
            
            // Autoplay functions
            function startAutoplay() {
                isAutoPlaying = true;
                autoplayInterval = setInterval(nextSlide, autoplayDelay);
                startProgressBar();
            }
            
            function stopAutoplay() {
                isAutoPlaying = false;
                clearInterval(autoplayInterval);
                clearInterval(progressInterval);
            }
            
            function resetAutoplay() {
                stopAutoplay();
                startAutoplay();
            }
            
            // Event listeners
            prevButton.addEventListener('click', () => {
                prevSlide();
                resetAutoplay();
            });
            
            nextButton.addEventListener('click', () => {
                nextSlide();
                resetAutoplay();
            });
            
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index * slidesToShow);
                    resetAutoplay();
                });
            });
            
            // Pause on hover
            container.addEventListener('mouseenter', stopAutoplay);
            container.addEventListener('mouseleave', startAutoplay);
            
            // Handle window resize
            window.addEventListener('resize', () => {
                updateSlidesToShow();
                updateDots();
            });
            
            // Initialize carousel
            initCarousel();
        });
    </script>
</body>
</html>