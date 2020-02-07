<?php
                    if(isset($_POST['user_choice'])) {
                        $CPUChoice = array('Rock', 'Paper', 'Scissors');
                        shuffle($CPUChoice);
                        $CPU = $CPUChoice[0];
                        $User = $_POST['user_choice'];

                        echo 'Player: '.$User.' <br>CPU: '.$CPU;

                        if($User === $CPU){
                            echo '<br>Result: Tie!';
                        }
                        else if($User === "Rock"){
                            if($CPU === "Scissors") {
                                echo '<br>Result: User wins';
                            } else {
                                echo '<br>Result: CPU wins';
                            }
                        }
                        else if($User === "Paper") {
                            if($CPU === "Rock") {
                                echo '<br>Result: User wins';
                            }else {
                                if($CPU === "Scissors") {
                                    echo '<br>Result: Computer wins';
                                }
                            }
                        }
                        else if($User === "Scissors") {
                            if($CPU === "Rock") {
                                echo '<br>Result: CPU wins';
                            } else {
                                if($CPU === "Paper") {
                                    echo '<br>Result: User wins';
                                }
                            }
                        }
                   }
                   else
                   {
                       echo "sfd";
                   }
            ?>