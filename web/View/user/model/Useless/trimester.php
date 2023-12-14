<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
    <meta charset="UTF-8">
    <title>Trimester Finder</title>
    <link rel="stylesheet" href="deliverydate.css">
</head>
<body>

<section id="featured-cars" class="wte-ddc-index-hero">
    <div class="breadcrumb text-center mx-auto col-12">
        <div class="inner">
            <a class="category ga-breadcrumb-link" href="tracker.html">Pregnancy Tracker</a>
            <span>&gt;</span>
            <a class="category ga-breadcrumb-link" href="trimester.php">Trimester Finder</a>
        </div>
    </div>
    <div class="container">
        <div class="text">
            Trimester Calculator
        </div>
        
        <form action="#" method="post" onsubmit="calculateDelivery(event)">
            <div class="form-row">
                <div class="input-data" >
                    <input type="date" required id="lastPeriodDate" style="padding-top: 15px;  padding-left: 10px; color: #800e78;">
                    <div class="underline"></div>
                    <label style="padding-top: 10px;" for="lastPeriodDate">First Day Of Last Period</label>
                </div>
                <div class="input-data">
                    <input type="number" required id="cycleLength" style="padding-top: 15px; padding-left: 10px; color: #800e78;" >
                    <div class="underline"></div>
                    <label for="cycleLength">Cycle Length (in days)</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea" style="padding-left: 250px; padding-bottom: 50px;" >
                    <div class="form-row submit-btn" style="margin-top: 10px;">
                        <div class="input-data">
                            <div  class="inner"></div>
                            <input  name="submit" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div id="result"></div>
        <p style="color: #800e78; font-size: 18px; padding-left:250px;">Save Your Information</p>
        <a href="http://localhost/carvilla-v1.0/View/model/SaveInfosTrimester.php" style="color: #800e78; font-size: 18px; text-decoration: none; padding-left: 320px;">Here</a>

        
        
    </div>
    
</section>
<script>
    function calculateDelivery(event) {
        event.preventDefault(); // Prevent the form from submitting and refreshing the page

        // Get the input values
        const lastPeriodDate = new Date(document.getElementById('lastPeriodDate').value);
        const cycleLength = parseInt(document.getElementById('cycleLength').value);

        // Calculate the current date
        const currentDate = new Date();

        // Calculate the weeks elapsed since the last period
        const weeksElapsed = Math.floor((currentDate - lastPeriodDate) / (7 * 24 * 60 * 60 * 1000));

        let trimester = '';

        // Determine trimester based on weeks elapsed
        if (weeksElapsed >= 1 && weeksElapsed <= 12) {
            trimester = 'First Trimester';
        } else if (weeksElapsed > 12 && weeksElapsed <= 27) {
            trimester = 'Second Trimester';
        } else if (weeksElapsed > 27 && weeksElapsed <= 40) {
            trimester = 'Third Trimester';
        } else {
            trimester = 'Not in a valid trimester yet';
        }

        // Display the result on the page
        document.getElementById('result').innerHTML = `Trimester: ${trimester}`;
    }
</script>


</body>
</html>
