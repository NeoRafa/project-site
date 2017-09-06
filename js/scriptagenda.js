 $(document).ready(function() { 

  $('#calendario').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    weekends:false;
    defaultDate: '2016-01-12',
    editable: true,
    eventLimit: true,            
    eventColor: '#dd6777'
});	
              //CADASTRA NOVO EVENTO
              $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_consulta.php",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Consulta marcada com sucesso!");
                            //atualiza a página!
                            location.reload();
                        }else{
                            alert("Houve algum problema.. ");
                        }
                    }
                });                
                return false;
            }); 
          });