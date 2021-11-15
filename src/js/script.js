/** full calendar */
      var calendarEl = document.getElementById('calendar');
      // if (calendarEl)
      // {
      //   document.addEventListener('DOMContentLoaded', function()
      //   {
          var calendar = new FullCalendar.Calendar(calendarEl,
          {
            selectable:true,
            editable:true,
            plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
            timeZone: 'UTC',
            themeSystem: 'bootstrap',
            header:
            {
              left: 'today, prev, next',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            editable:true,
            
            allDaySlot:false,

            buttonIcons:
            {
              prev: 'fe-arrow-left',
              next: 'fe-arrow-right',
              prevYear: 'left-double-arrow',
              nextYear: 'right-double-arrow'
            },
            weekNumbers: true,
            eventLimit: true, // allow "more" link when too many events
            events: '../../BusinessServiceLayer/calendarController/load.php',
            
            eventClick:  function(info) {
                alert('Event: ' + info.event.title);
            },
            select: function(info){
              alert('Event: ' + info.event.title);
            }


          });
          calendar.render();


      //   });
      // }