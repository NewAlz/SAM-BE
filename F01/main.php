<?php session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$accountType = $_SESSION['account_type'];
include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olympic Seating - Tickets</title>
  <link rel="icon" href="logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
      border: none;
      outline: none;
      scroll-behavior: smooth;
    }

    :root {
      --bg-color: #FFFFFF;
      --secondary-bg-color: grey;
      --text-color: #000000;
      --main-color: #FFA500;
      --font-family: 'Poppins', sans-serif;
    }

    html {
      font-size: 62.5%;
      overflow-x: hidden;
    }

    body {
      background: linear-gradient(to right, #4e54c8, #8f94fb);
      min-height: 100vh;
      color: var(--text-color);
      font-family: var(--font-family);
      user-select: none;
      overflow-x: hidden;
    }

    html::-webkit-scrollbar {
      width: 0.8em;
    }

    html::-webkit-scrollbar-track {
      background: var(--bg-color);
    }

    html::-webkit-scrollbar-thumb {
      background: var(--main-color);
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 3rem 9%;
      background: var(--main-color);
      filter: drop-shadow(10px);
      border-bottom: .1px solid var(--main-color);
      z-index: 100;
    }

    .nav-img {
      height: 5rem;
      width: 9rem;
    }

    @keyframes gradient {
      to {
        background-position: 200%;
      }
    }

    ul {
      list-style-type: none;
    }

    .navbar-nav .nav-link {
      font-size: 1.8rem;
      color: var(--text-color);
      margin-left: 1rem;
      font-weight: 800;
      transition: 0.3s ease;
      border-bottom: 3px solid transparent;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      transform: scale(1.1);
      background: linear-gradient(to right, #0085c7, #FCB131, #FFFFFF, #00A651, #EE334E);
      background-size: 200%;
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradient 2.5s linear infinite;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='blue' stroke-width='2' d='M4 7h22M4 15h22M4 23h22' /%3E%3C/svg%3E");
    }

    @media (max-width: 991.98px) {
      .navbar-collapse {
        height: 0;
        overflow: hidden;
        transition: height 0.4s ease-in-out;
        display: flex;
        flex-direction: column;
      }

      .navbar-nav {
        gap: 1rem;
        text-align: center;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
      }

      .navbar-collapse.show {
        height: auto !important;
      }
    }

    .hero {
      background: url('https://via.placeholder.com/1500x500') center/cover no-repeat;
      height: 500px;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .event-card img {
      height: 200px;
      object-fit: cover;
    }

    .seat {
      width: 50px;
      height: 50px;
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 5px;
      cursor: pointer;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 3px;
      transition: background-color 0.3s;
      color: black;
      font-size: 12px;
    }

    .seat.selected {
      background-color: #0d6efd;
      color: white;
    }

    .seat.occupied {
      background-color: #6c757d;
      color: white;
      cursor: not-allowed;
    }

    .seat-row {
      display: flex;
      justify-content: center;
      margin-bottom: 5px;
    }

    .seat-container {
      width: 100%;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      background: #f9f9f9;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <img class="nav-img" src="logo.png">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto text-center">
          <li class="nav-item">
            <label class="nav-link active"><?php echo $_SESSION['username']; ?>(<?php echo $accountType ?>)</label>
          </li>
          <li class="nav-item">
            <form method="POST" class="d-inline">
              <button type="submit" name="logout" class="btn btn-link nav-link">Logout</button>
            </form>
            <?php if (isset($_POST['logout'])) {
              session_unset();
              session_destroy();
              echo '<script>window.location = "index.php"</script>';
              exit();
            } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero">
    <div class="text-center">
      <h1>Welcome to the Olympics!</h1>
      <p>Experience the thrill of the games live!</p>
    </div>
  </section>

  <?php if ($accountType == "user"):

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Handle sport selection
    if (isset($_POST['sport'])) {
      $_SESSION['selectedSport'] = $_POST['sport'];
    }

    // Default to Basketball if no sport is selected
    $sport = isset($_SESSION['selectedSport']) ? $_SESSION['selectedSport'] : 'Basketball';

    // Map sport to corresponding table
    switch ($sport) {
      case 'Basketball':
        $tableName = 'db_bball_seats';
        break;
      case 'Gymnastics':
        $tableName = 'db_gym_seats';
        break;
      case 'Swimming':
        $tableName = 'db_swim_seats';
        break;
      case 'Track and Field':
        $tableName = 'db_taf_seats';
        break;
      default:
        $tableName = 'db_bball_seats';
    }

    // Fetch occupied seats from the database
    $query = "SELECT seat_number FROM $tableName WHERE is_occupied = 1";
    $result = mysqli_query($conn, $query);
    $occupiedSeats = [];
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $occupiedSeats[] = $row['seat_number'];
      }
    }

    // Handle ticket purchase
    if (isset($_POST['buyTickets']) && isset($_POST['selectedSeats'])) {
      $selectedSeats = explode(',', $_POST['selectedSeats']);
      $timestamp = date('Y-m-d H:i:s');
      foreach ($selectedSeats as $seat) {
        $seat = trim($seat);
        $updateQuery = "UPDATE $tableName 
                    SET is_occupied = 1, 
                        account_id = (SELECT account_id FROM db_accounts WHERE username = '$username'), 
                        timestamp = '$timestamp' 
                    WHERE seat_number = '$seat' AND is_occupied = 0";
        mysqli_query($conn, $updateQuery);
        echo '<script>window.location = "main.php"</script>';
      }
    }

    // Handle ticket deletion
    if (isset($_POST['deleteTicket'])) {
      $seatToDelete = $_POST['seatToDelete'];

      // Check which table the seat belongs to by checking the seat number
      // We need to search all tables for the seat
      $tables = ['db_bball_seats', 'db_gym_seats', 'db_swim_seats', 'db_taf_seats'];
      $tableToDelete = '';

      // Check each table to find the correct table for the seat number
      foreach ($tables as $table) {
        $checkQuery = "SELECT * FROM $table WHERE seat_number = '$seatToDelete' AND account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
          $tableToDelete = $table; // If found, we set the table to delete from
          break; // Exit loop once found
        }
      }

      // If the seat was found in a table, delete it
      if ($tableToDelete) {
        $deleteQuery = "UPDATE $tableToDelete 
                    SET is_occupied = 0, account_id = NULL, timestamp = NULL 
                    WHERE seat_number = '$seatToDelete' 
                    AND account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')";

        mysqli_query($conn, $deleteQuery);
        echo '<script>window.location = "main.php"</script>';
      } else {
        echo '<script>alert("Seat not found or you do not have permission to delete it.")</script>';
      }
    }
    ?>

    <section id="tickets" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Your Tickets</h2>

        <!-- Form to select sport -->
        <form method="POST" id="seatSelectionForm" class="text-center mb-4">
          <label for="sport" class="form-label">Select Sport</label>
          <select id="sport" name="sport" class="form-select w-auto d-inline-block mx-auto" onchange="this.form.submit()">
            <option value="Basketball" <?php echo ($sport == 'Basketball') ? 'selected' : ''; ?>>Basketball</option>
            <option value="Gymnastics" <?php echo ($sport == 'Gymnastics') ? 'selected' : ''; ?>>Gymnastics</option>
            <option value="Swimming" <?php echo ($sport == 'Swimming') ? 'selected' : ''; ?>>Swimming</option>
            <option value="Track and Field" <?php echo ($sport == 'Track and Field') ? 'selected' : ''; ?>>Track and Field
            </option>
          </select>
        </form>

        <!-- Seat Layout -->
        <h3 class="text-center">Select Your Seats for <?php echo $sport; ?></h3>
        <form method="POST" class="text-center" id="seatSelectionForm" onsubmit="return confirmBuyTicket()">
          <input type="hidden" name="selectedSeats" id="selectedSeats" />
          <div class="seat-container d-flex justify-content-center flex-wrap gap-2">
            <?php
            $rows = 5;
            $columns = 10;

            for ($i = 1; $i <= $rows; $i++) {
              echo '<div class="seat-row d-flex">';
              for ($j = 1; $j <= $columns; $j++) {
                $seatNumber = "$i-$j";
                $class = in_array($seatNumber, $occupiedSeats) ? 'seat occupied' : 'seat';
                echo "<div class='$class' data-seat='$seatNumber'>$seatNumber</div>";
              }
              echo '</div>';
            }
            ?>
          </div>
          <button type="submit" name="buyTickets" class="btn btn-primary mt-3">Buy Ticket</button>
        </form>

        <!-- Show Purchased Tickets -->
        <h3 class="text-center mt-5">Your Purchased Tickets</h3>
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>Seat Number</th>
              <th>Sport</th>
              <th>Timestamp</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT s.seat_number, 
                             CASE 
                                 WHEN s.table_name = 'db_bball_seats' THEN 'Basketball'
                                 WHEN s.table_name = 'db_gym_seats' THEN 'Gymnastics'
                                 WHEN s.table_name = 'db_swim_seats' THEN 'Swimming'
                                 WHEN s.table_name = 'db_taf_seats' THEN 'Track and Field'
                             END AS sport, 
                             s.timestamp
                      FROM (
                          SELECT 'db_bball_seats' AS table_name, seat_number, timestamp FROM db_bball_seats WHERE account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')
                          UNION ALL
                          SELECT 'db_gym_seats', seat_number, timestamp FROM db_gym_seats WHERE account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')
                          UNION ALL
                          SELECT 'db_swim_seats', seat_number, timestamp FROM db_swim_seats WHERE account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')
                          UNION ALL
                          SELECT 'db_taf_seats', seat_number, timestamp FROM db_taf_seats WHERE account_id = (SELECT account_id FROM db_accounts WHERE username = '$username')
                      ) s
                      WHERE s.seat_number IS NOT NULL";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>{$row['seat_number']}</td>";
              echo "<td>{$row['sport']}</td>";
              echo "<td>{$row['timestamp']}</td>";
              echo "<td>
                        <form method='POST' class='d-inline' onsubmit='return confirmDelete()'>
                            <input type='hidden' name='seatToDelete' value='{$row['seat_number']}' />
                            <button type='submit' name='deleteTicket' class='btn btn-danger btn-sm'>Delete</button>
                        </form>
                    </td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Confirmation JavaScript functions -->
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
        const seats = document.querySelectorAll('.seat');
        const selectedSeatsInput = document.getElementById('selectedSeats');

        seats.forEach(seat => {
          seat.addEventListener('click', () => {
            if (!seat.classList.contains('occupied')) {
              seat.classList.toggle('selected');

              const selectedSeats = Array.from(document.querySelectorAll('.seat.selected'))
                .map(seat => seat.dataset.seat)
                .join(',');

              selectedSeatsInput.value = selectedSeats;
            }
          });
        });
      });

      function confirmDelete() {
        return confirm("Are you sure you want to delete this ticket?");
      }

      function confirmBuyTicket() {
        return confirm("Are you sure you want to buy the selected tickets?");
      }
    </script>


  <?php elseif ($accountType == "admin"): ?>
    <section id="admin-panel" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Admin Panel</h2>

        <!-- Table displaying user seat reservations -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Account ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Seats</th>
              <th>Sport</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Query to fetch all occupied seats and associated account details
            $query = "
      SELECT a.account_id, a.username AS name, a.email, s.seat_number, 
             CASE 
               WHEN s.table_name = 'db_bball_seats' THEN 'Basketball'
               WHEN s.table_name = 'db_gym_seats' THEN 'Gymnastics'
               WHEN s.table_name = 'db_swim_seats' THEN 'Swimming'
               WHEN s.table_name = 'db_taf_seats' THEN 'Track and Field'
             END AS sport
      FROM (
        SELECT 'db_bball_seats' AS table_name, account_id, seat_number 
        FROM db_bball_seats WHERE is_occupied = 1
        UNION ALL
        SELECT 'db_gym_seats', account_id, seat_number 
        FROM db_gym_seats WHERE is_occupied = 1
        UNION ALL
        SELECT 'db_swim_seats', account_id, seat_number 
        FROM db_swim_seats WHERE is_occupied = 1
        UNION ALL
        SELECT 'db_taf_seats', account_id, seat_number 
        FROM db_taf_seats WHERE is_occupied = 1
      ) s
      INNER JOIN db_accounts a ON a.account_id = s.account_id
    ";

            $result = mysqli_query($conn, $query);

            // Populate table rows with data
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
        <td>{$row['account_id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['seat_number']}</td>
        <td>{$row['sport']}</td>
        <td>
          <button class='btn btn-warning btn-sm' onclick='editTicket({$row['account_id']}, \"{$row['seat_number']}\", \"{$row['email']}\", \"{$row['sport']}\")'>Edit</button>
          <button class='btn btn-danger btn-sm' onclick='deleteTicket({$row['account_id']}, \"{$row['seat_number']}\")'>Delete</button>
        </td>
      </tr>";
            }
            ?>
          </tbody>
        </table>


        <!-- Table displaying all user accounts -->
        <h3 class="mt-4">User Accounts</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Account ID</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Query to fetch all user accounts
            $query = "SELECT account_id, username, email FROM db_accounts";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
            <td>{$row['account_id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
          </tr>";
            }
            ?>
          </tbody>
        </table>

        <h3 class="mt-4">Add or Update Ticket</h3>
        <form method="POST" action="main.php">
          <div class="mb-3">
            <label for="account_id" class="form-label">Account ID</label>
            <input type="text" id="account_id" name="account_id" class="form-control" placeholder="Enter Account ID">
          </div>
          <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Enter Email">
          </div>
          <div class="mb-3">
            <label for="seatSelection" class="form-label">Seats</label>
            <input type="text" id="seatSelection" name="seatSelection" class="form-control" placeholder="E.g., 1-1, 1-2">
          </div>
          <div class="mb-3">
            <label for="sportSelection" class="form-label">Sport</label>
            <select id="sportSelection" name="sportSelection" class="form-select">
              <option value="">Select a Sport</option>
              <option value="Swimming">Swimming</option>
              <option value="Track and Field">Track and Field</option>
              <option value="Gymnastics">Gymnastics</option>
              <option value="Basketball">Basketball</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="saveTicket">Save</button>
        </form>
      </div>
    </section>

    <script>
      function deleteTicket(accountId, seatNumber) {
        if (confirm(`Are you sure you want to delete the seat ${seatNumber} for account ID ${accountId}?`)) {
          window.location.href = `main.php?account_id=${accountId}&seat_number=${seatNumber}&action=delete`;
        }
      }

      function editTicket(accountId, seatNumber, email, sport) {
        document.getElementById('account_id').value = accountId;
        document.getElementById('userEmail').value = email;
        document.getElementById('seatSelection').value = seatNumber;
        document.getElementById('sportSelection').value = sport;
      }
    </script>

    <?php
    // Handle ticket deletion logic
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['account_id']) && isset($_GET['seat_number'])) {
      $accountId = $_GET['account_id'];
      $seatNumber = $_GET['seat_number'];

      // Prepare SQL queries to mark the seat as unoccupied
      $queries = [
        "UPDATE db_bball_seats SET is_occupied = 0, account_id = NULL, sport = NULL, timestamp = NULL WHERE seat_number = '$seatNumber' AND account_id = '$accountId'",
        "UPDATE db_gym_seats SET is_occupied = 0, account_id = NULL, sport = NULL, timestamp = NULL WHERE seat_number = '$seatNumber' AND account_id = '$accountId'",
        "UPDATE db_swim_seats SET is_occupied = 0, account_id = NULL, sport = NULL, timestamp = NULL WHERE seat_number = '$seatNumber' AND account_id = '$accountId'",
        "UPDATE db_taf_seats SET is_occupied = 0, account_id = NULL, sport = NULL, timestamp = NULL WHERE seat_number = '$seatNumber' AND account_id = '$accountId'"
      ];

      // Execute the queries
      foreach ($queries as $query) {
        mysqli_query($conn, $query);
      }

      // Redirect to main.php
      echo "<script>window.location.href='main.php';</script>";
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveTicket'])) {
      $accountId = $_POST['account_id'];
      $seatSelection = $_POST['seatSelection'];
      $sportSelection = $_POST['sportSelection'];

      if (!empty($accountId) && !empty($seatSelection) && !empty($sportSelection)) {
        // Determine the new table based on the selected sport
        $newTable = '';
        switch ($sportSelection) {
          case 'Basketball':
            $newTable = 'db_bball_seats';
            break;
          case 'Gymnastics':
            $newTable = 'db_gym_seats';
            break;
          case 'Swimming':
            $newTable = 'db_swim_seats';
            break;
          case 'Track and Field':
            $newTable = 'db_taf_seats';
            break;
        }

        // Store the current seat data
        $storeCurrentSeatQuery = "
              SELECT account_id, sport, is_occupied
              FROM $newTable
              WHERE seat_number = '$seatSelection'
          ";
        $result = mysqli_query($conn, $storeCurrentSeatQuery);
        $currentSeatData = mysqli_fetch_assoc($result);

        // If the seat is occupied, and it's already the same user, no need to store anything
        if ($currentSeatData && $currentSeatData['account_id'] === $accountId) {
          // Temporarily store the data
          $oldAccountId = $currentSeatData['account_id'];
          $oldSport = $currentSeatData['sport'];
        }

        // Delete the old record (if the seat is occupied and needs to be updated)
        $deleteOldQuery = "
              DELETE FROM $newTable
              WHERE seat_number = '$seatSelection' AND account_id = '$accountId'
          ";
        mysqli_query($conn, $deleteOldQuery);

        // Insert the new seat assignment
        $insertNewQuery = "
              INSERT INTO $newTable (seat_number, account_id, sport, is_occupied, timestamp)
              VALUES ('$seatSelection', '$accountId', '$sportSelection', 1, NOW())
          ";

        if (mysqli_query($conn, $insertNewQuery)) {
          echo "<script>alert('Ticket updated successfully!');</script>";
          echo "<script>window.location.href='main.php';</script>";
        } else {
          echo "<script>alert('Error updating ticket.');</script>";
        }
      } else {
        echo "<script>alert('Please fill in all fields.');</script>";
      }
    }

  endif; ?>

  <footer class="bg-dark text-white text-center py-3">
    <p class="m-0">&copy; 2025 Olympic Branding. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>