$(function(){
  $('.jsc__navBtn').on('click',function(){
      $('.jsc__nav').toggleClass('show');
      $('.jsc__navBtn').toggleClass('nav__btn--show');
      $('.jsc__headerLink').toggleClass('header__link--show');
  });
});