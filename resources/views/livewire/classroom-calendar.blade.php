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
            start: '2022-06-01', // a property!
            end: '2022-06-01' // a property! ** see important note below about 'end' **
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
<style>

    #external-events {
        float:left;
        position: static;
        width: 15%;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
    }

    .demo-topbar + #external-events { /* will get stripped out */
        top: 60px;
    }

    #external-events .fc-event {
        cursor: move;
        margin: 3px 0;
    }

    #calendar-container {
        width: 85%;
        display: inline-block;
        padding-left: 15px;
        margin-top:-15px;
        position: static;
    }

    #calendar {
        
    }

    </style>

@endpush
        
</div>

       
