<script>
                            
                         <?php
                                // exec("sudo chmod 777 *.txt");
                                $a = 'test_cases/11.txt';
                                $b = '11111.txt';
                                $check = 0;

                                // Check if filesize is different
                                if (filesize($a) !== filesize($b))
                                    $check = 0;

                                // Check if content is different
                                $ah = fopen($a, 'rb');
                                $bh = fopen($b, 'rb');

                                $check = 1;
                                while (!feof($ah)) {
                                    if (fread($ah, 8192) != fread($bh, 8192)) {
                                        $check = 0;
                                        break;
                                    }
                                }

                                fclose($ah);
                                fclose($bh);
                                //  exec("rm -f *.txt");
                                ?>    




                            function submitcode1() {
                                callSubmit();
                                
                                alert('<?php if ($result) echo "congratulation!!!! your answer is correct.";
                                        else  echo "Sorry!! your ans is not correct."; ?>');

                            }
                        </script>