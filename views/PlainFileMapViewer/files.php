<?php

//$startpath = "../../";
//$currentFile = new \RecursiveIteratorIterator(
//    new \RecursiveDirectoryIterator($startpath)
//);



?>

<style>

    table#filemap td {padding: 5px;}
</style>

<table id="fileMap">

    <?php

    $files = [];
    foreach ($dir as $file) {
        $files[]=$file;

    }

    //var_dump($files);


    $previousFile = '';
    foreach ($files as $index=>$file) {

        // format, if we have a '..','.' "files" and next non such a files exists afterwards, a regular file, in that case don't show such a record for display
        if (in_array($file->getFilename(), [".",".."]) && isset($files[$index+1]) && strpos($files[$index+1]->getPathName(), dirname($file->getPathName()))!==false) {
            continue;
        }

        $file = $file->getPathName();
        ?>

        <tr style="border: 1px solid black">

            <?php

            $file = explode("/", $file);

            //echo $file . '<br>';


            foreach ($file as $pathIndex => $pathPart) {


                $display = true;
                if ($previousFile) {

                    // if last part of array is the same as exact subelement eg, middle of the path being to written
                    // then don't output it , as it already was once
                    $lastPart = array_slice($previousFile, 0, $pathIndex+1);
                    $currentPart = array_slice($file, 0, $pathIndex+1);
                    if ($currentPart == $lastPart) {
                        $display = false;
                    }

                }
                // if ($file!=previousFile echo $patPart }
//                else{
//                echo  $pathPart
//                }
                ?>

                <td style="<?php echo $display? 'border: 1px solid black':''; ?>">

                    <?php

                    if ($display ) {
                        if (strpos($pathPart,".")===false) {
                            $pathPart = "<b>".$pathPart."</b>";
                        }
                        echo $pathPart;
                    }

                    ?>

                </td>

                <?php
            }

            $previousFile = $file;



            ?>

        </tr>

        <?php

    }

    ?>



</table>
