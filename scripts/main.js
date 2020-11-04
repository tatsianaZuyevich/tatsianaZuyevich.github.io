window.onscroll = function() {myFunction()};

function myFunction() {
	if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
		document.querySelector("header").className = "header_scroll";
	}
	else  {
		document.querySelector("header").className = "header_scroll_none";
	}
}

document.querySelector('.movie-button__shadow').onclick = function () {
	document.querySelector(".movie-video").style.display = 'block';
	document.querySelector(".movie-bg").style.display = 'none';
	document.querySelector('.movie-video').play();
}

document.querySelector('.toggle-month').onclick = function () {
	document.querySelector(".toggle-month").classList.add("toggle-active");
	document.querySelector(".toggle-year").classList.remove("toggle-active");
	
	document.querySelector(".business-month").classList.add("line-green");
	document.querySelector(".business-year").classList.remove("line-green");
}

document.querySelector('.toggle-year').onclick = function () {
	document.querySelector(".toggle-year").classList.add("toggle-active");
	document.querySelector(".toggle-month").classList.remove("toggle-active");
	
	document.querySelector(".business-year").classList.add("line-green");
	document.querySelector(".business-month").classList.remove("line-green");
}
	