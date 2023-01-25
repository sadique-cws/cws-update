@extends('public.v2.base')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}" />
@endsection
@section('content')
<section class="gallery h-100">
	<div class="row">
		<h2 class="text-center mb-3 dt">
        Gallery
		</h2>
	</div>
	<div class="row g-0">
		<div class="gallery-col">
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img4.jpg') }}">
					</div>
					<div class="info"><span class="title">seminar 2020</span>
					</div>
				</div>
			</div>
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img8.jpg') }}">
					</div>
					<div class="info"><span class="title">Seminar 2020</span>
					</div>
				</div>
			</div>
		</div>
		<div class="gallery-col">
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img3.jpg') }}">
					</div>
					<div class="info"><span class="title">seminar 2020</span>
					</div>
				</div>
			</div>
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img5.jpg') }}">
					</div>
					<div class="info"><span class="title">seminar 2020</span>
					</div>
				</div>
			</div>
		</div>
		<div class="gallery-col">
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img1.jpg') }}">
					</div>
					<div class="info"><span class="title">image - 0</span>
					</div>
				</div>
			</div>
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img7.jpg') }}">
					</div>
					<div class="info"><span class="title">image - 0</span>
					</div>
				</div>
			</div>
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img9.jpg') }}">
					</div>
					<div class="info"><span class="title">image - 0</span>
					</div>
				</div>
			</div>
		</div>
		<div class="gallery-col">
			<div class="fluid-container">
				<div class="item">
					<div class="img">
						<img src="{{ asset('images/gallery/img2.jpg') }}">
					</div>
					<div class="info"><span class="title">image - 0</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="overlay">
	<div class="viewer">
		<div>
			<div class="alt">this image is ... </div>
			<button class="close"><span class="material-symbols-rounded"><i class='bx bx-x'></i></span></button>
		</div>
		<div><img></div>
	</div>
</div>

@endsection
@section('js')
<script>
    let items = document.querySelectorAll(".item"),
	viewer = document.querySelector(".viewer img");
document.querySelector(".viewer .close").onclick = () => {
	document.querySelector("body").classList.toggle("overlayed");
};
items.forEach((item) => {
	item.onclick = () => {
		let content = item.querySelector(".img img");
		viewer.setAttribute("src", content.getAttribute("src"));
		document.querySelector(".viewer .alt").innerHTML = item.querySelector(
			".title"
		).innerHTML;
		document.querySelector("body").classList.toggle("overlayed");
	};
});

["load", "scroll"].forEach((eventName) => {
	window.addEventListener(eventName, (event) => {
		document.querySelectorAll(".fluid-container").forEach((item) => {
			if (isScrolledIntoView(item)) {
				item.classList.add("inScreen");
			} else {
				item.classList.remove("inScreen");
			}
		});
	});
});
function isScrolledIntoView(el) {
	let rect = el.getBoundingClientRect();
	let elemTop = rect.top;
	let elemBottom = rect.bottom;
	let isVisible = elemTop >= -300 && elemBottom <= screen.height + 300;
	return isVisible;
}

</script>

@endsection
