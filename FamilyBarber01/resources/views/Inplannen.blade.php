<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inplannen.css">
    <title>Appointment Scheduler</title>
</head>
<body>

@include('NavBar')
<div class="ourteam">
    @foreach ($ourteam as $post )
    <div class="ourteam-block">
        <div class="ourteam-image"><img src="{{ asset('storage/' . $post->ourteamimage) }}" class="ourteam-image"></div>
        <div class="ourteam-name">{{ $post->fullname }}</div>
    </div>
    @endforeach
</div>
<div class="appointment-popup">
    <div class="appointment-calendar">
        <div class="current-week">
            <span><i class="fa fa-calendar"></i> {{ $startOfWeek->format('F j') }} - {{ $endOfWeek->format('j, Y') }}</span>
            <div class="calendar-nav">
                <button type="button" class="prev">Prev</button>
                <button type="button" class="next">Next</button>
            </div>
        </div>

        <div class="calendar-wrapper">
            <div class="calendar-week">
                <ul>
                    @foreach ($dates as $date => $times)
                        <li>{{ \Carbon\Carbon::parse($date)->format('D, M j') }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="calendar-hours">
                @foreach ($dates as $date => $times)
                    <ul class="ul-hour">
                        @foreach ($times as $time)
                            <li>
                                <ul>
                                    @php
                                        $isBooked = false;
                                        foreach ($bookedTimes as $bookedTime) {
                                            if ($bookedTime['date'] == $date && $bookedTime['time'] == $time['time']) {
                                                $isBooked = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($isBooked)
                                        <li class="li-hour booked-time">Full: Yes</li>
                                    @elseif ($time['past'])

                                        <li class="li-hour booked-time">Oud</li>
                                    @else
                                        <li class="li-hour" onclick="selectTime(this, '{{ $date }}', '{{ $time['time'] }}')">
                                            {{ $time['time'] }}
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>

        <div class="calendar-buttons">
            <button class="validation" type="button">Book an appointment</button>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Fill in your details</h2>
    <input type="text" id="name" placeholder="Name">
    <input type="email" id="email" placeholder="Email">
    <input type="tel" id="phone" placeholder="Phone">
    <button onclick="submitAppointment()">Submit</button>
  </div>
</div>
<script>
    let selectedTime = null;
    let selectedDate = null;

    function selectTime(timeElement, date, time) {
        // Remove the selected class from all time slots
        const allTimeSlots = document.querySelectorAll('.li-hour');
        allTimeSlots.forEach(slot => {
            slot.classList.remove('selected-time');
        });

        // Add the selected class to the clicked time slot
        timeElement.classList.add('selected-time');

        // Store the selected time and date
        selectedTime = time;
        selectedDate = date;
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.querySelector(".validation");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function submitAppointment() {
        // Add your validation logic here
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        if (!selectedTime || !selectedDate || !name || !email || !phone) {
            alert("Please fill in all details and select a time.");
            return;
        }

        // Prepare data to be sent
        var appointmentData = {
            name: name,
            email: email,
            phone: phone,
            date: selectedDate,
            time: selectedTime,
        };

        // Send data to the backend using AJAX
        fetch('{{ route('inplannen.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(appointmentData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                // Close the modal
                modal.style.display = "none";
            } else {
                alert("An error occurred while booking the appointment. Please try again.");
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>
