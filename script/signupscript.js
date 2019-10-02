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

$('.signup').submit(function(e)
{
  e.preventDefault();
  $.post(
    'php/signup.php',
    {
      name: $(".name").val(),
      surname: $(".surname").val(),
      birthdate: $(".birthdate").val(),
      gender: $(".gender").val(),
      city: $(".city").val(),
      email: $('.email').val(),
      password: $('.password').val()
    },
    traiterReponse,
    'text'
  )
});
