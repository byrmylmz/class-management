<div>

<div id='external-events'>
    <p>
      <strong>Draggable Events</strong>
    </p>

    <select wire:model="name" id="selectName">
        <option value="">Choose user</option>
        @foreach ($this->names as $name)
            <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
    </select>

    @foreach ($this->tasks as $task)
        <div  data-event='@json(['id' => uniqid(), 'title' => $task])' class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
            <div class='fc-event-main'>{{ $task}}</div>
        </div>
    @endforeach

    <p>
      <input type='checkbox' id='drop-remove' />
      <label for='drop-remove'>remove after drop</label>
    </p>

    <ul>
        @foreach (array_reverse($events) as $event)
            <li>{{ $event }}</li>
        @endforeach
    </ul>
  </div>

  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
  </div>
</div>

@push('scripts')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');

    // initialize the external events
    // -----------------------------------------------------------------

        new Draggable(containerEl, {
        itemSelector: '.fc-event'
        });

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

    drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },
        
        eventReceive: info => @this.eventReceive(info.event),
        eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
        loading: function(isLoading) {
                if (!isLoading) {
                    // Reset custom events
                    this.getEvents().forEach(function(e){
                        if (e.source === null) {
                            e.remove();
                        }
                    });
                }
            }
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

     @this.on(`refreshCalendar`, () => {
            calendar.refetchEvents()
        });
});

</script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
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

       
