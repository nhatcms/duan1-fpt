document.addEventListener("DOMContentLoaded", function () {
	let currentSlide = 0;
	const slides = document.querySelectorAll(".banner-img");
	const totalSlides = slides.length;

	function showSlide(index) {
		slides.forEach((slide, i) => {
			slide.style.display = i === index ? "block" : "none";
		});
	}

	document.querySelector(".next").addEventListener("click", function () {
		currentSlide = (currentSlide + 1) % totalSlides;
		showSlide(currentSlide);
	});

	document.querySelector(".prev").addEventListener("click", function () {
		currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
		showSlide(currentSlide);
	});

	setInterval(function () {
		currentSlide = (currentSlide + 1) % totalSlides;
		showSlide(currentSlide);
	}, 3000);

	showSlide(currentSlide);
});
