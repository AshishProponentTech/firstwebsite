document.querySelectorAll('.sidebar .has-dropdown > span').forEach(span => {
  span.addEventListener('click', () => {
    const parentLi = span.parentElement;
    // Toggle open class to show/hide dropdown
    parentLi.classList.toggle('open');
  });
});
