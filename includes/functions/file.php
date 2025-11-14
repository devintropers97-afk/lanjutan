<?php
/**
 * ========================================
 * SITUNEO DIGITAL - File Upload Handler
 * File upload and management functions
 * ========================================
 */

/**
 * Upload single file
 *
 * @param array $file File from $_FILES
 * @param string $destination Destination folder
 * @param array $allowedTypes Allowed MIME types
 * @param int $maxSize Max file size in bytes
 * @return array ['success' => bool, 'message' => string, 'filename' => string]
 */
function uploadFile($file, $destination, $allowedTypes = [], $maxSize = UPLOAD_MAX_SIZE) {
    // Validate file
    $validation = validateFileUpload($file, $allowedTypes, $maxSize);

    if (!$validation['valid']) {
        return [
            'success' => false,
            'message' => $validation['error'],
            'filename' => ''
        ];
    }

    // Create destination directory if not exists
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    // Generate safe filename
    $filename = sanitizeFilename($file['name']);
    $filepath = $destination . '/' . $filename;

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        return [
            'success' => true,
            'message' => 'File berhasil diupload',
            'filename' => $filename
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Gagal mengupload file',
            'filename' => ''
        ];
    }
}

/**
 * Upload image with resize
 *
 * @param array $file File from $_FILES
 * @param string $destination Destination folder
 * @param int $maxWidth Max width
 * @param int $maxHeight Max height
 * @return array ['success' => bool, 'message' => string, 'filename' => string]
 */
function uploadImage($file, $destination, $maxWidth = 1920, $maxHeight = 1080) {
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

    // Validate file
    $validation = validateFileUpload($file, $allowedTypes, UPLOAD_MAX_SIZE);

    if (!$validation['valid']) {
        return [
            'success' => false,
            'message' => $validation['error'],
            'filename' => ''
        ];
    }

    // Create destination directory if not exists
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    // Generate safe filename
    $filename = sanitizeFilename($file['name']);
    $filepath = $destination . '/' . $filename;

    // Get image info
    $imageInfo = getimagesize($file['tmp_name']);
    $originalWidth = $imageInfo[0];
    $originalHeight = $imageInfo[1];
    $mimeType = $imageInfo['mime'];

    // Calculate new dimensions
    if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
        $ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
        $newWidth = (int) ($originalWidth * $ratio);
        $newHeight = (int) ($originalHeight * $ratio);
    } else {
        $newWidth = $originalWidth;
        $newHeight = $originalHeight;
    }

    // Create image resource
    switch ($mimeType) {
        case 'image/jpeg':
        case 'image/jpg':
            $source = imagecreatefromjpeg($file['tmp_name']);
            break;
        case 'image/png':
            $source = imagecreatefrompng($file['tmp_name']);
            break;
        case 'image/gif':
            $source = imagecreatefromgif($file['tmp_name']);
            break;
        case 'image/webp':
            $source = imagecreatefromwebp($file['tmp_name']);
            break;
        default:
            return [
                'success' => false,
                'message' => 'Unsupported image type',
                'filename' => ''
            ];
    }

    // Create new image
    $newImage = imagecreatetruecolor($newWidth, $newHeight);

    // Preserve transparency for PNG and GIF
    if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
    }

    // Resize image
    imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

    // Save image
    $saved = false;
    switch ($mimeType) {
        case 'image/jpeg':
        case 'image/jpg':
            $saved = imagejpeg($newImage, $filepath, 90);
            break;
        case 'image/png':
            $saved = imagepng($newImage, $filepath, 9);
            break;
        case 'image/gif':
            $saved = imagegif($newImage, $filepath);
            break;
        case 'image/webp':
            $saved = imagewebp($newImage, $filepath, 90);
            break;
    }

    // Free memory
    imagedestroy($source);
    imagedestroy($newImage);

    if ($saved) {
        return [
            'success' => true,
            'message' => 'Image berhasil diupload',
            'filename' => $filename
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Gagal menyimpan image',
            'filename' => ''
        ];
    }
}

/**
 * Delete file
 *
 * @param string $filepath File path
 * @return bool Success status
 */
function deleteFile($filepath) {
    if (file_exists($filepath)) {
        return unlink($filepath);
    }

    return false;
}

/**
 * Get file extension
 *
 * @param string $filename Filename
 * @return string File extension
 */
function getFileExtension($filename) {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}

/**
 * Get MIME type from file
 *
 * @param string $filepath File path
 * @return string MIME type
 */
function getMimeType($filepath) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $filepath);
    finfo_close($finfo);

    return $mimeType;
}

/**
 * Check if file is image
 *
 * @param string $filepath File path
 * @return bool Image status
 */
function isImage($filepath) {
    $imageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    return in_array(getMimeType($filepath), $imageTypes);
}

/**
 * Check if file is document
 *
 * @param string $filepath File path
 * @return bool Document status
 */
function isDocument($filepath) {
    $docTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    return in_array(getMimeType($filepath), $docTypes);
}

/**
 * Create thumbnail from image
 *
 * @param string $source Source image path
 * @param string $destination Destination path
 * @param int $width Thumbnail width
 * @param int $height Thumbnail height
 * @return bool Success status
 */
function createThumbnail($source, $destination, $width = 300, $height = 300) {
    if (!file_exists($source) || !isImage($source)) {
        return false;
    }

    $imageInfo = getimagesize($source);
    $originalWidth = $imageInfo[0];
    $originalHeight = $imageInfo[1];
    $mimeType = $imageInfo['mime'];

    // Calculate crop dimensions
    $ratio = max($width / $originalWidth, $height / $originalHeight);
    $newWidth = (int) ($originalWidth * $ratio);
    $newHeight = (int) ($originalHeight * $ratio);

    $x = (int) (($newWidth - $width) / 2);
    $y = (int) (($newHeight - $height) / 2);

    // Create image resources
    switch ($mimeType) {
        case 'image/jpeg':
        case 'image/jpg':
            $sourceImage = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $sourceImage = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $sourceImage = imagecreatefromgif($source);
            break;
        case 'image/webp':
            $sourceImage = imagecreatefromwebp($source);
            break;
        default:
            return false;
    }

    $tempImage = imagecreatetruecolor($newWidth, $newHeight);
    $thumbnail = imagecreatetruecolor($width, $height);

    // Preserve transparency
    if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
        imagealphablending($tempImage, false);
        imagesavealpha($tempImage, true);
        imagealphablending($thumbnail, false);
        imagesavealpha($thumbnail, true);
    }

    // Resize and crop
    imagecopyresampled($tempImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
    imagecopy($thumbnail, $tempImage, 0, 0, $x, $y, $width, $height);

    // Save thumbnail
    $saved = false;
    switch ($mimeType) {
        case 'image/jpeg':
        case 'image/jpg':
            $saved = imagejpeg($thumbnail, $destination, 90);
            break;
        case 'image/png':
            $saved = imagepng($thumbnail, $destination, 9);
            break;
        case 'image/gif':
            $saved = imagegif($thumbnail, $destination);
            break;
        case 'image/webp':
            $saved = imagewebp($thumbnail, $destination, 90);
            break;
    }

    // Free memory
    imagedestroy($sourceImage);
    imagedestroy($tempImage);
    imagedestroy($thumbnail);

    return $saved;
}
?>
