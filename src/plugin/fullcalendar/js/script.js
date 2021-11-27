$(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultView: 'month',
            editable: true,
            selectable: true,
            allDaySlot: false,
            
            events: "calendar.php?view=1",
   
            
            eventClick:  function(event, jsEvent, view) {
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#modalDescription').text(event.description);
                $('#modalLocation').text(event.location);
                $('#modalEventType').text(event.eventType);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
            
            //header and other values
            select: function(start, end, jsEvent) {
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){
               $.ajax({
                   url: 'calendar.php',
                   data: 'action=update&title='+event.title+'&description='+event.description+'&location='+event.location+'&eventType='+event.eventType+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   alert("Event Update");
                   }
               });
           },
           eventResize: function(event) {
               $.ajax({
                   url: 'calendar.php',
                   data: 'action=update&title='+event.title+'&description='+event.description+'&location='+event.location+'&eventType='+event.eventType+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                      alert("Event Update");
                   }
               });
           }
        });
               
       $('#submitButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit();
       });
       
       $('#deleteButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete();
       });
       
       function doDelete(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'calendar.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1){
                        $("#calendar").fullCalendar('removeEvents',eventID);
                        alert("Event Deleted");
                   }
                   else{
                        return false;
                   }
                    
                   
               }
           });
       }
       function doSubmit(){
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var description = $('#description').val();
           var location = $('#location').val();
           var eventType = $('#eventType').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
           
           $.ajax({
               url: 'calendar.php',
               data: 'action=add&title='+title+'&description='+description+'&location='+location+'&eventType='+eventType+'&start='+startTime+'&end='+endTime,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       description: description,
                       location: location,
                       eventTypet: eventType,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
           });
           
       }
    });