import "flowbite";
import "./bootstrap";
import "../css/app.css";

import.meta.glob(["../images/**", "../fonts/**"]);
import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import collapse from "@alpinejs/collapse";

window.Alpine = Alpine;

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.start();
