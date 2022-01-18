$(document).ready(function (){
   $('.contDecor').hover(
       function (){
           $('.decord').css({
               'text-decoration':'underline'
           });
       },
        function (){
            $('.decord').css({
                'text-decoration':'none'
            });
        })
    $('.under-line-season-title').hover(
        function (){
            $(this).css({
               'text-decoration':'underline',
               'color':'rgba(255,0,0,1)'
            });
        },
        function (){
            $(this).css({
                'text-decoration':'none',
                'color':'rgba(227,0,2,0.82)'
            });
        })
    $('.navtitle').hover(
        function (){
           $(this).css({
               'opacity':'0.77'
           })
        },
        function (){
            $(this).css({
                'opacity':'1'
            })
        });
   $('.header-title').hover(function (){
        $(this).css({
           'color':'rgba(227,0,2,0.82)'
        });
       },
       function (){
        $(this).css({
            'color':'#1a202c'
        });
       });
   $('.footer-text').hover(
       function (){
           $(this).css({
               'color':'#ececec'
           })
       },
       function (){
           $(this).css({
               'color':'rgba(236,236,236,0.55)'
           })
       });
});