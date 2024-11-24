<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- we used pico css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<body>
<div class="overflow-auto">
    <table class="striped">
      <thead data-theme="light">
        <tr>
          <th scope="col">Year</th>
          <th scope="col">Semester</th>
          <th scope="col">The Programs</th>
          <th scope="col">Nationality</th>
          <th scope="col">colleges</th>
          <th scope="col">number_of_students</th>
    
        </tr>
      </thead>
      <tbody>
      <?php 
         // fetch data from the Bahrain Open Data Portal API and  Parse the JSON response (Data Retrieval)
         $URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
         $response = file_get_contents($URL);
         $data = json_decode($response, true);
    
         // Print all data in the table (Data Visualization)
         for($i=0;$i<sizeof($data['results']);$i++)
         {
            echo "<tr>";
            echo "<th scope='row'>" . $data['results'][$i]['year'] . "</th>";
            echo "<th scope='row'>" . $data['results'][$i]['semester'] . "</th>";
            echo "<th scope='row'>" . $data['results'][$i]['the_programs'] . "</th>";
            echo "<th scope='row'>" . $data['results'][$i]['nationality'] . "</th>";
            echo "<th scope='row'>" . $data['results'][$i]['colleges'] . "</th>";
            echo "<th scope='row'>" . $data['results'][$i]['number_of_students'] . "</th>";
            echo "</tr>";
         }
        
       ?>
      </tbody>
      <tfoot>
      </tfoot>
    </table>
   
</div>
</body>
</html>


