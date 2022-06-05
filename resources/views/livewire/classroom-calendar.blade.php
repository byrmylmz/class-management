<div>

  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');


    // initialize the calendar
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    initialView: 'timeGridWeek',
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar

    events: [
            { // this object will be "parsed" into an Event Object
            title: 'test', // a property!
            start: '2022-06-05', // a property!
            end: '2022-06-05' // a property! ** see important note below about 'end' **
            }
        ],
        
    });

     calendar.addEventSource( {
            url: '/calendar/events',
            extraParams: function() {
                return {
                    name: @this.name
                };
            }
        });


    calendar.render();

});

</script>

        
</div>

       
