$(".show-sidebar").click(function () {
  $(".sidebar").animate({ marginLeft: 0 });
});

$(".hide-sidebar").click(function () {
  $(".sidebar").animate({ marginLeft: "-100%" });
});

$(".counter").counterUp({
  delay: 3,
  time: 700,
});

function go(url) {
  setTimeout(function () {
    location.href = `${url}`;
  }, 500);
}
