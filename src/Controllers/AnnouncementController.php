<?php

namespace Larapack\VoyagerAnnouncements\Controllers;

use Illuminate\Routing\Controller;
use League\CommonMark\CommonMarkConverter;

class AnnouncementController extends Controller
{
    protected $url = 'https://raw.githubusercontent.com/larapack/voyager-announcements-hook/announcements/index.md';

    public function index()
    {
        if (!class_exists(CommonMarkConverter::class)) {
            return view('voyager-hooks::composer-require', [
                'package' => 'league/commonmark:~0.15.3',
            ]);
        }

        $converter = new CommonMarkConverter();

        $content = $converter->convertToHtml(
            file_get_contents($this->url)
        );

        return view('voyager-announcements::index')->with([
            'content' => $content,
        ]);
    }
}
