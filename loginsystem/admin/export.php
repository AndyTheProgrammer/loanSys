<?php 
              session_start();
include'dbconnection.php';                 
                               
                              $ret=mysqli_query($con,"select * from loan");
                              
                $html='<table><tr><td> user_id </td><td> first_name </td> <td> lamount</td> 
                       <td> loan purpose</td> <td> payable</td> <td> status </td> </tr><table>';
                            //fecth data from db for each row under "user_id, fname, lamount, lpurpose, payable, status"                
                       while($row=mysqli_fetch_array($ret)){
                      // Status code 0=pending, 1=Approved, 2=Rejected
                        if($row['status']== 0){
                          $row['status']= 'pending';
                        }elseif ($row['status']== 1) {
                          $row['status']= 'Approved';
                        }elseif ($row['status']== 2){
                          $row['status']= 'Rejected';
                        }else{
                          $row['status']= 'Error';
                        }

                     $html .='<tr><td>' .$row['user_id'].' </td><td>'.$row['fname'].' </td> 
                      <td> '.$row['lamount'].'</td> <td>'.$row['lpurpose'].
                             '</td> <td> '.$row['payable'].' </td>
                               <td> '.$row['status'].' </td></tr>';
                 // echo $html;

                }
                $html.='</table>';
                // export to excel file
                header('content-Type:application/xls');
              header('content-Disposition:attachment; filename=report.xls');
              echo $html;

                                    ?>