<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Navigator extends Controller
{
    public function index()
    {
        $dir = '/';
        $files = $this->get_files_names_from_dir($dir);
        $dirs = $this->get_dir_names_from_dir($dir);

        //die(var_dump($files, $dirs));

        // Give the data to navigator view
        return view('navigator', [
            'files' => $files,
            'dirs' => $dirs
        ]);
    }

    public function show($dir)
    {
        $dir = '/' . $dir;
        // replace # with /
        $dir = str_replace('^', '/', $dir);

        // Entferne anfangs / von
        $files = $this->get_files_names_from_dir($dir);
        $dirs = $this->get_dir_names_from_dir($dir);
        $above_folder = $this->get_folder_above($dir);

        // Clear all slashes from the beginning
        $dir = ltrim($dir, '/');
        $dir = str_replace('/', '^', $dir);

        $above_folder = ltrim($above_folder, '/');
        $above_folder = str_replace('/', '^', $above_folder);

        // Give the data to navigator view
        return view('navigator', [
            'base_dir' => $dir,
            'above_folder' => $above_folder,
            'files' => $files,
            'dirs' => $dirs
        ]);
    }

    private function get_files_names_from_dir($dir)
    {
        $files = array();
        foreach (scandir($dir) as $file)
        {
            if ($file !== '.' && $file !== '..' && !is_dir($dir . '/' . $file))
            {
                $files[] = $file;
            }
        }
        return $files;
    }

    private function get_dir_names_from_dir($dir)
    {
        $dirs = array();
        foreach (scandir($dir) as $file)
        {
            if ($file !== '.' && $file !== '..' && is_dir($dir . '/' . $file))
            {
                $dirs[] = $file;
            }
        }
        return $dirs;
    }

    private function get_folder_above($dir)
    {
        $dir = explode('/', $dir);
        array_pop($dir);
        return implode('/', $dir);
    }
}
