<?php include 'header.php'; ?>
<?php
include 'config.php';

$events = [];

$result = mysqli_query($conn, "
    SELECT booking.*, user.FullName
    FROM booking
    JOIN user ON booking.UserID = user.UserID
    WHERE booking.Status = 'Approved'
");

while ($row = mysqli_fetch_assoc($result)) {
    $start = $row['BookingDate'] . 'T' . $row['StartTime'];
    $end   = date('Y-m-d\TH:i:s', strtotime($start . ' +1 hour'));

    $events[] = [
        'title' => $row['FullName'] . ' | Console ' . $row['ConsoleID'] . ' (' . $row['Duration'] . ' Player)',
        'start' => $start,
        'end'   => $end
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namuz PlayStation</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
</head>
<body>
    <section class="landing">
        <div class="overlay"></div>
        <div class="content">
            <div class="line"></div>
            <h1>NAMUZ PLAYSTATION</h1>
            <p>PREMIUM GAMING & TOURNAMENT CENTER</p>
            <div class="GameButton">
                <a href="index.php#games"><button>EXPLORE OUR GAMES</button></a>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="about-container">
            <div class="about-image">
                <img src="images/about1.jpg" alt="About">
            </div>
            <div class="about-text">
                <h2>ABOUT US</h2>
                <p>
                    Namuz PlayStation is a modern gaming zone where gamers can enjoy
                    the latest PlayStation titles in a comfortable environment.
                    We offer online booking, tournaments and premium gaming setups.
                </p>
            </div>
        </div>
    </section>
    <section class="games-section" id="games">
        <h2 class="games-title">POPULAR GAMES</h2>
        <div class="games-grid">
            <img src="images/fc26.jpg" alt="FC 26">
            <img src="images/gta5.jpg" alt="GTA V">
            <img src="images/2k25.jpg" alt="WWE 2K25">
            <img src="images/god.jpg" alt="God of War">
            <img src="images/bat.jpg" alt="Batman Arkham">
            <img src="images/dmc.jpg" alt="Devil May Cry">
            <img src="images/COD.jpg" alt="Call of Duty">
            <img src="images/tekken.jpg" alt="Tekken 7">
            <img src="images/resident.jpg" alt="Resident Village">
            <img src="images/nfs.jpg" alt="Need for Speed">
            <img src="images/skate.jpg" alt="Call of Duty">
            <img src="images/uncharted.jpg" alt="Call of Duty">
            <img src="images/RL.jpg" alt="Call of Duty">
            <img src="images/fortnite.jpg" alt="Call of Duty">
            <img src="images/fall.jpg" alt="Call of Duty">
            <img src="images/ghost.jpg" alt="Call of Duty">
            <img src="images/mk11.jpg" alt="Mortal Kombat 11">
        </div>
</section>
    <section class="availability-section">
        <h2 class="availability-title">
            PLAYSTATION BOOKING CALENDAR
        </h2>
        <div id="calendar"></div>
    </section>
    <section class="console-section" id="Console">
        <h2 class="console-title">CONSOLE YOU CAN ENJOY</h2>
        <div class="console-container">
            <div class="console-card">
                <img src="images/ps5.jpg" alt="PS 5">
                <div class="console-info">
                    <h3>PS 5</h3>
                    <p>Next-generation PlayStation console with immersive gaming experiences.</p>
                </div>
            </div>
            <div class="console-card">
                <img src="images/ps4.jpg" alt="PS 4">
                <div class="console-info">
                    <h3>PS 4</h3>
                    <p>Powerful console for stunning graphics and immersive gameplay.</p>
                </div>
            </div>
            <div class="console-card">
                <img src="images/ps3.avif" alt="PS 3">
                <div class="console-info">
                    <h3>PS 3</h3>
                    <p>Classic PlayStation console with a wide selection of games.</p>
                </div>
            </div>
            <div class="console-card">
                <img src="images/nintendo.jpg" alt="Nintendo Switch">
                <div class="console-info">
                    <h3>Nintendo Switch</h3>
                    <p>Portable gaming console with versatile play options.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section" id="contact">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.9051900223117!2d85.34636699999999!3d27.65840490000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1702f6b6e59f%3A0x6b44a504fb662924!2sNamuz%20Playstation!5e0!3m2!1sen!2snp!4v1786773909703!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
        <div class="contact-content">
            <h2>CONTACT US</h2>
            <p>Book your favorite PlayStation games and gaming sessions with ease.</p>

            <div class="contact-info">
                <p><i class="fas fa-map-marker-alt"></i> Imadol, Lalitpur, Nepal</p>
                <p><i class="fas fa-phone"></i> +977 9763601763</p>
                <p><i class="fas fa-envelope"></i> info@namuzplaystation.com</p>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: window.innerWidth < 768 ? 'timeGridDay' : 'timeGridWeek',
        height: 'auto',
        allDaySlot: false,
        nowIndicator: true,

        // Time axis: 10 AM to 8 PM (last slot 8-9 PM), one row per hour
        slotMinTime: "10:00:00",
        slotMaxTime: "21:00:00",
        slotDuration: "01:00:00",
        slotLabelInterval: "01:00",
        slotLabelFormat: { hour: 'numeric', hour12: true, meridiem: 'short' },

        dayHeaderFormat: { weekday: 'short', day: 'numeric', month: 'short' },
        eventTimeFormat: { hour: 'numeric', minute: '2-digit', hour12: true, meridiem: 'short' },
        slotEventOverlap: false,
        expandRows: true,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: { today: 'Today', month: 'Month', week: 'Week', day: 'Day' },

        events: <?php echo json_encode($events, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>
    });

    calendar.render();
});
</script>l
</body>
</html>