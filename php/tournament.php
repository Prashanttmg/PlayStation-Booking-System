<?php
session_start();
include 'config.php';

if(!isset($_SESSION['UserID'])){
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['UserID'];

/* Join Tournament */
if(isset($_POST['join']))
{
    $tid = $_POST['tid'];

    $check = mysqli_query($conn,"
        SELECT *
        FROM tournament_participants
        WHERE TournamentID='$tid'
        AND UserID='$userid'
    ");

    if(mysqli_num_rows($check)==0)
    {
        mysqli_query($conn,"
            INSERT INTO tournament_participants
            (TournamentID, UserID)
            VALUES
            ('$tid','$userid')
        ");

        echo "<script>alert('Successfully Joined Tournament');</script>";
    }
    else
    {
        echo "<script>alert('You have already joined this tournament');</script>";
    }
}
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Tournaments</title>

<style>
body{
    background:#111;
    color:white;
    font-family:Poppins,sans-serif;
}

.container{
    width:90%;
    margin:auto;
    padding-top: 120px;
}

.card{
    position:relative;
    overflow:hidden;            
    background:#1b1b1b;
    border:1px solid #c9a84c;
    padding:20px;
    margin:20px 0;
    border-radius:10px;

    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

/* Background video */
.card-video{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:0;
    opacity:0;
    transition:opacity .4s ease;
    pointer-events:none;
}

/* Dark overlay so text stays readable */
.card::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.6);
    z-index:1;
    opacity:0;
    transition:opacity .4s ease;
    pointer-events:none;
}

.card.playing .card-video,
.card.playing::before{
    opacity:1;
}

/* Keep real content above the video */
.card-content,
.card-image{
    position:relative;
    z-index:2;
}
.card-content{
    flex:1;
}

.card-image img{
    width:250px;
    height:150px;
    object-fit:cover;
    border-radius:10px;
    border:2px solid #c9a84c;
}

h2{
    color:#c9a84c;
}

.btn{
    background:#c9a84c;
    color:black;
    border:none;
    padding:10px 20px;
    cursor:pointer;
    border-radius:5px;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="container">

<h1>Tournaments</h1>

<?php

$result = mysqli_query($conn,"
SELECT *
FROM tournament
WHERE Status='Upcoming'
OR Status='Ongoing'
ORDER BY TournamentDate ASC
");

while($row = mysqli_fetch_assoc($result))
{
    $tid = $row['TournamentID'];

    $count = mysqli_fetch_assoc(mysqli_query($conn,"
        SELECT COUNT(*) AS total
        FROM tournament_participants
        WHERE TournamentID='$tid'
    "));
?>
<div class="card">
    <?php if(!empty($row['TournamentVideo'])) { ?>
    <video class="card-video" muted playsinline preload="metadata">
        <source src="<?php echo $row['TournamentVideo']; ?>" type="video/mp4">
    </video>
<?php } ?>
    <div class="card-content">
        <h2><?php echo $row['TournamentName']; ?></h2>
        <p><b>Game:</b> <?php echo $row['GameName']; ?></p>
        <p><b>Status:</b> <?php echo $row['Status']; ?></p>
        <p><b>Date:</b> <?php echo $row['TournamentDate']; ?></p>
        <p><b>Time:</b> <?php echo $row['StartTime']; ?></p>
        <p><b>Entry Fee:</b> Rs. <?php echo $row['EntryFee']; ?></p>
        <p><b>Prize Pool:</b> Rs. <?php echo $row['PrizePool']; ?></p>
        <p>
            <b>Players:</b>
            <?php echo $count['total']; ?> /
            <?php echo $row['MaxPlayers']; ?>
        </p>

        <?php

$joined = mysqli_query($conn,"
    SELECT *
    FROM tournament_participants
    WHERE TournamentID='$tid'
    AND UserID='$userid'
");
if(mysqli_num_rows($joined) > 0)
{
    echo "
    <div style='display:flex;align-items:center;gap:10px;'>
        <button class='btn' disabled
        style='background:#28a745;color:white;cursor:not-allowed;'>
            Participated
        </button>

        <span style='color:#4CAF50;font-weight:bold;'>
            ✓ Already Participated
        </span>
    </div>";
}
else if($count['total'] < $row['MaxPlayers'])
{
?>

<form method="POST" style="display:flex;align-items:center;gap:15px;">
    <input type="hidden" name="tid" value="<?php echo $tid; ?>">

    <button type="submit" name="join" class="btn">
        Participate
    </button>

    <span style="color:#aaa;">
        Join this tournament now
    </span>
</form>

<?php
}
else
{
    echo "<p style='color:red;font-weight:bold;'>Tournament Full</p>";
}
?>

    </div>

    <div class="card-image">
        <img src="<?php echo $row['TournamentImage']; ?>" alt="Tournament">
    </div>

</div>

<?php } ?>

</div>
<script>
const PLAY_SECONDS = 5; // how long the video plays on hover

document.querySelectorAll('.card').forEach(card => {
    const video = card.querySelector('.card-video');
    if(!video) return;

    let timer;

    card.addEventListener('mouseenter', () => {
        card.classList.add('playing');
        video.currentTime = 0;
        video.play().catch(() => {});

        // stop after a few seconds
        clearTimeout(timer);
        timer = setTimeout(() => {
            video.pause();
            card.classList.remove('playing');
        }, PLAY_SECONDS * 1000);
    });

    card.addEventListener('mouseleave', () => {
        clearTimeout(timer);
        video.pause();
        card.classList.remove('playing');
    });
});
</script>
</body>
</html>