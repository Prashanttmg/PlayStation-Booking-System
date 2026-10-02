<?php
session_start();
include 'config.php';
if(!isset($_SESSION['UserID']) || $_SESSION['Role'] != 'admin')
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['add_tournament']))
{
    $name = trim($_POST['tournament_name']);
    $game = trim($_POST['game_name']);
    $date = $_POST['tournament_date'];
    $time = $_POST['start_time'];
    $entry_fee = intval($_POST['entry_fee']);
    $max_players = intval($_POST['max_players']);
    $status = $_POST['status'];

    if(empty($name) || empty($game) || empty($date) || empty($time))
    {
        $error = "Please fill all required fields.";
    }

    elseif($entry_fee < 0)
    {
        $error = "Entry fee cannot be negative.";
    }

    elseif($max_players < 2 || $max_players > 32)
    {
        $error = "Maximum players must be between 2 and 32.";
    }

    else
    {

        if($date < date('Y-m-d'))
        {
            $error = "Tournament date cannot be in the past.";
        }
        else
        {
            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO tournament
                (TournamentName, GameName, TournamentDate, StartTime, EntryFee, MaxPlayers, Status)
                VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            mysqli_stmt_bind_param(
                $stmt,
                "ssssiis",
                $name,
                $game,
                $date,
                $time,
                $entry_fee,
                $max_players,
                $status
            );
            if(mysqli_stmt_execute($stmt))
            {
                echo "<script>
                        alert('Tournament added successfully.');
                        window.location='manage_tournament.php';
                      </script>";
                exit();
            }
            else
            {
                $error = "Failed to add tournament: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        }
    }
}

?>
<?php include 'admin_header.php'; ?>
<div class="container">
    <div class="form-card">
        <h1>Add Tournament</h1>
        <p class="subtitle">
            Create a new PlayStation tournament
        </p>
        <?php if(isset($error)) { ?>

            <div class="error">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php } ?>
        <form method="POST">

            <label>
                Tournament Name
            </label>

            <input
                type="text"
                name="tournament_name"
                placeholder="Example: FIFA 26 Championship"
                required
            >

            <label>
                Game Name
            </label>

            <input
                type="text"
                name="game_name"
                placeholder="Example: FIFA 26"
                required
            >

            <label>
                Tournament Date
            </label>
            <input
                type="date"
                name="tournament_date"
                min="<?= date('Y-m-d'); ?>"
                required
            >

            <label>
                Start Time
            </label>

            <input
                type="time"
                name="start_time"
                required
            >

            <label>
                Entry Fee (NPR)
            </label>

            <input
                type="number"
                name="entry_fee"
                value="250"
                min="0"
                required
            >

            <label>
                Maximum Players
            </label>

            <input
                type="number"
                name="max_players"
                value="32"
                min="2"
                max="32"
                required
            >

            <label>
                Status
            </label>

            <select name="status" required>

                <option value="Upcoming">
                    Upcoming
                </option>

                <option value="Ongoing">
                    Ongoing
                </option>

                <option value="Completed">
                    Completed
                </option>

            </select>

            <div class="buttons">

                <button
                    type="submit"
                    name="add_tournament"
                    class="add-btn"
                >
                    Add Tournament
                </button>

                <a
                    href="manage_tournament.php"
                    class="cancel-btn"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
<style>
.container{
    padding:40px;
    color:white;
}

.form-card{
    max-width:650px;
    margin:20px auto;
    background:#1b1b1b;
    padding:35px;
    border:1px solid #c9a84c;
    border-radius:10px;
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

.form-card h1{
    margin:0;
    color:#c9a84c;
}

.subtitle{
    color:#aaa;
    margin-bottom:30px;
}

.error{
    background:#5c1f1f;
    color:#ffb3b3;
    border:1px solid #e53935;
    padding:12px;
    border-radius:5px;
    margin-bottom:20px;
}

label{
    display:block;
    margin-top:18px;
    margin-bottom:7px;
    font-weight:bold;
    color:#ddd;
}

input,
select{
    width:100%;
    box-sizing:border-box;
    padding:12px;
    background:#111;
    color:white;
    border:1px solid #555;
    border-radius:5px;
    outline:none;
    font-family:inherit;
}

input:focus,
select:focus{
    border-color:#c9a84c;
}

.buttons{
    display:flex;
    gap:12px;
    margin-top:30px;
}

.add-btn,
.cancel-btn{
    padding:12px 20px;
    border-radius:5px;
    text-decoration:none;
    font-weight:bold;
    cursor:pointer;
    border:none;
    font-size:14px;
}

.add-btn{
    background:#c9a84c;
    color:black;
}

.add-btn:hover{
    background:#e0c36b;
}

.cancel-btn{
    background:#444;
    color:white;
}

.cancel-btn:hover{
    background:#555;
}
</style>