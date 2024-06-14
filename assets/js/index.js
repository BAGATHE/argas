$(document).ready(function(){
 $('#myform').submit(function(event){
     event.preventDefault();
     var form = $(this);
     $url_controller = form.attr('action');
     // Récupérer les données du formulaire
      var formData = $(this).serialize();
     
        $.ajax({
         type: 'POST',
         url: $url_controller,
         data: formData,
         success: function(result) {
          var response = JSON.parse(result); 
          if(typeof response.email === 'boolean'){
          if (response.email) {
            $('#email').removeClass('is-invalid');
          } else {
            $('#email').addClass('is-invalid');
          }
          if (response.phone) {
            $('#tel').removeClass('is-invalid');
          } else {
            $('#tel').addClass('is-invalid');
          }
          if (response.password) {
            $('#password').removeClass('is-invalid');
          } else {
            $('#password').addClass('is-invalid');
          }
          }else{
            
            var email = $('#email').val();
            var phone = $('#tel').val();
            var password = $('#password').val();
        

            $('#emailSubmit').val(email);
            $('#phoneSubmit').val(phone);
            $('#passwordSubmit').val(password);
            $('#myFormSubmit').submit()
            

            //var redirectUrl = basepath + 'AdministratorController/accessHomePage?' + formData;
            //window.location.href = redirectUrl;
          }
          
        

         },
         /*error: function(xhr, status, error) {
             // Gérer les erreurs de requête AJAX
             alert('Une erreur s\'est produite lors de la validation: ' + error);
         }*/
     });
  });
});



/**verification champ formulaire*/

function verifExpressionChamp(balise) {
  const input = ["name", "email", "number","tel"];
  const expressions = [/^[a-zA-Z\s]+$/,/^[^\s@]+@[^\s@]+\.[^\s@]+$/,/^\d+$/,/^\d{3}\s\d{2}\s\d{3}\s\d{2}$/];

  for (let index = 0; index < input.length; index++) {
      if (balise.name === input[index]) {
          if (!expressions[index].test(balise.value)) {
            balise.classList.remove('is-valid');
            balise.classList.add('is-invalid');
          }else {
            balise.classList.remove('is-invalid');
            balise.classList.add('is-valid');
          }
      }
  }
}
var input = document.querySelectorAll('.form-control');
input.forEach(element => {
  element.addEventListener('input',()=>{
        verifExpressionChamp(element);
  });
 });


