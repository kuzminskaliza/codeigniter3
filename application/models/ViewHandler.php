<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class ViewHandler
 */
class ViewHandler extends CI_Model
{
    // Array containing views mapped to keys
    protected $getView = [
        'login' => 'login.php',
        'insert' => 'register.php',
		'update' => 'update.php',
        'allData' => 'all-data.php',
        'reset_password' => 'reset-password.php'
    ];

    // Array containing views mapped to keys
    protected $getRedirect = [
        'allData' => 'crud/allData',
        'login' => 'home/login'
    ];

    /**
     * @param string $key
     * @return string|null
     */
    public function getView(string $key): ?string
    {
        return $this->getView[$key] ?? null;
    }

    /**
     * Get the redirect URL associated with the given key.
     *
     * @param string $key The key to look up in the redirect mapping.
     * @return string|null The redirect URL if found, or null if the key is not found.
     */
    public function getRedirect(string $key): ?string
    {
        // Check if the key exists in the redirect mapping
        return $this->getRedirect[$key] ?? null;
    }
}
