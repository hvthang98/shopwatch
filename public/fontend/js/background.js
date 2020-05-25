$(document).ready(function(){
	$(".img1").mouseover(function(){
		setInterval(autoloadcolor, 800);
	})

	function autoloadcolor(){
		colors = ["red", "yellow", "blue", "orange", "pink"];
		var result = colors[Math.floor(Math.random() * colors.length)];
		a = $(".img1").find(".mua a");
		a.css("color",result);
	}
})