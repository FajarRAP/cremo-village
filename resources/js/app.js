import "flowbite";
import "./bootstrap";
import "../css/app.css";

import.meta.glob(["../images/**", "../fonts/**"]);
import Alpine from "alpinejs";
import { Carousel } from "flowbite";

window.Alpine = Alpine;

Alpine.start();

const cremocarousel = document.getElementById("cremo-carousel");

const items = [
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

const indicators = [
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
    interval: 3000,

    indicators: {
        activeClasses: "bg-green-300",
        inactiveClasses: "bg-white",
        items: indicators,
    },
};

// instance options object
const instanceOptions = {
    id: "cremo-carousel",
    override: true,
};

const carousel = new Carousel(cremocarousel, items, options, instanceOptions);

const carouselPrevButton = document.getElementById("cremo-carousel-prev");
const carouselNextButton = document.getElementById("cremo-carousel-next");

carouselPrevButton.addEventListener("click", () => carousel.prev());
carouselNextButton.addEventListener("click", () => carousel.next());
