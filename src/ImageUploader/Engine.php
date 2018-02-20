<?php
namespace ImageUploader;

use Check24Framework\Request;

class Engine
{

    /**
     * @param Request $requestData
     * @param string $destinationDirectory
     * @return array
     * @throws \Exception
     */
    public function processFile(Request $requestData, string $destinationDirectory = 'imageUploaderImages/'): array
    {
        //$this->viewPicture();
        $newFileName = $this->moveToDestinationDirectory($requestData, $destinationDirectory);
        return [
            'title' => $requestData->postFromQuery('title'),
            'path' => $newFileName
        ];

    }

    /**
     * @param Request $fileData
     * @param string $destinationDirectory
     * @return string
     * @throws \Exception
     */
    private function moveToDestinationDirectory(Request $fileData, string $destinationDirectory): string
    {
        $sourceFileName = basename($fileData->fileFromQuery('userFile','name'));
        $sourceFileDirectory = $fileData->fileFromQuery('userFile','tmp_name');
        $sourceFileExtension = $this->detectExtension($sourceFileName);

        $destinationFilesIterator = new \FilesystemIterator($destinationDirectory);
        $destinationFileCount = iterator_count($destinationFilesIterator);

        $newFileName = $destinationDirectory . ($destinationFileCount + 1) . '.' . $sourceFileExtension;
        move_uploaded_file($sourceFileDirectory, $newFileName);
        return $newFileName;
    }

    /**
     * @param string $sourceFileName
     * @return string
     * @throws \Exception
     *
     */
    private function detectExtension(string $sourceFileName): string
    {
        $types = array('image/jpeg', 'image/gif', 'image/png');
        if (in_array($_FILES['userFile']['type'], $types)) {
            $sourceFileExtension = pathinfo($sourceFileName, PATHINFO_EXTENSION);
            return $sourceFileExtension;
        } else {
            throw new \Exception('Das ist leider kein Bild');
        }
    }
}