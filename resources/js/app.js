import { Alpine } from "alpinejs";
import "./bootstrap";
import "preline";
import { data } from "./init-alpine";

window.Alpine = Alpine;

window.data = data;

Alpine.start();
