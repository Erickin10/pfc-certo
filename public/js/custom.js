$('.slick_slide').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
    dots:false,
    speed: 800,
	autoplaySpeed: 2000,
    prevArrow:'<i class="fas fa-angle-left  left_arrow"></i>',
    nextArrow:'<i class="fas fa-angle-right  right_arrow"></i>',
  });

  $('.slick_slide-individual').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
    dots:false,
    speed: 800,
	autoplaySpeed: 2000,
    prevArrow:'<i class="fas fa-angle-left  left_arrow"></i>',
    nextArrow:'<i class="fas fa-angle-right  right_arrow"></i>',
  });

  function confirmDelete(event) {
    event.preventDefault();
    if (confirm('Tem certeza que deseja excluir este post?')) {
        document.getElementById('delete-form').submit();
    }
}
