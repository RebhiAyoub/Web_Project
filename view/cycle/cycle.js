document.addEventListener("DOMContentLoaded", function () {
    function show(elementId, message) {
    var Element = document.getElementById(elementId);
    Element.innerHTML = message;
    Element.style.color = 'white';
    }
    function calculateCycleLength() 
    {
        var resultContainer = document.getElementById('result-display');
            // Get form data
			 //FORMDATA it took values from the form variables
            var formData = $('#cycle-form').serialize();

            // Perform AJAX:no reload needed post and sends data to the html page created request
            $.post('./cyclefinder.php', formData, function (response) {
				  
                // Update result-container with the response
                //$('result-display').html(index);
                show(result-display,response);
            });
    }

}
<script>

        function calculateCycleLength() {
			var resultContainer = document.getElementById('result-display');
            // Get form data
			 //FORMDATA it took values from the form variables
            var formData = $('#cycle-form').serialize();

            // Perform AJAX:no reload needed post and sends data to the html page created request
            $.post('./cyclefinder.php', formData, function (response) {
				  
                // Update result-container with the response
                $('result-display').html(index);
            });
        }
		function compareDates() {
            // Get the input values from HTML form elements
            var date1 = new Date(document.getElementById('currentPeriodDate').value);
            var date2 = new Date(document.getElementById('previousPeriodDate').value);
			var submitButton = document.getElementById('calculatePeriod');
			

            // Compare the dates
            if (date1 > date2) {
				date1.disabled = false;
                date2.disabled = false;
				submitButton.disabled = false;
            } else if (date1 < date2) {
                alert('currentPeriodDate must be later than previousPeriodDate !');
				submitButton.disabled = true;
				date1.disabled = true;
                date2.disabled = true;
            } else {
				submitButton.disabled = true;
            }

			return (date1>date2)
        }

    </script>