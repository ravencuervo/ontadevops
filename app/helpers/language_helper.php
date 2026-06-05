<?php
/**
 * Language Helper
 * Manages translations and current language state
 */

function initLanguage() {
    // Check for language in URL — save to session and redirect clean URL
    if (isset($_GET['lang'])) {
        $lang = strtolower(preg_replace('/[^a-zA-Z]/', '', $_GET['lang']));
        $validLangs = ['es', 'en', 'fr', 'br', 'de'];
        if (in_array($lang, $validLangs)) {
            $_SESSION['lang'] = $lang;
        }
        // Redirect to same URL without ?lang= to avoid URL pollution
        $params = $_GET;
        unset($params['lang']);
        // Rebuild the current path
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        // Remove ?lang=xx from the query string
        $cleanUri = preg_replace('/([?&])lang=[^&]*/i', '$1', $requestUri);
        // Clean up any dangling ? or &
        $cleanUri = preg_replace('/[?&]$/', '', $cleanUri);
        $cleanUri = preg_replace('/\?&/', '?', $cleanUri);
        header('Location: ' . $cleanUri, true, 302);
        exit;
    }

    // Default language
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'es';
    }

    $currentLang = $_SESSION['lang'];
    $langPath = APPROOT . '/lang/' . $currentLang . '.php';

    if (file_exists($langPath)) {
        $GLOBALS['translations'] = require $langPath;
    } else {
        // Fallback to Spanish if requested file doesn't exist
        $GLOBALS['translations'] = require APPROOT . '/lang/es.php';
        $_SESSION['lang'] = 'es';
    }
}


/**
 * Translate a key
 * 
 * @param string $key Dot-notation key (e.g. 'nav.home')
 * @return string|array Translated text or array of translations
 */
function _t($key) {
    if (!isset($GLOBALS['translations'])) {
        return $key;
    }

    $keys = explode('.', $key);
    $translation = $GLOBALS['translations'];

    foreach ($keys as $k) {
        if (isset($translation[$k])) {
            $translation = $translation[$k];
        } else {
            return $key; // Return key if not found
        }
    }

    return $translation;
}

function getCurrentLang() {
    return isset($_SESSION['lang']) ? strtoupper($_SESSION['lang']) : 'ES';
}
