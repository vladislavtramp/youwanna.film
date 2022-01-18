$(document).ready(function (){
   $('button.otpravka').on('click',  () => {

       $.ajax({
           method:"POST",
           url: '#',
           data: {
               favorites_submit: ""
           },
           dataType: "html",
           success: function successAdd(data){
               $('.otpravka').removeClass(data).addClass('btn btn-info mb-2')
                   .text('+Добавлено в список').attr('name', data)
           }
       });
   })

   $('button.commentari').on('click',  () => {

       let comment = $('textarea.bodyComment').val();

        $.ajax({
            method:"POST",
            url: '',
            data: {
                comment_submit: "",
                comment: comment
            },
            success: (res) => {
                console.log(res)
                $('.hepri').removeClass('d-none')
                $('.underdog').text(comment)
            }
        });
    });
});



function addNewComment(comment, id) {
    $(document).append()
}