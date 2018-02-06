<?php

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'upload':
            $start = new ImageUploader();
            $htmlOutput = $start->processFile($_POST, $_FILES);
            include('../template/image-uploader/viewUploadedImage.phtml');
            break;
    }
}else {
    include('../template/image-uploader/imageHtml.phtml');
}

