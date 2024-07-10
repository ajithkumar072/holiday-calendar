<!-- resources/views/calendar.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Holiday Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script> -->
</head>
<body>
    <div id="calendar"></div>

    <script>
        jQuery(document).ready(function() {
            jQuery.ajax({
                url: '/holidays',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var calendarEl = jQuery('#calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl[0], {
                        initialView: 'dayGridMonth',
                        events: response.map(function (holiday) {
                            return {
                                title: holiday.name,
                                start: holiday.date,
                                type: holiday.type
                            };
                        })
                    });
                    calendar.render();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching holidays:', error);
                }
            });
        });
    </script>
</body>
</html>
