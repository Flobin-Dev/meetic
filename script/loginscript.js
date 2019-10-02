function traiterReponse(reponse)
{
  $(".result").html(reponse);
  if($(".result").html() == "")
  {
    window.location.replace("compte.html");
  }
  else
  {
    ;
  }
}

$('.login').submit(function(e)
{
  e.preventDefault();
  $.post(
    'php/check.php',
    {
      logemail: $('.email').val(),
      logpassword: $('.password').val()
    },
    traiterReponse,
    'text'
  )
});
