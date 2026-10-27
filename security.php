<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function shadowsix_csrf_token(): string
{
    if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function shadowsix_verify_csrf_token($submitted): bool
{
    return is_string($submitted)
        && isset($_SESSION['csrf_token'])
        && is_string($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $submitted);
}

function shadowsix_require_admin(): void
{
    if (
        !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true
        || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'
    ) {
        header('Location: login.php');
        exit();
    }
}

/**
 * Validate and store a raster image upload. Returns ['path' => ?string, 'error' => ?string].
 * Only known categories are accepted, and both extension-independent MIME and image headers are checked.
 */
function shadowsix_store_uploaded_image(?array $file, string $category): array
{
    if (!in_array($category, ['materi', 'mapel'], true)) {
        return ['path' => null, 'error' => 'Kategori unggahan tidak valid.'];
    }

    if ($file === null || !isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return ['path' => null, 'error' => null];
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['path' => null, 'error' => 'Unggahan gambar gagal. Silakan pilih file lain.'];
    }

    $tmpName = isset($file['tmp_name']) && is_string($file['tmp_name']) ? $file['tmp_name'] : '';
    $size = isset($file['size']) ? (int) $file['size'] : 0;

    if ($tmpName === '' || !is_uploaded_file($tmpName)) {
        return ['path' => null, 'error' => 'File unggahan tidak valid.'];
    }

    if ($size < 1 || $size > 5 * 1024 * 1024) {
        return ['path' => null, 'error' => 'Ukuran gambar harus lebih kecil dari atau sama dengan 5 MB.'];
    }

    if (!function_exists('finfo_open') || !function_exists('getimagesize')) {
        error_log('ShadowSix: image validation extensions are unavailable.');
        return ['path' => null, 'error' => 'Validasi gambar tidak tersedia di server.'];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if ($finfo === false) {
        return ['path' => null, 'error' => 'Validasi gambar tidak dapat dijalankan.'];
    }
    $mime = finfo_file($finfo, $tmpName);
    finfo_close($finfo);

    $imageInfo = @getimagesize($tmpName);
    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
    ];

    if (
        !is_string($mime)
        || !isset($allowed[$mime])
        || $imageInfo === false
        || !isset($imageInfo['mime'])
        || $imageInfo['mime'] !== $mime
    ) {
        return ['path' => null, 'error' => 'Format gambar tidak valid. Gunakan JPG, PNG, atau GIF.'];
    }

    $uploadRoot = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
    $targetDirectory = $uploadRoot . DIRECTORY_SEPARATOR . $category;

    if (!is_dir($targetDirectory) && !@mkdir($targetDirectory, 0750, true) && !is_dir($targetDirectory)) {
        error_log('ShadowSix: failed to create image upload directory.');
        return ['path' => null, 'error' => 'Folder unggahan tidak dapat dibuat.'];
    }

    $filename = $category . '_' . bin2hex(random_bytes(16)) . '.' . $allowed[$mime];
    $destination = $targetDirectory . DIRECTORY_SEPARATOR . $filename;

    if (!move_uploaded_file($tmpName, $destination)) {
        return ['path' => null, 'error' => 'Gambar tidak dapat disimpan.'];
    }

    @chmod($destination, 0640);

    return [
        'path' => 'uploads/' . $category . '/' . $filename,
        'error' => null,
    ];
}

function shadowsix_delete_uploaded_image(?string $relativePath, string $category): void
{
    if (!in_array($category, ['materi', 'mapel'], true) || !is_string($relativePath)) {
        return;
    }

    $prefix = 'uploads/' . $category . '/';
    if (strpos($relativePath, $prefix) !== 0) {
        return;
    }

    $candidate = __DIR__ . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
    $realBase = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $category);
    $realFile = realpath($candidate);

    if ($realBase === false || $realFile === false || !is_file($realFile)) {
        return;
    }

    $basePrefix = rtrim($realBase, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    if (strpos($realFile, $basePrefix) !== 0) {
        return;
    }

    @unlink($realFile);
}

/**
 * Sanitize rich text before rendering it. When DOM is unavailable, escape the input rather
 * than emitting potentially executable markup.
 */
function shadowsix_sanitize_rich_html(string $html): string
{
    if (!class_exists('DOMDocument')) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    $previousLibxmlState = libxml_use_internal_errors(true);
    $document = new DOMDocument('1.0', 'UTF-8');
    $loaded = $document->loadHTML(
        '<?xml encoding="UTF-8"><div id="shadow-six-root">' . $html . '</div>',
        LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
    );
    libxml_clear_errors();
    libxml_use_internal_errors($previousLibxmlState);

    if (!$loaded) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    $wrappers = $document->getElementsByTagName('div');
    $root = $wrappers->item(0);
    if (!$root) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    $allowedTags = [
        'p', 'br', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'strong', 'b', 'em', 'i', 'u', 'ul', 'ol', 'li',
        'blockquote', 'pre', 'code', 'a', 'img', 'hr',
        'table', 'thead', 'tbody', 'tr', 'th', 'td',
    ];
    $dangerousTags = [
        'script', 'style', 'iframe', 'object', 'embed', 'svg', 'math',
        'form', 'input', 'button', 'textarea', 'select', 'option',
        'link', 'meta', 'base', 'video', 'audio', 'source',
    ];

    $sanitizeNode = function ($element) use (&$sanitizeNode, $allowedTags, $dangerousTags): void {
        if (!($element instanceof DOMElement)) {
            return;
        }

        $tag = strtolower($element->tagName);
        $parent = $element->parentNode;
        if (!$parent) {
            return;
        }

        if (in_array($tag, $dangerousTags, true)) {
            $parent->removeChild($element);
            return;
        }

        $children = [];
        foreach ($element->childNodes as $child) {
            $children[] = $child;
        }
        foreach ($children as $child) {
            if ($child instanceof DOMElement) {
                $sanitizeNode($child);
            }
        }

        if (!in_array($tag, $allowedTags, true)) {
            while ($element->firstChild) {
                $parent->insertBefore($element->firstChild, $element);
            }
            $parent->removeChild($element);
            return;
        }

        $allowedAttributes = [];
        if ($tag === 'a') {
            $allowedAttributes = ['href', 'title'];
        } elseif ($tag === 'img') {
            $allowedAttributes = ['src', 'alt', 'width', 'height'];
        } elseif ($tag === 'td' || $tag === 'th') {
            $allowedAttributes = ['colspan', 'rowspan'];
        }

        $attributes = [];
        foreach ($element->attributes as $attribute) {
            $attributes[] = $attribute->name;
        }

        foreach ($attributes as $attributeName) {
            if (!in_array(strtolower($attributeName), $allowedAttributes, true)) {
                $element->removeAttribute($attributeName);
                continue;
            }

            $value = trim($element->getAttribute($attributeName));
            $attributeName = strtolower($attributeName);

            if ($attributeName === 'href' || $attributeName === 'src') {
                $isProtocolRelative = substr($value, 0, 2) === '//';
                $hasScheme = preg_match('/^[a-z][a-z0-9+.-]*:/i', $value) === 1;
                $safeScheme = preg_match('/^(https?:|mailto:)/i', $value) === 1;
                if (
                    $value === ''
                    || $isProtocolRelative
                    || preg_match('/^(?:javascript|data|vbscript):/i', $value) === 1
                    || ($hasScheme && !$safeScheme)
                ) {
                    $element->removeAttribute($attributeName);
                }
            } elseif (
                ($attributeName === 'width' || $attributeName === 'height' || $attributeName === 'colspan' || $attributeName === 'rowspan')
                && !preg_match('/^[0-9]{1,4}$/', $value)
            ) {
                $element->removeAttribute($attributeName);
            } else {
                $element->setAttribute($attributeName, $value);
            }
        }
    };

    $children = [];
    foreach ($root->childNodes as $child) {
        $children[] = $child;
    }
    foreach ($children as $child) {
        if ($child instanceof DOMElement) {
            $sanitizeNode($child);
        }
    }

    $safeHtml = '';
    foreach ($root->childNodes as $child) {
        $safeHtml .= $document->saveHTML($child);
    }

    return $safeHtml;
}
