function traiterReponse(reponse)
{
  $(".info").html(reponse);
}

$(document).ready(function(e)
{
  $.post(
    'php/account.php',
    {},
    traiterReponse,
    'text'
  )
});

$(document).on('submit', '.change', function(e)
{
  e.preventDefault();
  $.post(
    'php/changeinfo.php',
    {
      email: $('.email' ).val(),
      name: $('.name').val(),
      surname: $('.surname').val(),
      city: $('.city').val(),
      gender: $('.gender').val(),
      birthdate: $('.birthdate').val()
    },
    'text'
  )
});

$(document).on('click', '.delete', function(e)
{
  var deleting = confirm("Are you sure you want to delete your account ?")
  $.post(
    'php/deleteaccount.php',
    {
      email: $('.email').val(),
    },
    'text'
  )
});

$(document).on('click', '.logout', function(e)
{
  $.post(
    'php/logout.php',)
    window.location.replace("login.html");
});
