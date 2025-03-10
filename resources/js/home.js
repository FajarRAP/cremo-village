import { Carousel } from "flowbite";

const cremoCarousel = document.getElementById("cremo-carousel");
const arrowUp = document.getElementById("arrow-up");

function startCarousel() {
    const carouselItems = [
        {
            position: 0,
            el: document.getElementById("cremo-carousel-item-1"),
        },
        {
            position: 1,
            el: document.getElementById("cremo-carousel-item-2"),
        },
        {
            position: 2,
            el: document.getElementById("cremo-carousel-item-3"),
        },
    ];

    const carouselIndicators = [
        {
            position: 0,
            el: document.getElementById("cremo-carousel-indicator-1"),
        },
        {
            position: 1,
            el: document.getElementById("cremo-carousel-indicator-2"),
        },
        {
            position: 2,
            el: document.getElementById("cremo-carousel-indicator-3"),
        },
    ];

    const options = {
        defaultPosition: 0,
        interval: 8000,

        indicators: {
            activeClasses: "bg-green-300",
            inactiveClasses: "bg-white",
            items: carouselIndicators,
        },
    };

    const instanceOptions = {
        id: "cremo-carousel",
        override: true,
    };

    const carousel = new Carousel(
        cremoCarousel,
        carouselItems,
        options,
        instanceOptions,
    );

    carousel.cycle();

    const carouselPrevButton = document.getElementById("cremo-carousel-prev");
    const carouselNextButton = document.getElementById("cremo-carousel-next");

    carouselPrevButton.addEventListener("click", () => carousel.prev());
    carouselNextButton.addEventListener("click", () => carousel.next());
}

arrowUp.addEventListener("click", () =>
    document.getElementById("navbar").scrollIntoView(),
);

startCarousel();
