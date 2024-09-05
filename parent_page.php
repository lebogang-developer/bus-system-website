<?php
session_start();
if (!isset($_SESSION['parent_name']) || $_SESSION['role'] != 'parent') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <title>Parent Page</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="lead">Welcome Parent</h1>
        <h2>Register Learner for Bus</h2>
        <form action="register_learner.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Learner's Name</label>
                <input type="text" class="form-control" id="name" name="learner_name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Learner's Surname</label>
                <input type="text" class="form-control" id="surname" name="learner_surname" required>
            </div>
            <div class="mb-3">
                <label for="cell_no" class="form-label">Cell No</label>
                <input type="text" class="form-control" id="cell_no" name="learner_cell_no" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-select" id="grade" name="grade" required>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bus_route" class="form-label">Buses and Routes</label>
                <h3>Morning Pick Up Bus 1</h3>
                <select class="form-select" id="bus_route" name="bus_route" required>
                    <option value="Bus 1A - Corner of Panorama and Marabou Road (Morning: 6:00 AM)">Bus 1A (Rooihuiskraal)
                        - Corner of Panorama and Marabou Road (Morning: 6:22 AM)</option>
                    <option value="Bus 1B - Route B (Morning: 6:15 AM, Afternoon: 3:15 PM)">Bus 1B
                        - Corner of Kolgansstraat and Skimmerstraat (Morning: 6:30 AM, Afternoon: 3:15 PM)</option>
                </select>
                <h3>Afternoon Drop-off Bus 1</h3>
                <select class="form-select" id="bus_route" name="bus_route" required>
                    <option value="Bus 1A - Corner of Panorama and Marabou Road (Afternoon: 14:30)">
                        Bus 1A (Rooihuiskraal) - Bus 1A - Corner of Panorama and Marabou Road (Afternoon: 14:30)
                    </option>
                    <option value="Bus 1B - Corner of Kolgansstraat and Skimmerstraat (Afternoon: 14:39)">
                        Bus 1B - Corner of Kolgansstraat and Skimmerstraat (Afternoon: 14:39)
                    </option>
                </select>

                <hr>
                <h3>Morning Pick Up Bus 2</h3>
                <select class="form-select" name="bus_route" id="bus_route" required>
                    <option value="Bus 2A - Corner of Reddersburg Street and Mafeking Drive (Morning: 6:25 AM)">
                        Bus 2A - Corner of Reddersburg Street and Mafeking Drive (Morning: 6:25 AM) Bus 1A (Wierdapark)
                    </option>
                    <option value="Bus 2B - Corner of Theuns van Niekerkstraat and Roosmarynstraat (Morning: 6:35)">
                        Bus 2B - Corner of Theuns van Niekerkstraat and Roosmarynstraat (Morning: 6:35)
                    </option>
                </select>
                <h3>Afternoon Drop-off Bus 2</h3>
                <select class="form-select" name="bus_route" id="bus_route" required>
                    <option value="Bus 2A - Corner of Reddersburg Street and Mafeking Drive (Afternoon: 14:25)">
                        Bus 2A - Corner of Reddersburg Street and Mafeking Drive (Afternoon: 14:25)
                    </option>
                    <option value="Bus 2B - Corner of Theuns van Niekerkstraat and Roosmarynstraat (Afternoon: 14:30)">
                        Bus 2B - Corner of Theuns van Niekerkstraat and Roosmarynstraat (Afternoon: 14:30)
                    </option>
                </select>

                <hr>
                <h3>Morning Pick Up Bus 3</h3>
                <select class="form-select" name="bus_route" id="bus_route" required>
                    <option value="Bus 3A - Corner of Jasper Drive and Tieroog Street (Morning: 6:20)"> Bus 3A (Centurion)
                        - Bus 3A - Corner of Jasper Drive and Tieroog Street (Morning: 6:20)
                    </option>
                    <option value="Bus 3B - Corner of Louise Street and Von Willich Drive (Morning: 6:40)"> Bus 3B
                        - Bus 3B - Corner of Louise Street and Von Willich Drive (Morning: 6:40)
                    </option>
                </select>
                <h3>Afternoon Drop Off Bus 3</h3>
                <select class="form-select" name="bus_route" id="bus_route" required>
                    <option value="Bus 3A - Corner of Jasper Drive and Tieroog Street (Morning: 14:30)">
                        Bus 3A - Corner of Jasper Drive and Tieroog Street (Afternoon: 14:30)
                    </option>
                    <option value="Bus 3B - Corner of Louise Street and Von Willich Drive (Afternoon: 14:40)">
                        Bus 3B - Corner of Louise Street and Von Willich Drive (Afternoon: 14:40)
                    </option>
                </select>

                <button type="submit" class="btn btn-primary">Register Learner</button>
            </div>
        </form>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>