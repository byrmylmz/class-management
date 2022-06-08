<div>

  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
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
    events:'/source'
   
        
    });

  


    calendar.render();

});

</script>

</div> 

       
