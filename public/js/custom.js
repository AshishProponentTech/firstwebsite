document.querySelectorAll('.sidebar .has-dropdown > span').forEach(span => {
  span.addEventListener('click', () => {
    const parentLi = span.parentElement;
    // Toggle open class to show/hide dropdown
    parentLi.classList.toggle('open');
  });
});
window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const scroll = window.scrollY;

  if (scroll >= 10) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});