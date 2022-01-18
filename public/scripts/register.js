$(document).ready(function (){
   let overlay = $('.overlay');
   let name = $("input[name='name']");
   let login = $("input[name='login']");
   let email = $("input[name='email']");
   let password = $("input[name='password']");
   let confirmPassword = $("input[name='confirmPassword']");
   let registerSubmit = $("input[name='register_submit']");

   function isValid(element, min, max){
      if (element.val().length > max || element.val().length < min){
         element.addClass('is-invalid');
         return false;
      }else {
         element.removeClass('is-invalid');
         return true;
      }
   }
});