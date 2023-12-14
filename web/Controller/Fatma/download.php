<?php 
				
                if (isset($_POST['action']) && $_POST['action'] === 'exportCSV') { 
					// Call the function to generate CSV data:which is a file format for storing database or tabular data
					$csvContent = generateCSVData();
				
					// Set appropriate headers for download
					header('Content-Type: text/csv');
					header('Content-Disposition: attachment; filename="exported_data.csv"');
					header('Pragma: no-cache');
					header('Expires: 0');
				
					// Output the CSV content
					echo $csvContent;
				
					// Terminate the script
					exit();
				}
                
                function generateCSVData() {
                    // Fetch data from your database or any other source
                    // Build an array with your data
                    $data = array(
                        array('Column1', 'Column2', 'Column3'),
                        array('Value1', 'Value2', 'Value3'),
                        // ... add more rows as needed
                    );
                
                    // Open an output buffer to capture CSV content
                    ob_start();
                    $df = fopen("php://output", 'w');
                    foreach ($data as $row) {
                        fputcsv($df, $row);
                    }
                    fclose($df);
                
                    // Get the content of the output buffer and clean the buffer
                    $csvContent = ob_get_clean();
                
                    return $csvContent;
                }

				
				
			?>