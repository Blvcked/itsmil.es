import barba from "@barba/core";
import barbaPrefetch from "@barba/prefetch";

import {
	fadeOut,
	fadeIn,
	slideInFromLeft,
	slideOutToRight,
	scaleUp,
	scaleDown,
} from "./barbaAnimations";

barba.use(barbaPrefetch);

export default function initBarba() {
	barba.init({
		debug: window.DEBUG,
		// sync: true,
		preventRunning: true,
		prevent: ({ el }) =>
			(el.classList && el.classList.contains("ab-item")) ||
			(el.classList && el.classList.contains("glightbox")) ||
			(el.hasAttribute && el.hasAttribute("data-gallery-name")),

		transitions: [
			{
				// once({ next }) {
				// 	animationFadeIn(next.container);
				// },
				leave: ({ current }) => fadeOut(current.container),
				enter({ next }) {
					fadeIn(next.container);
				},
			},
			// Slide In from Left and Slide Out to Right transition
			// {
			// 	name: "slide-transition",
			// 	leave: ({ current }) => slideOutToRight(current.container),
			// 	enter({ next }) {
			// 		slideInFromLeft(next.container);
			// 	},
			// },
		],
	});
}
