<?php
/*echo $_POST['title'];
$uploadFolder = 'image/';
$fileName = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extention = pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION);
$nextFile = $uploadFolder . $fileName . '.' . $extention;

if (isset($_POST['upload'])) {
    if (file_exists($nextFile)) {
        $counter = 1;

        $existFile = $uploadFolder . $fileName . '_' . $counter . '.' . $extention;


    }
    move_uploaded_file($_FILES['datei']['tmp_name'], $nextFile);

    $filesInDirectory = new FilesystemIterator($uploadFolder);
    $counter = iterator_count($filesInDirectory) + 1;
} */
//css benutzen
//shift+f6
class ImageUploader
{

    /**
     * @param array $fileMeta
     * @param array $fileData
     * @param string $destinationDirectory
     * @return array
     */
    public function processFile(array $fileMeta, array $fileData, string $destinationDirectory = '../public/imageUploaderImages/'): array
    {
        //$this->viewPicture();
        $newFileName = $this->moveToDestinationDirectory($fileData, $destinationDirectory);
        return [
            'title' => $fileMeta['title'],
            'path' => $newFileName
        ];

    }

    /*private function viewPicture()
    {
        $alledateien = scandir('images');

        foreach ($alledateien as $datei) {
            echo $datei . "<br />";
        }
    }*/

    /**
     * @param array $fileData
     * @param string $destinationDirectory
     * @return string
     */
    private function moveToDestinationDirectory(array $fileData, string $destinationDirectory): string
    {
        $sourceFileName = basename($fileData['userFile']['name']);
        $sourceFileDirectory = $fileData['userFile']['tmp_name'];
        try {
            $sourceFileExtension = $this->detectExtension($sourceFileName);
        } catch (\Exception $exeption) {
            echo $exeptionMessage = $exeption->getMessage();
            return '';
        } //todo: try-catch

        $destinationFilesIterator = new FilesystemIterator($destinationDirectory);
        $destinationFileCount = iterator_count($destinationFilesIterator);

        $newFileName = $destinationDirectory . ($destinationFileCount + 1) . '.' . $sourceFileExtension;
        move_uploaded_file($sourceFileDirectory, $newFileName);
        return $newFileName;
    }

    /**
     * @param $sourceFileName
     * @return string
     * @throws Exception
     */
    private function detectExtension($sourceFileName): string
    {
        $types = array('image/jpeg', 'image/gif', 'image/png');
        if (in_array($_FILES['userFile']['type'], $types)) {
            $sourceFileExtension = pathinfo($sourceFileName, PATHINFO_EXTENSION);
            return $sourceFileExtension;
        } else {
            // todo: throw exception
            throw new \Exception('Das ist leider kein Bild');
        }
    }

}