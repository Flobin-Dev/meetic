//Start of dropdown
var toggle = 0;
$(document).on('click', '.menu', function()
{
  if (toggle == 0)
  {
    $('.menu-background').slideDown();
    $('.aside').slideUp('slow', function()
    {
      $('.search').css('left', '420px');
    });
    toggle = 1;
  }
  else
  {
    $('.search').css('left', '20px');
    $('.menu-background').slideUp();
    $('.aside').slideDown('slow');
    toggle = 0;
  }
});
//End of dropdown

$(document).on('click', '.menulogout', function(e)
{
  $.post(
    'php/logout.php',)
    window.location.replace("login.html");
});

function traiterReponse(reponse)
{
  $(".search").html(reponse);
}

$('.options').submit(function(e)
{
  e.preventDefault();
  $.post(
    'php/search.php',
    {
      gender: $('.gender').val()
    },
    traiterReponse,
    'text'
  )
});

//Start of carousel
$(document).on('click', 'next', function()
{
  
});
//End of carousel
