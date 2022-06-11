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
    events:'/events',
    eventClick:function(info){
      Livewire.emit('openModal', 'update-lesson',{"eventId":info.event.id})      
    }   
    });

    calendar.render();
    

    @this.on(`refreshCalendar`, () => {
            calendar.refetchEvents()
        })

});

</script>

</div> 

       
