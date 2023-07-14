$( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: '01/12/2023',
        monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        dayNamesMin: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
       onSelect: function(a, b){
           a = new Date();
            a.setFullYear(b.selectedYear, b.selectedMonth, b.selectedDay);
          if(a.getDay() == 0)
           {
               $(b.input).val(b.lastVal);
            }
        },
});

    $("#timepicker").timepicker({
        timeFormat:'H:mm',
        minTime: "8:00",
        maxTime: "20:00",
        interval: 30,
        dynamic: true
    })
  } );

let navbar = document.querySelector(".navbar");

window.addEventListener('scroll', () =>
{
    if(window.scrollY > 500)
    {
        navbar.classList.add('navbar-scrolled');
    }else{
        navbar.classList.remove('navbar-scrolled');
    }
});


