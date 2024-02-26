<div id="myCalendar" class="vanilla-calendar"></div>

@section('css')
    <link rel="stylesheet" href="/calendar/css/vanilla-calendar.min.css">
@stop
@push('scripts')
    <script src="/calendar/js/vanilla-calendar.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            var today = new Date();

            const calendar = new VanillaCalendar('#myCalendar', {
                settings: {
                    lang: 'ca',
                    visibility: {
                        weekend: false,
                    },
                },
                actions: {
                    clickDay(e, dates) {
                        var data = dates[0];
                        if (e.target.classList.contains("calendar_activity")) {
                            var url = "{{ URL::to('activitats') }}?date=" + data
                            window.location.href = url;
                        }
                        //e.preventDefault;
                        var month = new Date(data).getMonth();
                        var year = new Date(data).getFullYear();
                        _SetCalendarActivities(year, month);
                    },
                    clickArrow(event, year, month) {
                        _SetCalendarActivities(year, month + 1);
                    }
                }
            });
            calendar.init();
            _SetCalendarActivities(today.getFullYear(), today.getMonth() + 1);
        });
        _SetCalendarActivities = async function(year, month) {
            let calendarDates = document.querySelectorAll('[data-calendar-day]');
            let activities = await _GetActivities(year, month);
            let activDates = activities.map(a => a.date);
            calendarDates.forEach(cDate => {
                var day = cDate.attributes["data-calendar-day"].value;
                if (activDates.includes(day)) {
                    if (!cDate.classList.contains("calendar_activity"))
                        cDate.classList.add("calendar_activity");
                }
            })

        }

        _GetActivities = function(year, month) {
            return new Promise(function(resolve, reject) {
                var xhttp = new XMLHttpRequest();
                var url = "{{ route('activitats.calendar', [':year', ':month']) }}";
                url = url.replace(':year', year).replace(':month', month);
                xhttp.open("GET", url, true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Response
                        resolve(JSON.parse(this.responseText));
                    }
                };
                xhttp.onerror = function() {
                    reject({
                        status: this.status,
                        statusText: xhr.statusText
                    });
                };
                xhttp.send();
            });
        }
    </script>
@endpush
