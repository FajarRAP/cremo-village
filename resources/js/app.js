import "flowbite";
import "./bootstrap";
import "../css/app.css";

import.meta.glob(["../images/**", "../fonts/**"]);
import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";


window.Alpine = Alpine;

Alpine.plugin(intersect);
Alpine.start();
