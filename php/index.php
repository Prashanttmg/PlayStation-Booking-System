<?php include 'header.php'; ?>
<?php include 'config.php'; 
$slots = [];
$slots = [];
$result = mysqli_query($conn,"SELECT * FROM slots");

while($row = mysqli_fetch_assoc($result)){
    $slots[$row['TimeSlot']][$row['DayName']] = [
        'status' => $row['Status'],
        'name' => $row['BookedBy']
    ];
}
while($row = mysqli_fetch_assoc($result)){
    $slots[$row['TimeSlot']][$row['DayName']] = [
        'status' => $row['Status'],
        'name' => $row['FullName']
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
        </div>
</section>
    <section class="availability-section">
        <h2 class="availability-title">AVAILABLE SLOTS</h2>
        <div class="schedule">
            <div class="schedule-header"></div>
            <div class="schedule-header">Mon</div>
            <div class="schedule-header">Tue</div>
            <div class="schedule-header">Wed</div>
            <div class="schedule-header">Thu</div>
            <div class="schedule-header">Fri</div>
            <div class="schedule-header">Sat</div>
            <div class="schedule-header">Sun</div>
            <?php
            $times = [
            '12 PM - 1 PM',
            '1 PM - 2 PM',
            '2 PM - 3 PM',
            '3 PM - 4 PM',
            '4 PM - 5 PM',
            '5 PM - 6 PM',
            '6 PM - 7 PM',
            '7 PM - 8 PM',
            '8 PM - 9 PM'
            ];
            $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
            foreach($times as $time)
            {
                echo "<div class='time'>$time</div>";
                foreach($days as $day)
                {
                    $data = $slots[$time][$day] ?? [
                        'status' => 'Available',
                        'name' => ''
                    ];

                    $class = ($data['status'] == 'Booked')
                    ? 'booked'
                    : 'available';
                    $text = ($data['status'] == 'Booked')
                    ? $data['name']
                    : '';
                    echo "<div class='$class'>$text</div>";
                }
            }
            ?>
        </div>
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
</body>
</html>