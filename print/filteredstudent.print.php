<?php
                    include_once '../database/dbconnection.db.php';

                    if ($_POST['filter'] == "all"){
                        $sql2 = "SELECT * from studentrecords";
                        $result2 = $conn-> query($sql2);

                        if($result2-> num_rows > 0 ){
                            while($row2 = $result2-> fetch_assoc()){
                       
                        echo "<tr><td>".$row2['student_id']."</td>
                        <td>".$row2['name']."</td>
                        <td>".$row2['gender']."</td>
                        <td>".$row2['cellphone']."</td>
                        <td>".$row2['course']."</td>
                        <td>".$row2['address']."</td>
                        </tr>";
                            }
                        }

                    }else{
                        $sql2 = "SELECT * from studentrecords where course = '$_POST[filter]'";
                        $result2 = $conn-> query($sql2);

                        if($result2-> num_rows > 0 ){
                            while($row2 = $result2-> fetch_assoc()){
                       
                        echo "<tr><td>".$row2['student_id']."</td>
                        <td>".$row2['name']."</td>
                        <td>".$row2['gender']."</td>
                        <td>".$row2['cellphone']."</td>
                        <td>".$row2['course']."</td>
                        <td>".$row2['address']."</td>
                        </tr>";
                            }
                        }

                    }
                           
                   
                    
                ?>