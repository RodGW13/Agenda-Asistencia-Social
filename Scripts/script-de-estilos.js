 "use strict";
           $(document).ready(function () {

        $("#calendario-jquery").zabuto_calendar({
            today: true,
            language: "es",
                 minDate: 0
        });


        

    $("body").on("click", ".agendar",  function(){
        $(".agendar").removeClass("btn-success").addClass("btn-primary");
    $(this).addClass("btn-success").removeClass("btn-primary");
               });

               let contadorPasos = 1;
               $("body").on("click", ".siguiente",  ()=> {
        $(".step").addClass("hidden");
    $(".step-"+(++contadorPasos)).toggleClass("hidden");
               });

               $("body").on("click", ".atras",  ()=> {
        $(".step").addClass("hidden");
    $(".step-" + (--contadorPasos)).toggleClass("hidden");
               });

           });

     