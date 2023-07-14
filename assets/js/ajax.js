$(document).ready(function(){
  let start = 5;
  let limit = 5;
  $("#showMore").click(function(){
    $.ajax({
        url: "http://localhost/Animacare/Controller/AppointmentController.php",
        type:"POST",
        dataType: "json",
        data:{
          limit: limit,
          start: start
        },

        success: function(data)
        {
           if(data != '')
           {
              let html = '';
              data.forEach(function(appointment){
              html += "<tr>";
              html += "<td>" + appointment.id + "</td>";
              html += "<td>" + appointment.name + "</td>";
              html += "<td>" + appointment.appointment_day + "</td>";
              html += "<td>" + appointment.appointment_time + "</td>";
              html += "<td>" + appointment.appointment_type_name + "</td>";
              html += "</tr>";

            

            });
            start += limit;
            $("tbody").append(html);
            console.log("ok");
           
           }else{
            $("#showMore").text('Plus de données').attr('disabled', true);
           }

        
            if(data.length === 0)
            {
              console.log('tableau vide');
            }else{
              console.log('tableau avec données');
              data.forEach(function(obj) {
                console.log(obj);
                console.log(obj.id);
                console.log(obj.name);
              });
            }
            
            console.log(data);
        },
        error: function(error, json, status)
        {
            console.log("erreur" + error + json + status);
        }
    })
  })

});
                    