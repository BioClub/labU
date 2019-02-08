$(document).ready(function(){
  $('.mainnav .mainnav_off_box').on('click', function(e) {
    e.preventDefault()
    $('.mainnav')
      .toggleClass('nav_off')
      .toggleClass('nav_on')
  })
})
