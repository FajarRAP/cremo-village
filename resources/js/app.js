import "flowbite";
import "./bootstrap";
import "../css/app.css";

import.meta.glob(["../images/**", "../fonts/**"]);
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
